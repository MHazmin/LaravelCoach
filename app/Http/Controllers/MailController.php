<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    public function getSend() {
        $data = User::all();


        Mail::send('emails.test1', ['nama' => 'Hazmin'], function($message) {
            $message->to('mhazmin3011@gmail.com')
                    ->cc('azman120474@gmail.com')
                    ->subject('Test Laravel');
        });
    }

    public function getSendtomany() {


        Mail::send('emails.test1', ['nama' => 'Hazmin'], function($message) {
            $users = User::all();
            foreach ($users as $user) {
                
                $message->to($user->email, $user->name)
                        ->cc('azman120474@gmail.com');
            }
            $message->subject('Cuti Sekolah');
        });
    }

    public function getSendtomanydifcontent() {

        $users = User::all();
        foreach ($users as $user) {
            Mail::send('emails.test2', ['user' => $user], function($message)use($user) {
                $message->to($user->email, $user->name);
                $message->subject('Pertukaran Segera!!');
            });
        }
    }

    public function getSendattach() {
//         $file = base_path().'\doc\file.pdf';
//         dd($file);
        Mail::send('emails.test1', ['nama' => 'Hazmin'], function($message) {
            $file = base_path().'\doc\file2.pdf';
            $message->to('mhazmin3011@gmail.com')
                    ->cc('azman120474@gmail.com')
                    ->subject('Test Laravel')
                    ->attach($file);
        });
    }
    public function getSendqueue() {
        Mail::queue('emails.test1', ['nama' => 'Hazmin'], function($message) {
            $message->to('mhazmin3011@gmail.com')
                    ->cc('azman120474@gmail.com')
                    ->subject('Test Laravel');
        });
        
        echo 'hello';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
