<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\myProfile;
use App\Http\Controllers\profileUpdation;
use App\Http\Controllers\Admin;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\navbarcontroller;
use App\Http\Controllers\Cart;
use App\Http\Controllers\ProductDetails;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Razorpay;
use App\Http\Controllers\adminUpdate;
use App\Http\Controllers\orders;
use App\Http\Controllers\ShipmentShow;
use Razorpay\Api\Product;
use App\Http\Controllers\NonRegisterUserProducts;

// Route::get('/', function () {
//     return view('welcome'); 
// })->name('welcome');
// Route::get("/register",[RegisterController::class,'register'])->name('register');
// Route::post("/register",[RegisterController::class,'registerUser'])->name('storedata');
// Route::get('/userRegistration/{token}',[RegisterController::class,'VerificationEmail']);
// Route::get('/login',[LoginController::class,'userLogin'])->name('login');
// Route::post('/login',[LoginController::class,'loginCheck'])->name('loginCheck');
// Route::get('/myprofile',[myProfile::class,'viewProfile'])->name('myProfile');
// Route::get('/updateView',[profileUpdation::class,'editProfile'])->name('updateView');
// Route::post('/updateProfile',[profileUpdation::class,'updateMyProfile'])->name('updateProfle');

// Route::get('/adminlogin',[Admin::class,'adminLoginView'])->name('adminlogin');
// Route::post('/adminlogin',[Admin::class,'adminLogin'])->name('adminlogin');
// Route::get('/admindashboard',[Admin::class,'admindashboardView'])->name('admindashView');
// Route::get('/create',[Admin::class,'createCategory'])->name('createcategory');
// Route::post('/create',[Admin::class,'storeCategory'])->name("storeCategory");
// Route::get('/category',[Admin::class,'categories'])->name('categoryView');
// Route::get('/homepage',[Admin::class,'home'])->name("home");
// Route::get('/createbrand',[Admin::class,'ViewBrand'])->name("createview");
// Route::post('/storebrand',[Admin::class,'StoreBrand'])->name("StoreBrand");
// Route::get('/logout',[Admin::class, 'Logout' ])->name("logout");
// Route::get('/createproduct',[Admin::class, 'CreateProduct' ])->name("CreateProduct");
// Route::post('/createproduct',[Admin::class, 'StoreProduct' ])->name("Storeproduct");
// Route::get('/viewproducts',[Admin::class, 'ViewProduct' ])->name("ViewProduct");
// Route::get('/aboutus', function () {
// return view('users/aboutus'); 
// });
// Route::get('/contactus', function () {
// return view('users/contact');
// });
// Route::post('/contactus',[QueryController::class, 'StoreQueryofUser' ])->name("query");
// Route::post('/Fetchbrands/{category}',[Admin::class, 'Fetchbrands' ])->name("Fetchbrands");


// Route::get('/categoryuser',[navbarcontroller::class, 'NavbarCategoeryUser' ])->name("usercategory");

// Route::get('/productuser',[navbarcontroller::class, 'NavbarUserProducts' ])->name("userproduct");
// Route::post('/productcart',[Cart::class, 'StoreCart' ])->name("storeCart");
// Route::get('/productcart',[Cart::class, 'ViewCart' ])->name("viewCart");
// Route::get('/cart',[Cart::class, 'UserCart' ])->name("userCart");
// Route::get('/cartremove',[Cart::class, 'CartProductRemove' ])->name("productcartremove");
// Route::get('/placeorder',[Razorpay::class, 'PlaceOrder' ])->name("placeorder");
// // Route::get('/payments',[Razorpay::class, 'UserPayment' ])->name("payments");
// Route::get('/success',[Razorpay::class, 'Success' ])->name("success");

// Route::post('/updatecart', [Cart::class, 'updateQuantity'])->name('updatequantity');
// Route::post('/updatecartt', [Cart::class, 'DeleteQuantity'])->name('deleteQuantity');
// Route::get('/productDetail',[ProductDetails::class, 'ProductDetailsForUser' ])->name("userProductDetail");
// Route::get('/querysubmitted', function () {
//     return view('users/querysubmitted'); 
// });
// Route::get('/shipment',[Razorpay::class, 'shipmentOrderView' ])->name("shipmentview");
// Route::post('/shipmentstore',[Razorpay::class, 'shipmentOrderStore' ])->name("shipmentOrderStore");
// Route::get('/orders',[orders::class, 'orderViewForUser' ])->name("orders");
//    Route::get('/queries',[QueryController::class, 'viewQueryInAdmin' ])->name("queries");


