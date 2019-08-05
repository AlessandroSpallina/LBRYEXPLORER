<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Block;

class BlockController extends Controller
{
  public function test() {
    return view('welcome');
  }

  public function getBlocks($block_id = null) {
    if($block_id) {  // requested specific block num
      $block = Block::findOrFail($block_id);
      return $block;
    } // list blocks
  }
}
