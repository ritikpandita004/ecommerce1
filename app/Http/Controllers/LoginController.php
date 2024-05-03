<?php

namespace App\Http\Controllers;

use App\Models\UserRegister;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function userLogin()
    {
        return view("users/auth/login");
    }

    public function loginCheck(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email address field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);
       
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        
        // If validation passes, proceed with login logic
        $password = md5($request->password);
        $email = $request->email;
        $user = userRegister::where('email', $email)->first();

        if ($user) {
            if ($password == $user->password) {
                if ($user->is_email_verified == 1) {
                    $message = "Logged in successfully";
                    session(['id' => $user->id]);
                    return redirect()->route('welcome')->with('success', 'Login Successfull');
                } elseif ($user->is_email_verified == 0) {
                    $message = 'Please verify your email';
                    return view('users/auth/login', ['message' => $message]);
                }
            } else {
                $message = "Password does not match";
                return view("users/auth/login", ['message' => $message]);
            }
        } else {
            $message = "User does not exist";
            return view("users/auth/login", ['message' => $message]);
        }
    }
}
