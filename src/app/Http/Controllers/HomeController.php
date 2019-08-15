<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Block;
use App\Transaction;


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $blocks = Block::latest()->take(15)->get(['height', 'block_time', 'transaction_hashes', 'block_size', 'difficulty']);
        $transactions = Transaction::latest()->where('block_hash_id', '<>' , 'MEMPOOL')->take(15)->get(['hash', 'transaction_time', 'value', 'fee']);

        $now = Carbon::now();

        $blocks->transform(function ($item, $key) use ($now) {
            $item->age = Carbon::createFromTimestamp($item->block_time)->diffInMinutes($now);
            $item->block_size /= 1000;
            $item->transactions = count(explode(',', $item->transaction_hashes));
            return $item;
        });

        $transactions->transform(function ($item, $key) use ($now) {
            $item->age = Carbon::createFromTimestamp($item->transaction_time)->diffInMinutes($now);
            return $item;
        });

        return view('home', [
          'blocks' => $blocks,
          'transactions' => $transactions
        ]);
    }
}
