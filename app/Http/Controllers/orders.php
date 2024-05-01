<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\products;
use App\Models\Shipment;
use App\Models\Category;
use App\Models\Brand;
use App\Models\usercart;

use Illuminate\Support\Facades\Session; 

class Orders extends Controller
{
    public function orderViewForUser()
    {
        $uid = Session::get('id');
        $orders = Order::where('u_id', $uid)->get();
        
        $orderData = [];
    
        foreach ($orders as $order) {
            $productIds = json_decode($order->p_id);
            $products = products::whereIn('id', $productIds)->get();
            
           
            $shipmentDetails = Shipment::where('id', $order->s_id)->get();
            $orderData[] = [
                'order' => $order,
                'products' => $products,
                'shipment'=>$shipmentDetails,
            ];
        }

        return view('users/orders', compact('orderData'));
    }

 
    
     public function orderDetails(Request $request){

    $uid = Session::get('id');
    $orders = Order::where('id', $request->order_id)->get();
    
    $orderData = [];

    foreach ($orders as $order) {
        $productIds = json_decode($order->p_id);
    
        
        $productQuantities = array_count_values($productIds);
    
  
        $products = [];
        foreach ($productQuantities as $productId => $quantity) {
            $product = products::find($productId);
            if ($product) {
               
                $product->quantity = $quantity;
                $products[] = $product;
            }
        }
    
        $shipmentDetails = Shipment::where('id', $order->s_id)->get();
    
        $orderData[] = [
            'order' => $order,
            'products' => $products,
            'shipment' => $shipmentDetails,
        ];
    }

    return view('users/orderDetail', compact('orderData'));
     
   
     }
     public function showProductAsPerId(Request $request){
        $productDetails = products::where('id', $request->product_id)->get();
        
    $productAlreadyAddedToCart = false;
    if ($productDetails->isNotEmpty()) {
        $productAlreadyAddedToCart = usercart::where('p_id', $productDetails[0]->id)
                                          ->where('u_id', Session::get('id'))
                                          ->exists();
    }

   
    foreach ($productDetails as $items) {
        $cat = Category::where('id',  $items->category)->get();
        $items->c_name = $cat->isNotEmpty() ? $cat[0]->name : null;
    }

    
    return view("users/Products/productDetails", compact('productDetails', 'productAlreadyAddedToCart'));



        
        
     }

    }