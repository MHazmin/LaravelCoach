<?php
namespace App\myvalidator;


class Validator extends \Illuminate\Validation\Validator {
    
    public function validateGreaterThan($attribute, $value , $param) {
       
         return $value > $param[0];
    }
    
    /*
     * display error msg
     */
    public function replaceGreaterThan($msg,$attribute, $value , $param) {
       //return "Munber mesti lebih besar"
         return str_replace(':foo', $param[0], $msg);
    }
    
    
}
