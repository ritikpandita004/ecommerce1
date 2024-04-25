<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Category;
use App\Models\Brand;

class ProductDetails extends Controller
{
    public function productDetailsForUser(Request $request)
    
    {
        $productDetails = products::where('id', $request->id)->get();
        


        
        foreach ($productDetails as $items) {
            $cat = Category::where('id',  $items->category)->get();
            $items->c_name=$cat[0]->name;
        }


        return view("users/Products/productDetails", compact('productDetails'));
    }

}