//   Route::get('/catproduct',[CategoryController::class, 'showUserCatProduct' ])->name("catproductview");






























// Route::group(['middleware'=>"web"],function(){

//     Route::get('/', function () {
//         return view('welcome'); 
//     })->name('welcome');
//     Route::get("/register",[RegisterController::class,'register'])->name('register');
//     Route::post("/register",[RegisterController::class,'registerUser'])->name('storedata');
//     Route::get('/userRegistration/{token}',[RegisterController::class,'VerificationEmail'])->name('userVerificationLink');
    
//     Route::get('/login',[LoginController::class,'userLogin'])->name('login');
//     Route::post('/login',[LoginController::class,'loginCheck'])->name('loginCheck');
//     Route::get('/resentpasswordlink',[ForgotPasswordController::class,'forgetPasswordShowForm'])->name('resentpasswordlink');
//     Route::get('/resetPassword/{token}',[ForgotPasswordController::class,'resetPasswordLoad'])->name('forgotpass');
//     Route::post('/resetPassword',[ForgotPasswordController::class,'resetPassword'])->name('resetPassword');
    
//     Route::post('/changePassword',[ForgotPasswordController::class,'changePassword'])->name('changePassword');
//     Route::get('/myprofile',[myProfile::class,'viewProfile'])->name('myProfile');
//     Route::get('/updateView',[profileUpdation::class,'editProfile'])->name('updateView');
//     Route::post('/updateProfile',[profileUpdation::class,'updateMyProfile'])->name('updateProfle');
    
//     Route::get('/adminlogin',[Admin::class,'adminLoginView'])->name('adminlogin');
//     Route::post('/adminlogin',[Admin::class,'adminLogin'])->name('adminlogin');
//     Route::get('/admindashboard',[Admin::class,'admindashboardView'])->name('admindashView');
//     Route::get('/create',[Admin::class,'createCategory'])->name('createcategory');
//     Route::post('/create',[Admin::class,'storeCategory'])->name("storeCategory");
//     Route::get('/category',[Admin::class,'categories'])->name('categoryView');
//     Route::get('/homepage',[Admin::class,'home'])->name("home");
//     Route::get('/createbrand',[Admin::class,'ViewBrand'])->name("createview");
//     Route::post('/storebrand',[Admin::class,'StoreBrand'])->name("StoreBrand");
//     Route::get('/logout',[Admin::class, 'Logout' ])->name("logout");
//     Route::get('/createproduct',[Admin::class, 'CreateProduct' ])->name("CreateProduct");
//     Route::post('/createproduct',[Admin::class, 'StoreProduct' ])->name("Storeproduct");
//     Route::get('/viewproducts',[Admin::class, 'ViewProduct' ])->name("ViewProduct");
//     Route::get('/aboutus', function () {
//     return view('users/aboutus'); 
//     });
//     Route::get('/contactus', function () {
//     return view('users/contact');
//     });
//     Route::post('/contactus',[QueryController::class, 'StoreQueryofUser' ])->name("query");
//     Route::post('/Fetchbrands/{category}',[Admin::class, 'Fetchbrands' ])->name("Fetchbrands");
    
    
//     Route::get('/categoryuser',[navbarcontroller::class, 'NavbarCategoeryUser' ])->name("usercategory");
    
//     Route::get('/productuser',[navbarcontroller::class, 'NavbarUserProducts' ])->name("userproduct");
//     Route::post('/productcart',[Cart::class, 'StoreCart' ])->name("storeCart");
//     Route::get('/productcart',[Cart::class, 'ViewCart' ])->name("viewCart");
//     Route::get('/cart',[Cart::class, 'UserCart' ])->name("userCart");
//     Route::get('/cartremove',[Cart::class, 'CartProductRemove' ])->name("productcartremove");
//     Route::get('/placeorder',[Razorpay::class, 'PlaceOrder' ])->name("placeorder");
//     // Route::get('/payments',[Razorpay::class, 'UserPayment' ])->name("payments");
//     Route::get('/success',[Razorpay::class, 'Success' ])->name("success");
    
