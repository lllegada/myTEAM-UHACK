<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'from_user', 'to_user', 'transaction_date', 'amount', 'description'
    ];

    public function spending_user(){
    	return $this->belongsTo('App\User', 'acc_no', 'from_user');
    }

    public function receiving_user(){
    	return $this->belongsTo('App\User', 'acc_no', 'to_user');
    }
}
