<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\Block;

class TransactionController extends Controller
{



  public function getTransactions($tx = null) {
    if($tx) {  // requested specific transaction
      $tx = Transaction::where('hash', $tx)->firstOrFail();

      if($tx->block_hash_id != 'MEMPOOL') {
          $tx->block_height = Block::where('hash', $tx->block_hash_id)->value('height');
          $tx->confirmations = Block::latest()->take(1)->value('height') - $tx->block_height;
          $tx->transaction_size /= 1000;
      }


      /*$block = Block::where('height', $height)->firstOrFail();
      $transactions = $block->transactions()->get();

      $block->block_size /= 1000;
      $block->block_time = Carbon::createFromTimestamp($block->block_time)->format('d M Y  H:i:s');

      $block->confirmations = Block::latest()->take(1)->value('height') - $block->height;

      $transactions->transform(function ($item, $key) {
          $item->size /= 1000;
          return $item;
      });*/

      return view('transaction', [
        'transaction' => $tx
      ]);

    } // list transactions



  }
}
