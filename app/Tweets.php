<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model {

    protected $table = 'tweets';
    protected $fillable = ['text', 'media', 'time','retweets','favs'];

    public function show()
    {
        $trending = Tweets::all();
        return view('tweets', compact('trending') );
    }

}
