<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweets as Tweets;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the tweets index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function showAll()
     {
       $trending = Collect(Tweet::orderBy('time','asc')->get());
       $trendingUnique = $trending->unique('media');
       return view('tweets', compact('trendingUnique') );
     }

}
