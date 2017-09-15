<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'acc_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function expenses(){
        return $this->hasMany('App\Transaction', 'from_user', 'acc_no');
    }

    public function income(){
        return $this->hasMany('App\Transaction', 'to_user', 'acc_no');
    }

    public static function allUsers(){
        return User::where('id', '!=', Auth::user()->id)->get();
    }

}
