<?php

namespace iSave;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'from_user', 'to_user', 'transaction_date', 'amount', 'description', 'autopay'
    ];

    public function spending_user(){
    	return $this->belongsTo('iSave\User', 'from_user', 'acc_no');
    }

    public function receiving_user(){
    	return $this->belongsTo('iSave\User', 'to_user', 'acc_no');
    }

    public static function descriptions(){
    	
    }
}
