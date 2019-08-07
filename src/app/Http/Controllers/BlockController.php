<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Block;
use App\Transaction;

class BlockController extends Controller
{
  public function test() {
    return view('welcome');
  }

  public function getBlocks($block_id = null) {
    if($block_id) {  // requested specific block num
      $block = Block::findOrFail($block_id);
      $transactions = $block->transactions()->get();

      $block->block_size /= 1000;
      $block->block_time = Carbon::createFromTimestamp($block->block_time)->format('d M Y  H:i:s');

      $transactions->transform(function ($item, $key) {
          $item->size /= 1000;
          return $item;
      });


      return view('block', [
        'block' => $block,
        'transactions' => $transactions
      ]);

    } // list blocks



  }
}
