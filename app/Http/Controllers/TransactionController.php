<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;

class TransactionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    //view all data from table transaction
    public function getList() {
        $trans = Transaction::all();

        return view('transaction.list', compact('trans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     * 
     * add new data into table transaction
     */
    public function getStore() {
        $trans = new Transaction();
        $trans->trans_dt = date('Y-m-d H:i:s');
        $trans->type = 'IN';
        $trans->amount = 'c';
        $trans->acct_id = 1;


        //validate
        //$trans->attributes return array i.e ['type'=>'IN','amount'=>1000]
        //$trans->getRules() return array i.e ['type'=>'require']
        // dd($trans->getAttributes());die;
        $v = \Validator::make($trans->getAttributes(), $trans->getRules());
        if ($v->passes()) {
            $trans->save();
        } else {
            //dump
            dd($v->messages());
        }
    }

    public function getUpdate($id) {
        $tran = Transaction::find($id); //find primary key..update
        return view('transaction.form',  compact('tran'));
//        $trans->type = 'OUT';
//        $trans->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDestroy($id) {
        //transaction/delete/1
        $trans = Transaction::find($id);

        if (is_null($trans)) {
            echo 'Access Denied';
            return;
        }
        $trans->delete();
    }

    //Many-to-many relations 
    // senarai details trans bg account
    public function getDetails($acct_id) {
//        $account = Account::all();
//        $transaction = Transaction::all();

        $acct = Account::find($acct_id);
        echo $acct->name . '<br>';

        foreach ($acct->mtransaction as $tran) {
            echo $tran->amount . '<br>';
        }

        //panggil function user dr model account
        echo $acct->accountuser->name;

        //panggil function user dr model account,
        //dlm model user..ade function mprofile
        echo $acct->accountuser->mprofile->email;
    }

    public function getCreate() {
        $tran = new Transaction();
       // dd($tran);
        return view('transaction.form',  compact('tran'));
    }

    public function postStore(Request $req) {
        //update
        //dd($req->id);
        if($req->id ==''){
            $tran = new Transaction();
        }else{
            $tran = Transaction::find($req->id);
        }
        
        //insert data into transaction table

        //$tran = new Transaction();
        //dd($req->get('amount'));

        $tran->type = $req->type;
        $tran->amount = $req->amount;
        $tran->acct_id = $req->account_id;
        $tran->trans_dt = date('Y-m-d H:i:s');

        $v = \Validator::make($tran->getAttributes(), $tran->getRules());
        if ($v->passes()) {
            $tran->save();
            $req->session()->flash('msg','hahahhaha');
            return redirect('transaction/list');
        } else {
            //dump
            //dd($v->messages());
           // dd($tran);
            return view('transaction.form')
                            ->with('tran', $tran)
                            ->withErrors($v);
        }
    }
    
    

}
