<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    protected $table = 'transactions';

    public function post()
    {
        return $this->belongsTo('App\User');
    }

}
