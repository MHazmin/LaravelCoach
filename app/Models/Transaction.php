<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\Model;

class Transaction extends Model{
    //jika nama table transactions x perlu declare bwh ni
    protected $table = 'transaction';
    //kalo xnak add update at n created at
    public $timestamps = false; 
    
    //validation
    private $rules = [
        'type'=> 'required',
        'amount'=> 'required|integer',
        'acct_id'=> 'required|integer',
    ];
    
    public function getRules(){
        return $this->rules;
    }
}

