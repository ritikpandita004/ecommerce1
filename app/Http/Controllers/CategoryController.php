<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\products;
class CategoryController extends Controller
{

public function showUserCatProduct(Request $request)
{

    $products = products::where('category',  $request->category_id)->get();
    return view ('users/Products/productCat', compact('products'));
}

 
}
