<?php

namespace App\Http\Controllers;
use App\Models\UserRegister;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Mail\EMail;
class ForgotPasswordController extends Controller
{
    public function forgetPasswordShowForm()
    {
        return view('users/auth/resetpasswordemailform');
    }
    public function resetPassword(Request $request)
    {
        try {
           $user= UserRegister::where('email',$request->email)->get();
           if(count($user)>0)
           {

           $token= Str::random(40);

        $domain = URL::to('/');
        $url = $domain . '/resetPassword/' . $token;
        $data['url'] = $url;
        $data['email'] =$request->email;
        $data['title'] = 'Password- Reset'; // Corrected
        $data['body'] = "Please click on the link to reset your password";

        Mail::send('users/auth/forgetpasswordmail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
        Carbon::now()->format('Y-m-d H:i:s');
        $datatime = "2024-05-03 12:00:00";
        $user = UserRegister::where('email', $request->email)->first();

        if ($user) {
            $user->token = $token;
            $user->save();
        } else {
            $user = UserRegister::create([
                'email' => $request->email,
                'token' => $token,
            ]);
        }
            return redirect("/login")->with('message', 'Password resent link sent');
           }
           else
           {
            return redirect()->back()->withErrors(['errors' => 'You are not a registered user.']);

           }




        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => 'You are not registered with mailgun.So we cannot send you the reset password email']);
        }
        
}
public function resetPasswordLoad(Request $request){
    $resetData= UserRegister::where('token',$request->token)->get();
  
    
    if(isset($request->token)&& count($resetData)>0)
    {
       $user= UserRegister::where('email',$resetData[0]['email'])->get();
       return view('users/auth/forgetpassword',compact('user'));
    }
else{
   
  return view("404");
}
}
public function changePassword(Request $request)
{
    $request->validate([
        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
            function ($attribute, $value, $fail) {
               $errors = [];
    
    if (!preg_match('/[A-Z]/', $value)) {
        $errors[] = 'The password must contain at least one uppercase letter.';
    }
    
    if (!preg_match('/[^\w\d\s]/', $value)) {
        $errors[] = 'The password must contain at least one unique character.';
    }
    
    if (!empty($errors)) {
        $fail($errors);
    }
            }
        ],
    ], [
        'password.confirmed' => 'The password and confirm password do not match.',
        'password.min' => 'The password must be at least :min characters.'
    ]);
            
    $user = UserRegister::where('id', $request->email)->first();

    if ($user) {
      
        $hashedPassword = md5($request->password);

       
        $user->password = $hashedPassword;
        $user->save();

        return view('users/auth/successmessage');
    } else {
        return view('404');
    }
}

}
