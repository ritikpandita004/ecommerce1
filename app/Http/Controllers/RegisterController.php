<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\UserRegister;
use Ramsey\Uuid\Uuid;
use App\Mail\EMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;




class RegisterController extends Controller
{


    public function register(){
    return view("users/auth/register");
}


public function registerUser(Request $request){
    if($this->checkUser($request->email)){
       $message="user already exist";
       return redirect()->back()->with("error","$message");
    }
    else{

    $users= new UserRegister;
    $users->name=$request->name;
    $users->email=$request->email;
    $uuid = Uuid::uuid4()->toString();
    $users->email_verification_token= $uuid;
    $users->is_email_verified=false;
    $users->phone_number=$request->phoneNumber;
    $users->password=md5($request->password);
    if (md5($request->password)== md5($request->password_confirmation)){

    
    $users->save();
    
    $this->sendEmailVerificationEmail($request->email,$uuid);
    
    
    return redirect("/login");
}
else{
        $message="Password dont match";
        return redirect("/register")->with("error", $message);
}
}
}

public function checkUser($email){
    $user=userRegister::where("email",$email)->first();
    
        if($user){
          
      return true;
        }
        else{
            return false;
        }
    
}

public function sendEmailVerificationEmail($email, $uuid) {
    
    $domain = URL::to('/');
    $url = $domain . '/userRegistration/'. $uuid;
    $data['url'] = $url;
    $data['email'] = $email;
    $data['title'] = 'User Registration'; // Corrected
    $data['body'] = "Below is the link for user registration";
    
    Mail::send('users/auth/userRegistration', ['data' => $data], function($message) use ($data) {
        $message->to($data['email'])->subject($data['title']); 
    });
}

public function VerificationEmail($uuid) {

$user=userRegister::where('email_verification_token',$uuid)->first();
if($user){
//    $message="user successfully registered";
   $user->update(['is_email_verified' => true]);
   $user->save();
   return view("users/registrationSucessfull");
}
else{

    return view('404');
}





}
}