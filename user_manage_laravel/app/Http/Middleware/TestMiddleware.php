<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        $userName =  $request->name;
//        $password =  $request->password;
//        $check = DB::table('user')->where('name','=', $userName)->where('password', '=', $password)->count();
        if (Auth::check()){
            return $next ($request);
        }
        else{
            return redirect('login');
        }

    }
}
