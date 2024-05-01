<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\usercart; // Adjust the namespace as per your application structure
use Illuminate\Support\Facades\Session; 
class FetchUserCartItems
{
    public function handle($request, Closure $next)
    {
        // Fetch user's cart items
        $userCartItems = usercart::where('u_id', Session::get('id'))->get();

        // Share the cart items with all views
        view()->share('users/cart', $userCartItems);

        // Proceed to the next middleware or route handler
        return $next($request);
    }
}
