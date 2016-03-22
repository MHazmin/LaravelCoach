<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    public $timestamps = false;
    
    private $rules = [
        'email' => 'required|email',
        'post' => 'required',
    ];
    
    public function getRules() {
        return $this->rules;
    }
    //if nama x same dengan db kne buat ni
    protected $table = 'profile';

    //nak wujudkan relation dengan table user
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
