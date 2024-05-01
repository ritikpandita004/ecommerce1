<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Category;
use App\Models\Brand;
use App\Models\usercart;
use Illuminate\Support\Facades\Session; 
class ProductDetails extends Controller
{
    public function productDetailsForUser(Request $request)
{
    
    $productDetails = products::where('id', $request->id)->get();


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