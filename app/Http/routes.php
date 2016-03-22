<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//HTTP verb :  get,post,put,delete,patch

// \Validator::resolver(function($translator,$data,$rules,$message){
//                    return new \App\myvalidator\Validator($translator, $data, $rules,$message);
//                });

Route::get('/animal/{name}/{food?}',  function($name,$food='rumput'){
//    echo $name;
//    echo $food;
    return view('animal');
    
});

 Route::get('foo/bar',  function (){
     echo \Hash::make('bubu');
     echo 'Hello';
 });
 
 
//route resource 
Route::resource('lists','ListController'); 

//middleware hanya yg login sahaja dpt msk
Route::group(['middleware'=>'auth'],  function (){

    Route::controllers([
//        'people' => 'PersonController',
//        'transaction' => 'TransactionController',
	//'user' => 'UserController'
]);

});


//------------------------------------------------ACL---------------------------

//----------------------Admin---------------------
//perlu login,role super admin
Route::group(['middleware'=>['auth','super']],function(){
    Route::controllers([
        'user' => 'UserController'
    ]); 
});
//perlu login,role admin
Route::group(['middleware'=>['auth','admin']],function(){
    Route::controllers([
        'book' => 'BookController',
    ]); 
});

//----------------------Public---------------------
//perlu login,role user
Route::group(['middleware'=>['auth','members']],function(){
    Route::controllers([
        'people' => 'PersonController',
        'transaction' => 'TransactionController',
    ]); 
});

//x perlu login

    Route::controllers([
        'login' => 'AuthController',
        'people' => 'PersonController',
        'transaction' => 'TransactionController',
        'mail' => 'MailController',
	'welcome' => 'WelcomeController',
	'pdf' => 'PdfController',
    ]); 

//---------------------------------------------------END ACL--------------------







//route controller
Route::controllers([
	// 'people' => 'PersonController',
        //'transaction' => 'TransactionController',
	//'user' => 'UserController',
	
	'create' => 'UserController',
//	'login' => 'AuthController',
//	'mail' => 'MailController',
//	'welcome' => 'WelcomeController',
//	//'book' => 'BookController',
//	'pdf' => 'PdfController',
	'fluent' => 'FluentController',
	'test' => 'TestController',
    
]);





Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::any('captcha-test', function()
    {
    \Illuminate\Support\Facades\Log::info("aaaa");
        if (Request::getMethod() == 'POST')
        {
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            }
            else
            {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }

        $form = '<form method="post" action="captcha-test">';
        $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        $form .= '<p>' . captcha_img() . '</p>';
        $form .= '<p><input type="text" name="captcha"></p>';
        $form .= '<p><button type="submit" name="check">Check</button></p>';
        $form .= '</form>';
        return $form;
    });