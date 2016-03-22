<?php
namespace App\Models;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Priv extends \Illuminate\Database\Eloquent\Model{
    protected  $table = 'priv';
    public $timestamps = 'false';
    
    public static function isPriv($priv_id){
        $user = \Auth::user();
        $priv = Priv::where('user_id', $user->nokp)
                ->where('priv_id',$priv_id)->first();
        
        if($priv){
            //ada permission
            return true;
        }else{
            //xda permission
//            echo "No PErmission";exit;
            return false;
            
        }
        
    }
    
    public static function isPermit($priv_id){
        if(self::isPermit($priv_id)){
            return true;
        }else{
            //xda permission
            echo "No PErmission";exit;
        }
    }
}

