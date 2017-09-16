<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Transaction;
use Auth;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Auth::user()->expenses()->orderBy('updated_at', 'desc')->groupBy('to_user')->get();
        // foreach($expenses as $expense){
        //     echo "Paid '".$expense->amount."' to '".$expense->receiving_user->name."' for '".$expense->description."' on '".$expense->transaction_date."' <br/>";
        // }
        return view('transactions.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = "";
        if(!empty($request->debit_amount) && !empty($request->debit_description)){
            $transaction = new Transaction;
            $transaction->from_user = Auth::user()->acc_no;
            $transaction->to_user = $request->to_user;
            $transaction->transaction_date = Carbon::now();
            $transaction->amount = $request->debit_amount;
            $transaction->description = $request->debit_description;
            $transaction->save();
            $channel_id = rand(0, 99999).'_'.rand(0, 99999);
            // API part
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api-uat.unionbankph.com/hackathon/sb/transfers/initiate",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"channel_id\":\"".$channel_id."\",\"transaction_id\":\"".$transaction->id."\",\"source_account\":\"".$transaction->from_user."\",\"source_currency\":\"PHP\",\"target_account\":\"".$transaction->to_user."\",\"target_currency\":\"PHP\",\"amount\":".$transaction->amount."}",
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "content-type: application/json",
                    "x-ibm-client-id: bc251d2c-2a2e-42b2-a427-66d74080118f",
                    "x-ibm-client-secret: sB3nI0pB4aS2nE2tS5vH7mG1mQ6uL6rK6uA3lL3rS0aH2vU5fN"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            // echo $err;
            // echo $response;
            if ($err) {
                $message = "<h4>Error!</h4>|<p>" . $err."</p>";
                $transaction->delete();
            } else {
                $message = "<h4>Success!</h4>|<p>Php ".$transaction->amount.".00 was transferred to ".$transaction->receiving_user->name."</p>";
            }
        }else{
            $message = "<h4>Error!</h4>|<p>You forgot to input the following:</p><ul>";
            if(empty($request->debit_amount)){
                $message.="<li>The amount you wish to transfer</li>";
            }
            if(empty($request->debit_description)){
                $message.="<li>The category of your transaction</li>";
            }
            $message .= "</ul>";
        }
        $transactions = Auth::user()->expenses()->orderBy('updated_at', 'desc')->groupBy('to_user')->get();
        $available_balance = Auth::user()->getBalance()["currency"]." ".round(Auth::user()->getBalance()["avaiable_balance"],2);
        $current_balance = Auth::user()->getBalance()["currency"]." ".round(Auth::user()->getBalance()["current_balance"], 2);
        return array($message, $this->transactionString($transactions), $available_balance, $current_balance);
    }

    public function transactionString($transactions){
        $transactionString = "";
        foreach($transactions as $transaction){
            $transactionString .= ('<li class="list-group-item transaction" id="transaction_'.$transaction->id.'" data-toUser="'.$transaction->to_user.'">'.
                                    '<div class="row">'.
                                        '<div class="col-md-4 col-sm-4 name">'.$transaction->receiving_user->name .'</div>'.
                                        '<div class="col-md-3 col-sm-3 description">'.$transaction->description.'</div>'.
                                        '<div class="col-md-3 col-sm-3 amount">'.$transaction->amount.'</div>'.
                                        '<div class="col-md-2 col-sm-2">'.
                                            '<div class="btn-group" role="group" aria-label="...">'.
                                                '<button class="btn btn-orange pay_transaction" id="pay_transaction_'.$transaction->id.'"><span class="glyphicon glyphicon-credit-card"></span> Pay</button>'.
                                                '<button class="btn btn-blue edit_transaction"><span class="glyphicon glyphicon-edit"></span> Edit</button>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>'.
                                '</li>');
        }
        return $transactionString;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
