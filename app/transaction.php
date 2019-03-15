<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    protected $table = 'transactions';
    protected $fillable = ['transaction_key', 'user'];

    public function post()
    {
        return $this->belongsTo('App\User');
    }

}
