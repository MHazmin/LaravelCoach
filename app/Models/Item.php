<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	//
        protected $table = 'item';
        
//         //nak wujudkan relation dengan table profile
//        public function muser_item() {
//            return $this->hasOne('App\Models\User_item');
//        }
        
    public function f_user() {
        return $this->belongsToMany('App\Models\User','user_item');
    }

}
