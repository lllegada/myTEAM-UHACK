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
        $expenses = Auth::user()->expenses()->get();
        $incomes = Auth::user()->income()->get();
        $total_expense = 0;
        $total_income = 0;
        foreach($expenses as $expense){
            $total_expense += $expense->amount;
        }

        foreach($incomes as $income){
            $total_income += $income->amount;
        }
        return view('home', compact('total_expense', 'total_income', 'expenses', 'incomes'));
    }

    public function show($month){
        // print($month);

        $id = Auth::user()->id;
        $expensesObj = Auth::user()->expenses()->get();
        $incomesObj = Auth::user()->income()->get();
        $expenses = collect();
        $incomes = collect();
        $total_expense = 0;
        $total_income = 0;
        foreach($expensesObj as $expense){
            $expense_date = $expense->transaction_date;
            $expense_date = explode(' ', $expense_date);
            $date = $expense_date[0];

            $mon = explode('-', $date);

            $expense_mon = $mon[1];
            if(str_replace("0","",$expense_mon) == $month){
                $total_expense += $expense->amount;
                $expenses->push($expense);
            }

        }
        foreach($incomesObj as $income){

            $income_date = $expense->transaction_date;

            $income_date = explode(' ', $income_date);
            $date = $income_date[0];

            $mon = explode('-', $date);

            $income_mon = $mon[1];
            if($income_mon == $month){
                $total_income += $income->amount;
                $incomes->push($income);
            }
        }

        return view('home',compact('total_income', 'total_expense', 'incomes', 'expenses'));
    }
}
