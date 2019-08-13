<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Block;
use App\Transaction;

class BlockController extends Controller
{

  public function getBlocks($height = null) {
    if($height) {  // requested specific block num
      $block = Block::where('height', $height)->firstOrFail();
      $transactions = $block->transactions()->get();

      $block->block_size /= 1000;
      $block->block_time = Carbon::createFromTimestamp($block->block_time)->format('d M Y  H:i:s');

      $block->confirmations = Block::latest()->take(1)->value('height') - $block->height;

      $transactions->transform(function ($item, $key) {
          $item->transaction_size /= 1000;
          return $item;
      });

      return view('block', [
        'block' => $block,
        'transactions' => $transactions
      ]);

    } // list blocks

    $blocks = Block::orderBy('id', 'desc')->paginate(25);

    $blocks->transform(function ($item, $key) {
        $item->block_time = Carbon::createFromTimestamp($item->block_time)->format('d M Y  H:i:s');
        $item->block_size /= 1000;
        $item->transactions = count(explode(',', $item->transaction_hashes));
        return $item;
    });

    //dd($blocks);

    return view('blocks', [
      'blocks' => $blocks
    ]);


  }
}
