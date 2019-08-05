<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'HomeController');
Route::get('/blocks/{block_id?}', 'BlockController@getBlocks')->where('block', '[0-9]+')->name('blocks');
Route::get('/txs/{tx_id?}', 'TransactionController@getBlocks')/*->where('block', '[0-9]+')*/->name('transactions');
Route::get('/claims/{claim_id?}', 'ClaimController@getBlocks')/*->where('block', '[0-9]+')*/->name('claims');
//Route::get('/blocks', 'BlockController@test');