//     Route::post('/updatecart', [Cart::class, 'updateQuantity'])->name('updatequantity');
//     Route::post('/updatecartt', [Cart::class, 'DeleteQuantity'])->name('deleteQuantity');
//     Route::get('/productDetail',[ProductDetails::class, 'ProductDetailsForUser' ])->name("userProductDetail");
//     Route::get('/querysubmitted', function () {
//         return view('users/querysubmitted'); 
//     });
//     Route::get('/shipment',[Razorpay::class, 'shipmentOrderView' ])->name("shipmentview");
//     Route::post('/shipmentstore',[Razorpay::class, 'shipmentOrderStore' ])->name("shipmentOrderStore");
//     Route::get('/catproduct',[CategoryController::class, 'showUserCatProduct' ])->name("catproductview");
//     Route::get('/admincatproduct',[CategoryController::class, 'AdminshowUserCatProduct' ])->name("admincatproductview");
//     Route::get('/orders',[orders::class, 'orderViewForUser' ])->name("orders");
//     Route::get('/ordersdetails',[orders::class, 'orderDetails' ])->name("ordersdetails");

//     Route::get('/queries',[QueryController::class, 'viewQueryInAdmin' ])->name("queries");
//     Route::post('/queriesstatus',[QueryController::class, 'updateStatus' ])->name("updateStatus");
//     Route::get('/shipmentdetails',[ShipmentShow::class, 'shipmentShowToUser' ]);
//     Route::get('/productdetails',[orders::class, 'showProductAsPerId' ])->name("productdetails");
//     Route::get('/productedit',[adminUpdate::class, 'productEdit' ])->name("productedit");
//     Route::post('/productupdate',[adminUpdate::class, 'productUpdate' ])->name("productupdate");
//     Route::get('/productdelete',[adminUpdate::class, 'productDelete' ])->name("productdelete");
//     Route::get('/adminproductdetails',[ProductDetails::class, 'AdminproductDetailsForUser' ])->name("adminproductdetails");
     
// });














































Route::middleware(['web', 'isprivate'])->group(function () {

    
    Route::post('/changePassword',[ForgotPasswordController::class,'changePassword'])->name('changePassword');
    Route::get('/myprofile',[myProfile::class,'viewProfile'])->name('myProfile');
    Route::get('/updateView',[profileUpdation::class,'editProfile'])->name('updateView');
    Route::post('/updateProfile',[profileUpdation::class,'updateMyProfile'])->name('updateProfle');
    
   
   
    Route::get('/aboutus', function () {
    return view('users/aboutus'); 
    });
    Route::get('/contactus', function () {
    return view('users/contact');
    });
    Route::post('/contactus',[QueryController::class, 'StoreQueryofUser' ])->name("query");
   
    Route::get('/categoryuser',[navbarcontroller::class, 'NavbarCategoeryUser' ])->name("usercategory");
    
    Route::get('/productuser',[navbarcontroller::class, 'NavbarUserProducts' ])->name("userproduct");
    Route::post('/productcart',[Cart::class, 'StoreCart' ])->name("storeCart");
    Route::get('/productcart',[Cart::class, 'ViewCart' ])->name("viewCart");
    Route::get('/cart',[Cart::class, 'UserCart' ])->name("userCart");
    Route::get('/cartremove',[Cart::class, 'CartProductRemove' ])->name("productcartremove");
    Route::get('/placeorder',[Razorpay::class, 'PlaceOrder' ])->name("placeorder");
    // Route::get('/payments',[Razorpay::class, 'UserPayment' ])->name("payments");
    Route::get('/success',[Razorpay::class, 'Success' ])->name("success");
    
    Route::post('/updatecart', [Cart::class, 'updateQuantity'])->name('updatequantity');
    Route::post('/updatecartt', [Cart::class, 'DeleteQuantity'])->name('deleteQuantity');
    Route::get('/productDetail',[ProductDetails::class, 'ProductDetailsForUser' ])->name("userProductDetail");
    Route::get('/querysubmitted', function () {
        return view('users/querysubmitted'); 
    });
    Route::get('/shipment',[Razorpay::class, 'shipmentOrderView' ])->name("shipmentview");
    Route::post('/shipmentstore',[Razorpay::class, 'shipmentOrderStore' ])->name("shipmentOrderStore");
    Route::get('/catproduct',[CategoryController::class, 'showUserCatProduct' ])->name("catproductview");
 
    Route::get('/orders',[orders::class, 'orderViewForUser' ])->name("orders");
    Route::get('/ordersdetails',[orders::class, 'orderDetails' ])->name("ordersdetails");

    Route::get('/queries',[QueryController::class, 'viewQueryInAdmin' ])->name("queries");
    Route::post('/queriesstatus',[QueryController::class, 'updateStatus' ])->name("updateStatus");
    Route::get('/shipmentdetails',[ShipmentShow::class, 'shipmentShowToUser' ]);
    Route::get('/productdetails',[orders::class, 'showProductAsPerId' ])->name("productdetails");
   
    Route::get('/', function () {
        return view('welcome'); 
    })->name('welcome');
     
});







