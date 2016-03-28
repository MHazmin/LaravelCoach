<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ref extends Model {

    public $timestamps = false;
    protected $table = 'ref';

    // return array ['cat'=> 'descr']of a specific categori
    public static function getData($cat, $code = '', $param1 = '', $choose = true) {
        if ($param1 == !'') {
            $refs = self::where('cat', $cat)
                    ->where('param1', $param1)
                    ->get();
            // echo 'asdas';die;
        } else {
            $refs = self::where('cat', $cat)->get();
        }

        if ($choose) {
            $arr = ['0' => '--Sila Pilih--'];
        } else {
            $arr = [];
        }

        foreach ($refs as $ref) {
            $arr[$ref->code] = $ref->descr;
        }
        return $arr;
    }

}
