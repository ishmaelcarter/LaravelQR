<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweets as Tweets;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;

class TweetsController extends Controller
{
    /**
     * Show the tweets index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     protected function showAll()
     {
       if (Input::has('search')) {
         return redirect('/trending/' . Input::get('search'));
       } else {
         $trending = Tweets::distinct('text')->orderBy('id','desc')->simplePaginate(60);
         $trendingUnique = $trending->unique('media','text');
         return view('tweets', compact('trending'), compact('trendingUnique') );
       }
     }

     public function search($keyword)
     {
       $trending = Tweets::where('text', 'LIKE', "%{$keyword}%")->simplePaginate(30);
       $trendingUnique = $trending->unique('media','text');
       return view('tweets', compact('trending'), compact('trendingUnique') );
     }

     protected function apiAuth()
     {
       if (Auth::user()) {
         $trending = Collect(Tweets::orderBy('id','desc')->get());
         $trendingUnique = $trending->unique('media','text');
         return $trendingUnique->values();
       } else {
            abort(401, "Invalid Authentication");
       }
     }

}
