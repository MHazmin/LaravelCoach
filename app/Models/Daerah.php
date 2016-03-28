<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model {

    public $timestamps = false;
    protected $table = 'daerah';

    // return array ['cat'=> 'descr']of a specific categori
     public static function getData($idnegeri, $choose = true) {
        
         
        if ($idnegeri == !'') {
            
            $refs = self::where('id_negeri', $idnegeri)
                     ->select('id as idd','id_negeri as idn', 'nama as daerah')
                    ->get();
        } else {
            $refs = self::select('id as idd','id_negeri as idn', 'nama as daerah')->get();

        }
        
        if ($choose) {
            $arr = ['0' => '--Sila Pilih--'];
        } else {
            $arr = [];
        }

        foreach ($refs as $ref) {
         //   dd($ref);
            $arr[$ref->idd] = $ref->daerah;
        }
        return $arr;
    }

    
  
}