Route::middleware(['web', 'ispublic'])->group(function () {

   
    Route::get("/register",[RegisterController::class,'register'])->name('register');
    Route::post("/register",[RegisterController::class,'registerUser'])->name('storedata');
    Route::get('/userRegistration/{token}',[RegisterController::class,'VerificationEmail'])->name('userVerificationLink');
    
    Route::get('/login',[LoginController::class,'userLogin'])->name('login');
    Route::post('/login',[LoginController::class,'loginCheck'])->name('loginCheck');
    Route::get('/resentpasswordlink',[ForgotPasswordController::class,'forgetPasswordShowForm'])->name('resentpasswordlink');
    Route::get('/resetPassword/{token}',[ForgotPasswordController::class,'resetPasswordLoad'])->name('forgotpass');
    Route::post('/resetPassword',[ForgotPasswordController::class,'resetPassword'])->name('resetPassword');
   
    Route::get('/registerhomepage', function () {
        return view('registerhomepage'); 
    })->name('registerhomepage');
     
    Route::get('/productswithoutauth',[NonRegisterUserProducts::class,'ViewProductWithOutRegister'])->name('productswithoutauth');
    Route::get('/productsdetailswithoutauth',[NonRegisterUserProducts::class,'productDetailsForUser'])->name('productsdetailswithoutauth');
   
});




//admin routes
Route::get('/admindashboard',[Admin::class,'admindashboardView'])->name('admindashView');
Route::get('/create',[Admin::class,'createCategory'])->name('createcategory');
Route::post('/create',[Admin::class,'storeCategory'])->name("storeCategory");
Route::get('/category',[Admin::class,'categories'])->name('categoryView');
Route::get('/homepage',[Admin::class,'home'])->name("home");
Route::get('/createbrand',[Admin::class,'ViewBrand'])->name("createview");
Route::post('/storebrand',[Admin::class,'StoreBrand'])->name("StoreBrand");
Route::get('/logout',[Admin::class, 'Logout' ])->name("logout");
Route::get('/createproduct',[Admin::class, 'CreateProduct' ])->name("CreateProduct");
Route::post('/createproduct',[Admin::class, 'StoreProduct' ])->name("Storeproduct");
Route::get('/viewproducts',[Admin::class, 'ViewProduct' ])->name("ViewProduct");
Route::get('/adminlogin',[Admin::class,'adminLoginView'])->name('adminlogin');
Route::post('/adminlogin',[Admin::class,'adminLogin'])->name('adminlogin');
Route::get('/productedit',[adminUpdate::class, 'productEdit' ])->name("productedit");
Route::post('/productupdate',[adminUpdate::class, 'productUpdate' ])->name("productupdate");
Route::get('/productdelete',[adminUpdate::class, 'productDelete' ])->name("productdelete");
Route::get('/adminproductdetails',[ProductDetails::class, 'AdminproductDetailsForUser' ])->name("adminproductdetails");
Route::get('/queries',[QueryController::class, 'viewQueryInAdmin' ])->name("queries");
Route::post('/queriesstatus',[QueryController::class, 'updateStatus' ])->name("updateStatus");
Route::get('/admincatproduct',[CategoryController::class, 'AdminshowUserCatProduct' ])->name("admincatproductview");
Route::post('/Fetchbrands/{category}',[Admin::class, 'Fetchbrands' ])->name("Fetchbrands");
    
    