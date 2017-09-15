<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use Auth;


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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function show($month){
        print($month);

        $id = Auth::user()->id;
        $cash_received = Transaction::where('to_user', 'acc_no')->get();

        print($id);
        print(Auth::user()->name);
        print($cash_received);

    }
}
