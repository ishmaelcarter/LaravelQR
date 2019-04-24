<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweets as Tweets;

class TweetsController extends Controller
{
    /**
     * Show the tweets index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function showAll()
     {
       $trending = Tweets::distinct('text')->orderBy('id','desc')->simplePaginate(60);
       $trendingUnique = $trending->unique('media','text');
       return view('tweets', compact('trending'), compact('trendingUnique') );
     }

     public function apiAuth()
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
