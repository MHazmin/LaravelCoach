<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
    use Authenticatable, CanResetPassword;
    
    public $timestamps = false;
    protected $primaryKey = 'nokp';

    private $rules = [
        'name' => 'required|min:3'
    ]; 
    
    public function getRules() {
        return $this->rules;
    }
    
    //overide function dr model
    public function messages() {
        return[
            'name.required'=>'nama wajid isi',
            'name.min'=>'nama mesti lebih dari 3 aksara'
        ];
    }

    //
    protected $table = 'user';

    //nak wujudkan relation dengan table profile
    public function mprofile() {
        return $this->hasOne('App\Models\Profile');
    }

    //nak wujudkan relation dengan table item
    public function f_item() {
        return $this->belongsToMany('App\Models\Item', 'user_item');
    }

}
