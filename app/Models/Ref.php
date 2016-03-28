<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ref extends Model
{
    public $timestamps = false;
    protected $table = 'ref';

    
    // return array ['cat'=> 'descr']of a specific categori
    public static function getData($cat,$code='')
    {
        $refs = self::where('cat',$cat)->get();
        $arr = [];
        foreach($refs as $ref){
            $arr[$ref->code] = $ref->descr;
        }
        
        return $arr;
    }

  
}
