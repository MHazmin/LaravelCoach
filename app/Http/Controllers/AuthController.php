<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staf;


class AuthController extends Controller {
    /* insid sso
     * 
     */

    public function getSso() {
        $nokp = 841130115137;
        $staf = Staf::where('nokp', $nokp)
                        ->where('kata_laluan', md5('841130115137'))->first();
        if ($staf) {
            //echo $staf->nama;
            //log in here
            //check kt table user lara50 nokp
            //\Auth::loginUsingId($nokp);
            $user = User::find($nokp);
            dd($user);
            if ($user) {
                //user wujud dlm lara50 dan insid
                \Auth::login($user);
                if (\Auth::check()) {
                    $user = \Auth::user();
                    echo 'nama = ' . $user->name;
                    echo 'berjaya login';
                } else {
                    echo 'tidak berjaya';
                }
            }else{
                echo 'user tidak wujud dalam lara50';
            }
        } else {
            echo 'pengguna x wujud';
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    public function getLogin() {
        return view('user.login');
    }

    public function postAuth(Request $req) {
        if (\Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            //echo 'berjaya';die;
           // \Session::put('user', 'hazmin');
            return redirect('user/list');
        } else {
            //echo 'gagal';die;
            return view('user.login')->with('msg', 'Login tidak berjaya');
        }
    }

    public function getLogout() {
        \Auth::logout();
        return redirect('login/login');
    }

}
