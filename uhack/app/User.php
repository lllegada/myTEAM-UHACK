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

    public function getBalance(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-uat.unionbankph.com/hackathon/sb/accounts/".Auth::user()->acc_no,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "x-ibm-client-id: bc251d2c-2a2e-42b2-a427-66d74080118f",
            "x-ibm-client-secret: sB3nI0pB4aS2nE2tS5vH7mG1mQ6uL6rK6uA3lL3rS0aH2vU5fN"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
        $response = str_replace("[", "", $response);
        $response = str_replace("]", "", $response);
        return (array) json_decode($response);
    }

}
