<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\products;
use Illuminate\Support\Facades\Session; 
class orders extends Controller
{
    public function orderViewForUser()
    {
        $uid = Session::get('id');
        $data = Order::where('u_id', $uid)->get();
        
        foreach ($data as $order) {
            // Access p_id property on each $order object
            $products = $order->p_id;
            $products_json = json_encode($products);
            dd($products_json);
        }
    
        // return view('users/orders', compact("data"));
    }
    
}