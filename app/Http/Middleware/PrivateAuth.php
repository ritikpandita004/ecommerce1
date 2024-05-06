<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PrivateAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
       
        if ($request->session()->has('id')) {
            // return $next($request);
            $response = $next($request);
        $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
         $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
         return $response;
        }

        
        return redirect('login');

     }
//     public function handle($request, Closure $next)
// {
//     // Check if the user is already logged in
//     if ($request->session()->has('id')) {
//         // Redirect them to the appropriate dashboard or home page
//         return redirect('welcome'); // Assuming 'welcome' is the admin dashboard page
//     }

//     // If the user is not logged in, allow them to access the login page
//     $response = $next($request);
//     $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
//     $response->headers->set('Pragma', 'no-cache');
//     $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
//     return $response;
// }

}
