<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\products;

class navbarcontroller extends Controller
{
    public function NavbarCategoeryUser()
    {

        $data = Category::all();

        return view("users/category/viewcategories", compact('data'));
    }


    public function NavbarUserProducts()
    {

        $data = products::all();

        return view("users/Products/products", compact('data'));
    }
}
