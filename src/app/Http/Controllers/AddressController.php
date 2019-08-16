<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Address;
use App\TransactionAddress;


class AddressController extends Controller
{


  public function getAddress($address) {

    $address = Address::where('address', $address)->firstOrFail();
    $txs = TransactionAddress::where('address_id', $address->id)
            ->leftJoin('transaction', 'transaction_address.transaction_id', 'transaction.id')
            ->leftJoin('block', 'transaction.block_hash_id', 'block.hash')
            ->select('transaction_address.credit_amount', 'transaction_address.debit_amount', 'transaction.transaction_time', 'transaction.transaction_size', 'transaction.hash', 'transaction.input_count', 'transaction.output_count', 'block.height')
            ->orderBy('height', 'desc')
            ->paginate(25);

    // calculating total received and total sent
    $address->total_received = 0;
    $address->total_sent = 0;

    $txs->transform(function ($item, $key) use (& $address) {
        $item->transaction_time = Carbon::createFromTimestamp($item->transaction_time)->format('d M Y  H:i:s');
        $item->transaction_size /= 1000;

        $address->total_received += $item->credit_amount;
        $address->total_sent += $item->debit_amount;

        return $item;
    });


    return view('address', [
      'address' => $address,
      'transactions' => $txs
    ]);
  }




}
