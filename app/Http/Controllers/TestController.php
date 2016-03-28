<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TestController extends Controller {

    public function getValidation() {
        $data = ['ic' => '791130095137'];
//        $rule = ['ic' => "regex:/^[0-9]{12}$/"];
        //perlis & lelaki & lahir dr tahun 1970 - 1980
        $rule = ['ic' => ["regex:/^(7[0-9]|80)[0-9][4]09[0-9]{3}[1,3,5,7,9]$/"]];
        $v = \Validator::make($data, $rule);

        if ($v->passes()) {
            echo 'ok';
        } else {
            echo 'ko';
        }
    }

    public function getDateValidation() {
        $data = ['date' => '23/03/2016'];
        $rule = ['date' => 'date_format:d/m/Y'];
        $v = \Validator::make($data, $rule);
        if ($v->passes()) {

            echo 'passed';
        } else {
            echo 'failed';
        }
    }

    public function getDatevalstartend() {
        $data = ['date_start' => '27/03/2016', 'date_end' => '24/03/2016'];
        $rule = ['date_start' => 'date_format:d/m/Y|before:date_end', 'date_end' => 'date_format:d/m/Y'];
        $v = \Validator::make($data, $rule);
        if ($v->passes()) {

            echo 'passed';
        } else {
            $v->error();
            echo 'failed';
        }
    }

    public function getCustomval() {
        \Validator::extend('date_le', function($attribute, $value, $param) {
//            dd($param);
            $date_start = $value;
            $date_end = $param[0];

            $date_start = date_parse_from_format('d/m/Y', $date_start);
            $date_end = date_parse_from_format('d/m/Y', $date_end);

            //strottime() mesti dlm format Y-m-d
            $str1 = $date_start['year'] . '-' . $date_start['month'] . '-' . $date_start['day']; /// return 2016-03-25
            $str2 = $date_end['year'] . '-' . $date_end['month'] . '-' . $date_end['day']; /// return 2016-03-25


            echo 'date start = ' . strtotime($str1);
            echo 'date end = ' . strtotime($str2);

            if (strtotime($str1) <= strtotime($str2)) {
                return true;
            } else {
                return false;
            }
        });

        // before:date or after:date date mesti follow format strtoitme

        $data = [
            'date_start' => '24/03/2016',
            'date_end' => '24/03/2016',
            'name' => ''];
        
        // $rule = ['date_start'=>"date_format:d/m/Y|date_le:{$data['date_end']}",'date_end'=>'date_format:d/m/Y'];

        $msg = [
            'date_le' => 'Tarikh mula mesti lebih kecil atau sama dengan tarikh akhir',
            'name.required' => 'Namewajib isi'
        ];

        $rule = [
            'date_start' => "date_format:d/m/Y|date_le:{$data['date_end']}",
            'date_end' => 'date_format:d/m/Y',
            'name' => 'required'
        ];


            

        $v = \Validator::make($data, $rule, $msg);
        if ($v->passes()) {

            echo 'passed';
        } else {
            // $v->error();
            echo 'failed';
        }
    }
    
    
    public function getCustomvalidator() {
        
        $data = ['no'=>10];
        $rule = ['no'=>'greater_than:5'];
//        $rule = ['no'=>''];
        $v = \Validator::make($data,$rule);
        if($v->passes()){
            echo 'ok';
        }else{
            echo 'failed';
        }
        
    }
    public function getCustomvalidator2() {
        
        $data = ['no'=>20];
        $rule = ['no'=>'greater_than:50'];
//        $rule = ['no'=>''];
        $msg = ['greater_than'=>'attribute mesti > :foo'];
        $v = \Validator::make($data,$rule,$msg);
        if($v->passes()){
            echo 'ok';
        }else{
            dd($v->errors());
            echo 'failed';
        }
        
    }

}
