<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Block;
use App\Transaction;


class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $input = trim($request->get('q'));

      switch(strlen($input)) {
        case 34:
          return redirect()->route('address', $input);
          break;

        case 64:
          try {
            $input = Block::where('hash', $input)->firstOrFail();
            return redirect()->route('blocks', (int) $input->height);
          } catch (ModelNotFoundException $e) {
            $input = Transaction::where('hash', $input)->firstOrFail();
            return redirect()->route('transactions', $input->hash);
          }
          break;

        default:
          if(is_numeric($input)) {
            return redirect()->route('blocks', (int) $input);
          }

          abort(404);
          break;
      }

    }
}
