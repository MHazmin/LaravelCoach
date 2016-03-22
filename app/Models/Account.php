<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	//
        protected $table = 'account';
        
        //protected 


        public function mtransaction() {
            
            return $this->hasMany('App\Models\Transaction','acct_id');
        }
        
        public function accountuser() {
            return $this->belongsTo('App\Models\User','user_id');
        }

}
