<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Transaction extends Model
{
    protected $fillable = [
    	'from_user', 'to_user', 'transaction_date', 'amount', 'description', 'autopay'
    ];

    public function spending_user(){
    	return $this->belongsTo('App\User', 'from_user', 'acc_no');
    }

    public function receiving_user(){
    	return $this->belongsTo('App\User', 'to_user', 'acc_no');
    }

}
