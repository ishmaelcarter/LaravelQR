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

use App\Transaction as Transaction;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('hello');
});

Route::get('/transaction', function () {
    return view('welcome');
});

Route::post('/transaction', function (Request $request) {
    $transaction = new Transaction();
    $transaction->transaction_key = $request->id;
    $transaction->save();
    echo "<p><a href=" . URL::to('/transaction/' . $transaction->transaction_key) . ">VIEW QR CODE / SAVE ID</a><p>";
    echo "<a href='/'>Home</a>";
});

Route::get('/transaction/{transaction_key}', function ($transaction_key) {
    $transaction = Transaction::find($transaction_key);
    echo "<a href='/'>Home</a><br>";
    echo "<img src=https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . $transaction . "id='qrcode'>";
});
