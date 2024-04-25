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

class Admin extends Controller
{
    public function adminLoginView()
    {

        return view("admin/auth/admin");
    }


    public function adminLogin(Request $request)
    {

        $admin = adminLLogin::where('username', $request["email"])->first();
        if ($admin->username == $request->email && $admin->password == md5($request->password)) {
            return redirect("homepage");
        } else {

            return view("admin/auth/admin");
        }
    }



    public function createCategory()
    {
        return view("admin/categories/createCategory");
    }



    public function storeCategory(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->categoryName;
        $categories->categoryDescription = $request->categoryDescription;
        $image = $request->file('categoryImage');

        // Ensure the file is present and valid
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
                'price' => 'required|numeric',
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
                'price.numeric' => 'The price must be a numeric value.',
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
                return redirect("/viewproducts");
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
        Session::forget('user');
        return view("users/auth/login");
    }
}
