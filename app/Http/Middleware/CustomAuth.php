<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     $path=$request->path();
    //     if(($path=="login"||$path=="register") && Session::get('id'))
    //     {
    //         return redirect('/');
    //     }
    //     else if(($path!="login" &&  !Session::get('id') ) && ($path=="register" &&  !Session::get('id'))){
    //         return redirect('/login');
    //     }
      
    //     return $next($request);

    // }
}
