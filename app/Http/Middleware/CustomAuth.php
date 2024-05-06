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
    public function handle(Request $request, Closure $next)
     {

        // $path = $request->path();
    
        // if (Session::has('id') && $path == "login" && $path == "register" && $path == "adminlogin" ) {
            
        //     return redirect()->route('welcome');;
        // }
        // if (!Session::has('id') && $path == "login" && $path == "register" && $path == "adminlogin" ) {
            
        //     return  $next($request);
        // }
        // if (!Session::has('id') && $path != "login" && $path != "register" && $path != "adminlogin" ) {
            
        //     return redirect()->route('welcome');
        // }
      
        // $response = $next($request);
        // $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
        // $response->headers->set('Pragma', 'no-cache');
        // $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        // return $response;
        return  $next($request);
    }
    
}


