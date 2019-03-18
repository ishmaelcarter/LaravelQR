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

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

Route::get('/', function () {
    return view('hello');
});

Route::get('/transaction', function () {
    return view('welcome');
});

Route::post('/transaction', function (Request $request) {
    $transaction = new Transaction();
    $transaction->transaction_key = $request->id;
    $transaction->user = $request->user;
    $transaction->save();
    echo "<div><a href=" . URL::to('/transaction/' . $transaction->transaction_key) . ">VIEW QR CODE / SAVE ID</a><div>";
    echo "<div><a href='/'>Generate New Key</a></div>";
    echo "<div><a href='/home'>Dashboard</a></div>";
});

Route::get('/transaction/{transaction_key}', function ($transaction_key) {
    $transaction = Transaction::find($transaction_key);
    echo "<a href='/'>Home</a><br>";
    echo "<img src=https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . $transaction . "id='qrcode'>";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
