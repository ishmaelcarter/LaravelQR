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
use App\Tweets as Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;

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
    echo view('layouts.app');
    echo "<div class='center'>";
    echo "<button><a href=" . URL::to('/transaction/' . $transaction->transaction_key) . ">View QR Code and Key</a></button>";
    echo "<button><a href='/'>Generate New Key</a></button>";
    echo "</div>";
});

Route::get('/transaction/{transaction_key}', function ($transaction_key) {
    $transaction = Transaction::find($transaction_key);
    echo view('layouts.app');
    echo "<div class='center'>";
    echo "<img src=https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . $transaction_key . "id='qrcode'>";
    echo "<p>";
    echo $transaction_key;
    echo "</p>";
    echo "</div>";
});

Route::get('/trending/', 'TweetsController@showAll')->name('trending');

Route::get('/api/trending', 'TweetsController@apiAuth');

Route::post('/trending', function(){
  return redirect()->route('search', ['keyword' => $_POST['search-input']]);
});

Route::get('/trending/{keyword}', function($keyword) {
  $trending = Tweet::where('text', 'LIKE', "%{$keyword}%")->groupBy('media')-get()->simplePaginate(20);
  return view('tweets', compact('trending'));
})->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
