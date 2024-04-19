<?php

namespace App\Http\Controllers;
use App\Models\usercart;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\products;

class Razorpay extends Controller
{   
  public $api;
    public function __construct()
    {
        $this->api= $api = new Api("rzp_test_zemKnuSiCYJFFR", "zv0l4AIt6tgmQ2xRIanNNz3h");
    }


      public function PlaceOrder(Request $request){
      $userCartItems = usercart::where('u_id', session('id'))->get();
       $totalAmount=0;
        foreach( $userCartItems as $cartItem){
            $products=products::where('id',$cartItem->p_id)->get();
            $totalAmount = $totalAmount+(int)$products[0]->price+(int)$products[0]->tax;
        }
        $orderid=rand(111111,999999);
        $orderData = [
            'receipt'         => 'rcptid_11',
            'amount'          =>($totalAmount*100), // 39900 rupees in paise
            'currency'        => 'INR',
            'notes'           => [
                'order_id'=>$orderid,]
        ];
        
        $razorpayOrder = $this->api->order->create($orderData);
        return view('users/razorpayscript',compact('razorpayOrder'));
      }
public function Success(Request $request)
{
 $status= $this->api->payment->fetch($request->get('payment_id'));
 if($status->status=='captured'){
  return view('users/ordersuccess');

 }
 else{
  return redirect()->route("payments")->with('payment failed');
 }
}

}