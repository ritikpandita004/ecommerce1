<?php

namespace App\Http\Controllers;
use App\Models\usercart;
use Illuminate\Http\Request;
use App\Models\products;


class Cart extends Controller
{
    public function UserCart()
    {
        return view("users/cart");
    }

    public function StoreCart(Request $request){
        $existingProduct = usercart::where('u_id', session('id'))->where('p_id', $request->p_id)->first();
        $productPrice = $request->p_price;
      
      if ($existingProduct) {
        $existingProduct->qty += 1;
        $existingProduct->subtotal = $productPrice * $existingProduct->qty;
        $existingProduct->tax = $existingProduct->subtotal * 0.1;
        $existingProduct->total = $existingProduct->subtotal + $existingProduct->tax; // 
        $existingProduct->save();
        } 
          else {
      
        $products= new usercart;
        $products->u_id=session('id');
        $products->p_id=$request->p_id;
        $products->qty=1;
        $productTax=(int)0;
        $productPrice=$request->price;
        $length = strlen($productPrice);
        $productPrice = (int)(substr($productPrice,1));
        $products->subtotal=$productPrice;
        $productTax = ($productPrice*10)/100;
        $products->tax=$productTax;
        $products->total=$productPrice+$productTax;
        $products->save();

        $userCartItems = usercart::where('u_id', session('id'))->get();
       
        foreach( $userCartItems as $cartItem){
            $cartItem->p_id;
            $products=products::where('id',$cartItem->p_id)->get();
            $cartItem->p_name=$products[0]->productname;
            $cartItem->p_price=$products[0]->price;
            $cartItem->image=$products[0]->image;
        }
        return view('users/cart', compact("userCartItems"));
    }
    }
    public function ViewCart(Request $request){

        $userCartItems = usercart::where('u_id', session('id'))->get();
       
        foreach( $userCartItems as $cartItem){
            $products=products::where('id',$cartItem->p_id)->get();
            $cartItem->p_name=$products[0]->productname;
            $cartItem->p_price=$products[0]->price;
            $cartItem->image=$products[0]->image;
        }
        return view('users/cart', compact("userCartItems"));
    }
   
    public function CartProductRemove(Request $request){

        $remove = usercart::where('id', $request->id)->delete();
       return redirect()->route('viewCart');
    }

 
   
}