<?php

namespace App\Http\Controllers;

use App\Models\usercart;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\products;
use App\Models\Shipment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
class Razorpay extends Controller
{

    public $api;
   


    public function __construct()
    {
        $this->api = $api = new Api("rzp_test_zemKnuSiCYJFFR", "zv0l4AIt6tgmQ2xRIanNNz3h");
        Session::put('isFromCart', false);
    }


    public function PlaceOrder()
    {
        $userCartItems = usercart::where('u_id', session('id'))->get();
        $totalAmount = 0;

        foreach ($userCartItems as $cartItem) {
            $product = products::find($cartItem->p_id);
            // Ensure product exists
            if ($product) {
                // Calculate total amount based on product price, tax, and quantity
                $totalAmount += ($product->price * 1.1) * $cartItem->qty; // Adding 10% tax
            }
        }

        // Generate order ID
        $orderid = rand(111111, 999999);
        // Prepare order data for Razorpay
        $orderData = [
            'receipt' => 'rcptid_11',
            'amount' => $totalAmount * 100, // Convert total amount to paise
            'currency' => 'INR',
            'notes' => [
                'order_id' => $orderid,
            ]
        ];
        // Create Razorpay order
        $razorpayOrder = $this->api->order->create($orderData);
        // Pass Razorpay order to view
        return view('users.razorpayscript', compact('razorpayOrder'));
    }



    public function Success(Request $request)
    {
        $status = $this->api->payment->fetch($request->get('payment_id'));
        if ($status->status == 'captured') {
        
         if(Session::get('isFromCart')==1){
        // //delete cart items
       
            usercart::truncate();
         }

        //create new entry in orders table

        //  $orderDetails=new Order;
        //  $orderDetails->u_id=Session::get('id');
        //  $orderDetails->p_id=$request
        Session::put('isFromCart', false);
        //save in order table
        //pid,uid,shipid
            return view('users/ordersuccess');
        } else {
//save in order table
        //pid,uid,shipid
         Session::put('isFromCart', false);
            return redirect()->route("payments")->with('payment failed');
        }
        
    }

    public function shipmentOrderView(Request $request)
    {
        
        $id = $request->p_id;

        
        return view('users/shipment', ['id' => $id]);
    }

    public function shipmentOrderStore(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|regex:/^[^\d]+$/|max:255',
        'address'=> 'required',
        'email' => 'required|email|unique:users|max:255',
        'phoneNumber' => 'required|numeric|digits_between:1,10',
        
    ],[
    'email.required' => 'The email address field is required.',
    'email.email' => 'Please enter a valid email address.',
    'email.unique' => 'The email address has already been taken.',
    'email.max' => 'The email address may not be greater than :max characters.',
    'name.required' => 'The name field is required.',
    'name.string' => 'The name must be a string.',
    'name.regex' => 'The name cannot contain numbers.',
    'phoneNumber.required' => 'The phone number field is required.',
    'phoneNumber.numeric' => 'The phone number must be a number.',
    'phoneNumber.digits_between' => 'The phone number must be of 10 digits.',
    'address.required'=>'The address field is required',
    ]);
    if ($validator->fails()) {
        return redirect('/shipment')
            ->withErrors($validator)
            ->withInput();
    }

    $shipment = new Shipment();
    $shipment->name = $request->name;
    $shipment->user_id= session('id');
   
    $shipment->address = $request->address;
    $shipment->phone = $request->phoneNumber;
    $shipment->email = $request->email;

    $savedShipment = $shipment->save();

    

    $totalAmount = 0;


    if ($request->id != null) {
        $product = products::find($request->id);
        if ($product) {
            // Calculate total amount based on product price, tax, and quantity
            $totalAmount += ($product->price * 1.1); // Adding 10% tax
        }
        // Generate order ID (consider using a more robust method)
    $orderId = rand(111111, 999999);

    // Prepare order data for Razorpay
    $orderData = [
        'receipt' => 'rcpt_' . $orderId, // Make receipt ID dynamic
        'amount' => $totalAmount * 100, // Convert total amount to paise
        'currency' => 'INR',
        'notes' => [
            'order_id' => $orderId,
        ]
    ];

    // Create Razorpay order
    $razorpayOrder = $this->api->order->create($orderData);
    Session::put('isFromCart', false);
    return view('users.razorpayscript', compact('razorpayOrder'));
    }
    else
    {
        Session::put('isFromCart', true);
       return $this->PlaceOrder();
    }

    
 
}
}

    


 