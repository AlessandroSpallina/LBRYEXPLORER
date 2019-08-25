<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Transaction;
use App\Input;
use App\Output;
use App\Block;
use App\Address;

class TransactionController extends Controller
{


  public function getTransactions($tx = null) {
    if($tx) {  // requested specific transaction
      $tx = Transaction::where('hash', $tx)->firstOrFail();

      $tx->small_hash = substr($tx->hash, 0, 10).'...'.substr($tx->hash, -10);

      $inputs = $tx->inputs()
                ->leftJoin('address', 'input.input_address_id', 'address.id')
                ->select('input.prevout_hash', 'input.is_coinbase', 'input.value', 'address.address')
                ->get();

      $outputs = $tx->outputs()
                 ->leftJoin('input', 'output.spent_by_input_id', 'input.id')
                 ->select('output.value', 'output.type', 'output.script_pub_key_asm', 'output.address_list', 'output.is_spent','input.transaction_hash as spent_hash')
                 ->get();


      if($tx->block_hash_id != 'MEMPOOL') {
          $tx->block_height = Block::where('hash', $tx->block_hash_id)->value('height');
          $tx->confirmations = Block::latest()->take(1)->value('height') - $tx->block_height;
          $tx->transaction_size /= 1000;

          // calculate transaction fee by inputs and outputs
          $tx->fee = 0;
          foreach($inputs as $input) {
            $tx->fee += $input->value;
          }
          foreach($outputs as $output) {
            $tx->fee -= $output->value;
          }
          $tx->fee = sprintf("%.f", $tx->fee);
      }


      foreach ($outputs as $output) {
        //output.address_list is an array of address, lets parse
        $output->address_list = ltrim($output->address_list, "[");
        $output->address_list = rtrim($output->address_list, "]");
        $output->address_list = str_replace('"', '', $output->address_list);
        $output->address_list = explode(',', $output->address_list);

        //check transaction opcode {OP_DUP | OP_CLAIM_NAME | OP_UPDATE_CLAIM | OP_SUPPORT_CLAIM}
        $output->opcode_friendly = explode(' ', $output->script_pub_key_asm)[0];
        switch($output->opcode_friendly) {
          case 'OP_DUP':
            // if standard transaction (type: pubkeyhash) then pass blank opcode to view
            $output->opcode_friendly = " ";
            break;

          case 'OP_CLAIM_NAME':
            $output->opcode_friendly = "NEW CLAIM";
            break;

          case 'OP_UPDATE_CLAIM':
            $output->opcode_friendly = "UPDATE CLAIM";
            break;

          case 'OP_SUPPORT_CLAIM':
            $output->opcode_friendly = "SUPPORT CLAIM";
            break;
        }

      }


      return view('transaction', [
        'transaction' => $tx,
        'inputs' => $inputs,
        'outputs' => $outputs

      ]);

    } // list transactions

    $transactions = Transaction::select('id', 'hash', 'transaction_time', 'value', 'input_count', 'output_count', 'transaction_size')
                                ->where('block_hash_id', '<>', 'MEMPOOL')
                                ->orderBy('id', 'desc')
                                ->with(['inputs', 'outputs'])
                                ->simplePaginate(25);

    $transactions->transform(function ($item, $key) {
        $item->transaction_time = Carbon::createFromTimestamp($item->transaction_time)->format('d M Y  H:i:s');
        $item->transaction_size /= 1000;

        //lets calculate fees!
        $item->fee = 0;
        if($item->inputs[0]->is_coinbase) {
          return $item;
        }
        foreach($item->inputs as $input) {
          $item->fee += $input->value;
        }
        foreach($item->outputs as $output) {
          $item->fee -= $output->value;
        }
        $item->fee = sprintf("%.f", $item->fee);

        return $item;
    });

    return view('transactions', [
      'transactions' => $transactions
    ]);
  }

  public function getMempoolTransactions() {
    $transactions = Transaction::select('hash', 'value', 'input_count', 'output_count', 'transaction_size')
                                ->where('block_hash_id', 'MEMPOOL')
                                ->orderBy('id', 'desc')
                                ->simplePaginate(25);

    $transactions->transform(function ($item, $key) {
        $item->transaction_size /= 1000;
        return $item;
    });

    return view('transactions_mempool', [
      'transactions' => $transactions
    ]);
  }


}
