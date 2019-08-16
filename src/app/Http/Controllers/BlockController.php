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

    $previous_block_difficulty = 0;  // used to calculate difficulty variation from the previous and current block

    //reversing done because need to access block in chronological order in order to calculate difficulty diff
    $blocks->reverse()->transform(function ($item, $key) use (& $previous_block_difficulty) {
        $item->block_time = Carbon::createFromTimestamp($item->block_time)->format('d M Y  H:i:s');
        $item->block_size /= 1000;
        $item->transactions = count(explode(',', $item->transaction_hashes));

        if($previous_block_difficulty != 0) {  //if here : this is not the oldest block in the page
          //calculating difficulty diff percentage between previous and current block
          $item->difficulty_diff_percent = number_format((($item->difficulty - $previous_block_difficulty) / $previous_block_difficulty * 100), 1);
        }
        $previous_block_difficulty = $item->difficulty;

        return $item;
    });


    return view('blocks', [
      'blocks' => $blocks
    ]);


  }
}
