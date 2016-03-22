<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Log;


class Admin {

    public function handle($request, Closure $next) {
        // 1. dapatkan user role
        // 2. check role yang boleh masuk sini
        $user = \Auth::user();
        $allow = ['DEPT'];


        if (in_array($user->role, $allow)) {
            return $next($request);
        } else {
            // tiada akses
            echo 'No Akses PErmission';
            exit;
        }
    }

}
