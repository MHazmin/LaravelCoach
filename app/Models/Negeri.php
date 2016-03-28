<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negeri extends Model {

    public $timestamps = false;
    protected $table = 'negeri';

    // return array ['cat'=> 'descr']of a specific categori
    public static function getData($cat, $code = '', $param1 = '', $choose = true) {
        if ($param1 == !'') {
            $refs = self::where('cat', $cat)
                    ->join('daerah', 'negeri.id', '=', 'daerah.id_negeri')
                     ->select('negeri.id as idn','negeri.nama as negeri' , 'daerah.id as idd','daerah.nama as daerah')
                    ->where('daerah.id_negeri', $param1)
                    ->get();
            //echo 'asdas';die;
        } else {
             //echo '22';die;
            $refs = self::join('daerah', 'negeri.id', '=', 'daerah.id_negeri')
                    ->select('negeri.id as idn','negeri.nama as negeri' , 'daerah.id as idd','daerah.nama as daerah')
                    ->get();
        }
       // dd($refs);
        if ($choose) {
            $arr = ['0' => '--Sila Pilih--'];
        } else {
            $arr = [];
        }

        foreach ($refs as $ref) {
         //   dd($ref);
            $arr[$ref->idn] = $ref->negeri;
        }
        return $arr;
    }
    
       // return array ['cat'=> 'descr']of a specific categori
     public static function getDataa($choose = true) {
         $refs = self::select('id as idn', 'nama as negeri')->get();
 
        if ($choose) {
            $arr = ['0' => '--Sila Pilih--'];
        } else {
            $arr = [];
        }

        foreach ($refs as $ref) {
            
            $arr[$ref->idn] = $ref->negeri;
        }
        return $arr;
    }

}
