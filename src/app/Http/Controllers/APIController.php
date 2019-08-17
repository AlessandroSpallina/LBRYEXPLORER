<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Block;

class APIController extends Controller
{

  public function difficulty($last_n_hours) {
    $time = Carbon::now()->sub('hour', $last_n_hours)->timestamp;


    $diff = Block::where('block_time', '>', $time)
            ->orderBy('block_time', 'asc')
            ->select('block_time', 'difficulty')
            ->get();

    return response()->json($diff);
  }


}
