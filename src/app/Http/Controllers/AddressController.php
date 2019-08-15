<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;
use App\TransactionAddress;


class AddressController extends Controller
{


  public function getAddress($address) {

    $address = Address::where('address', $address)->firstOrFail();
    $txs = TransactionAddress::where('address_id', $address->id)->get();


    return view('address', [
      'address' => $address,
      'transactions' => $txs
    ]);
  }




}
