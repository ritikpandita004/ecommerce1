<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\adminLLogin;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use PhpParser\Node\Stmt\TryCatch;


use Illuminate\Support\Facades\Redirect;
class Admin extends Controller
{
    public function adminLoginView()
    {

        return view("admin/auth/admin");
    }



    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            $admin = adminLLogin::where('username', $request->email)->firstOrFail();
            
            if ($admin->username == $request->email && $admin->password == md5($request->password)) {
                return redirect("homepage");
            } else {
                return redirect()->back()->with('error', 'Invalid username or password.');
            }
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return redirect()->back()->with('error', 'You are not authorize to access admin. Please login as a user');
        }
    }
    



    


    public function createCategory()
    {
        return view("admin/categories/createCategory");
    }



    public function storeCategory(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'categoryName' => 'required|regex:/^[^\d]+$/|max:255',
            'categoryDescription' => 'required|string',
            'categoryImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
         
        ], [
            'categoryName.required' => 'Please enter the a valid category name ',
            'categoryName.regex' => 'The category name must not contain numbers.',
            'categoryName.max' => 'The category name must not exceed 255 characters.',
            'categoryDescription.required' => 'Please enter a valid category description.',
            'categoryDescription.string' => 'The description must be a string.',
            'categoryImage.required' => 'Please select an image for the category.',
            'categoryImage.image' => 'The selected file must be an image.',
            'categoryImage.mimes' => 'Only JPG, PNG, JPEG, and GIF files are allowed for the image.',
            'categoryImage.max' => 'The image must not exceed 2MB in size.',
        ]);
        if ($validatedData->fails()) {
            return redirect('/create')
                ->withErrors($validatedData)
                ->withInput();
        }

        $categories = new Category();
        $categories->name = $request->categoryName;
        $categories->categoryDescription = $request->categoryDescription;
        $image = $request->file('categoryImage');

        if ($image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public/images directory
            $image->move(public_path('images'), $imageName);

            // Save the image path in the database
            $categories->image = 'images/' . $imageName;
        }
        $categories->save();
        return redirect("/homepage");
    }

    public function admindashboardView()
    {
        return view("admin/viewAdminDashboard");
    }
    public function categories(Request $request)
    {
        $data = Category::all();
        return view('admin/categories/category', compact('data'));
    }

    public function ViewBrand()
    {
        $data = Category::all();
        return view('admin/brand/createbrand', compact('data'));
    }
    public function StoreBrand(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'brandName' => ['required', 'string', function ($attribute, $value, $fail) {
                if (is_numeric($value)) {
                    $fail('The brand name should not be a number.');
                }
            }],
            'cat' => 'required|exists:category,id',
        ], [
            'brandName.string' => 'The name must be a string.',
            'brandName.required' => 'Please select a brand.',
            'cat.required' => 'Please select a category.',
            'cat.exists' => 'The selected category is invalid.',
        ]);
        
        if ($validatedData->fails()) {
            return redirect('/createbrand')
                ->withErrors($validatedData)
                ->withInput();
        }
        //creting a object(brands) of a model (brand)
        $brands = new Brand;
        $brands->category = $request->cat;
        $brands->name = $request->brandName;
        $brands->save();
        return view("admin/homepage");
    }



    public function CreateProduct()
    {
        $categories = DB::table('category')->orderBy('name', 'ASC')->get();
        $data['categories'] = $categories;
        return view('admin/products/addproducts', $data);
    }

    public function Fetchbrands($category)
    {
        $brands = DB::table("brand")->where('category', $category)->get();
        return response()->json([
            'status' => 1,
            'brands' => $brands


        ]);
    }

    // saving products
    public function StoreProduct(Request $request)
    {



        try {
            $validatedData = Validator::make($request->all(), [
                'productName' => 'required|max:255',
                'category' => 'required|exists:category,id',
                'brand' => 'required',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price' => 'required|numeric|min:1',
            ], [
                'productName.required' => 'Please enter the product name.',
                // 'productName.regex' => 'The product name must not contain numbers.',
                'productName.max' => 'The product name must not exceed 255 characters.',
                'category.required' => 'Please select a category.',
                'category.exists' => 'The selected category is invalid.',
                'brand.required' => 'Please select a brand.',
                'description.required' => 'Please enter the product description.',
                'description.string' => 'The description must be a string.',
                'image.required' => 'Please select an image for the product.',
                'image.image' => 'The selected file must be an image.',
                'image.mimes' => 'Only JPG, PNG, JPEG, and GIF files are allowed for the image.',
                'image.max' => 'The image must not exceed 2MB in size.',
                'price.required' => 'Please enter the price of the product.',
                'price.numeric' => 'The price must be a number.',
                'price.min' => 'The price must be greater than 0.',
            ]);

            if ($validatedData->fails()) {
                return redirect('/createproduct')
                    ->withErrors($validatedData)
                    ->withInput();
            }

            $product = new products;
            $product->productname = $request->productName;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->productdescription = $request->description;
           
            $image = $request->file('image');
            if ($image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $product->image = 'images/' . $imageName;
                $product->price = $request->price;
               
                $product->save();
                return redirect("/viewproducts")->with('success', 'Product added successfully');;
            }
        } catch (\Throwable $th) {
            return redirect("/createproduct")->withErrors($th->getMessage());
        }
    }

    public function ViewProduct()
    {
        $data = products::all();
        return view("admin/products/viewproduct", compact('data'));
    }

    public function home()
    {
        return view("admin/homepage");
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        Redirect::back();
           Cache::flush();
           return redirect()->route('login')->with('success', 'Logout Successfull');;
    }
    
}
