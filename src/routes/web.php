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


Route::get('/', 'HomeController');
Route::get('/blocks/{height?}', 'BlockController@getBlocks')->where('height', '[0-9]+')->name('blocks');
Route::get('/txs/{tx?}', 'TransactionController@getTransactions')->where('tx', '[A-Za-z0-9]+')->name('transactions');
Route::get('/mempool', 'TransactionController@getMempoolTransactions')->name('transactions_mempool');

Route::get('/claims/{claim?}', 'ClaimController@getBlocks')/*->where('block', '[0-9]+')*/->name('claims');
Route::get('/account/{account}', 'AccountController@getAccount')->where('tx', '[A-Za-z0-9]+')->name('account');

Route::get('/search', 'SearchController')->where('what', '[A-Za-z0-9]+');
