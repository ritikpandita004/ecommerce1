<?php

namespace App\Http\Controllers;

use App\Models\UserRegister;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function userLogin()
    {
        return view("users/auth/login");
    }

    public function loginCheck(Request $request)

    {
        $password=md5($request["password"]);
        $email= $request["email"];
        $user=userRegister::where('email',$email)->first();
        if($user){
            if($password==$user->password && $email==$user->email){
                if($user->is_email_verified== 1){
                $message="LOGGED IN SUCCESSFULL";
                session(['id' => $user->id]);             
                return redirect()->route('welcome')->with('message', $message);
                }
                elseif($user->is_email_verified== 0){
                    $message= 'PLease verify your email';
                    return view('users/auth/login', ['message'=> $message]);
                }
        } 
         else{
                $message= "Username or Password don't match";
                return view("users/auth/login", ['message' => $message]);
            }    
    }
    else
        {
            $message= "USER DON'T EXIST";
            return view("users/auth/login", ['message' => $message]);
        }


}
}