<?php namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	//
        protected $table = 'book';
        
        public function getCreatedAtAttribute($value) {
            //return "tarikh = ".$value;
            return date('d/m/y',  strtotime($value));
        }
        public function getPurchaseAtAttribute($value) {
            //return "tarikh = ".$value;
            return date('d/m/yyyy',  strtotime($value));
        }
        
        // col purchase_at
        public function setPurchaseAtAttribute($value) {
            //convert dd/mm/yyyy to yyyy-mm-dd
            
            $str = explode("/", $value); //['dd','mm','yyyy']
            $this->attributes['purchase_at']= $str[2].'-'.$str[1].'-'.$str[0];
        }

}
