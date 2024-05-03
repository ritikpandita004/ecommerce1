<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\adminLLogin;
use App\Models\products;
use Illuminate\Support\Facades\Validator;
class adminUpdate extends Controller
{
  public function productEdit(Request $request)
{
     $data = products::findOrFail($request->product_id); 
     
     $catData =Category::findOrFail($data ->category); 

      return view('admin/products/editproduct', compact('data','catData'));
}
public function productupdate(Request $request)
{
    $request->validate([
        'productname' => 'required|string|max:255',
        'productdescription' => 'required|string',
        'price' => 'required|numeric|gt:0',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max file size is 2MB
    ], [
        'productname.required' => 'Product name is required.',
        'productdescription.required' => 'Product description is required.',
        'price.required' => 'Price is required.',
        'price.numeric' => 'Price must be a number.',
        'price.gt' => 'Price must be greater than 0.',
        'image.image' => 'Uploaded file must be an image.',
        'image.mimes' => 'Supported image formats are: jpeg, png, jpg, gif.',
        'image.max' => 'Uploaded image must be less than 2MB in size.'
    ]);
   
    $product = products::find($request->id);

    
    $product->productname = $request->productname;
    $product->category = $request->category_id; 
    $product->brand = $request->brand;
    $product->productdescription = $request->productdescription;
    $product->price = $request->price;

  
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        
        $image->move(public_path('images'), $imageName);
        $product->image = 'images/' . $imageName; 
    } elseif ($request->existing_image) {
       
        $product->image = $request->existing_image;
    }

    
    $product->save();

   
    return redirect()->route('ViewProduct')->with('success', 'Product edited successfully');
}
    


public function productDelete(Request $request)
{
   
    $product = products::find($request->product_id);


    if ($product) {
       
        $product->delete();
        $data = products::all();

       
     
        return redirect()->route('ViewProduct')->with('success', 'Product deleted successfully');
      } else {
          $data = products::all(); 
          return redirect()->route('ViewProduct')->with('error', 'Product not found');
      }


  }
}
