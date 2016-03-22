<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//load model
use App\Models\User;
use App\Models\Profile;
use App\Models\Item;
use App\Http\Controllers\Session;

class UserController extends Controller {

    public function getList() {
        //$users = User::all();
        $data = \Session::all();
        //$value = \Session::get('email');
       // dd($data);
        
//        if(\Session::has('email')){
//            echo 'asdasd';
//        }else{
//            echo '111111111';
//        }
        
        $users = User::paginate(3);
        $profile = Profile::all();
        //dd($users);die;
        return view('user.list', compact('users', 'profile'));
    }

    //find user data
    public function getProfile($profile_id) {
        $profile = Profile::find($profile_id);
        echo $profile->user->name;
    }

    //get item from specific user id
    public function getItem($user_id) {
        $user = User::find($user_id);
        dd($user->f_item);

        foreach ($user->f_item as $item) {
            echo $item->name . '<br>';
        }
    }

    // item dan senarai pembelinya
    public function getUser($item_id) {
        $item = Item::find($item_id);
        echo $item->name . '<br>';
        foreach ($item->f_user as $user) {
            echo $user->name . '<br>';
        }
    }

    //create form registration

    public function getCreate() {
        $user = new User();
        $profile = new Profile();

        return view('user.form', compact('user', 'profile'));
    }

    public function getUpdate($id) {
        $user = User::find($id);
        $profile = Profile::find($id);
         if (!$profile) {
                $profile = new Profile();
            }
        return view('user.form', compact('user', 'profile'));
    }

    public function postSave(Request $req) {
        //dd($req->id);
        if ($req->id === '') {
            //insert
            // echo 'asdasd';die;
            $user = new User();
            $profile = new Profile();
        } else {
            //update
            $user = User::find($req->id);
            $profile = Profile::where('user_id', $user->id)->first();
            //$profile = Profile::where('user_id',$user->id)->where('email',like,'%abc%')->first();
            if (!$profile) {
                $profile = new Profile();
            }
        }

        $user->name = $req->name;
        $profile->email = $req->email;
        $profile->post = $req->position;

        $data = $user->getAttributes() + $profile->getAttributes();
        $rules = $user->getRules() + $profile->getRules();

        //validation
        $v = \Illuminate\Support\Facades\Validator::make($data, $rules, $user->messages());
        //$v = \Illuminate\Support\Facades\Validator::make($user->getAttributes(), $user->getRules(), $user->messages());

        if ($v->passes()) {
            $user->save();
            $profile->user_id = $user->id;
            $profile->save();
            $req->session()->flash('msg', '');
            return redirect('user/list');
        } else {
            return view('user.form', compact('user', 'profile'))->withErrors($v);
        }
    }

    public function getDelete($id) {
        $user = User::find($id);
        $profile = Profile::where('user_id', $user->id)->first();
        $user->delete();

        if ($profile) {
            $profile->delete();
        }
        return redirect('user/list');
    }

}
