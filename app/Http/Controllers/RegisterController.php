<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\UserRegister;
use Ramsey\Uuid\Uuid;
use App\Mail\EMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class RegisterController extends Controller
{


    public function register()
    {
        return view("users/auth/register");
    }



    public function registerUser(Request $request)
    {

        try {
 
$validator = Validator::make($request->all(), [
    'name' => 'required|string|regex:/^[^\d]+$/|max:255',
    'email' => 'required|email|unique:users|max:255',
    'phoneNumber' => 'required|numeric|digits_between:10,10',
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
    'email.required' => 'The email address field is required.',
    'email.email' => 'Please enter a valid email address.',
    'email.unique' => 'The email address has already been taken.',
    'email.max' => 'The email address may not be greater than :max characters.',
    'name.required' => 'The name field is required.',
    'name.string' => 'The name must be a string.',
    'name.regex' => 'The name cannot contain numbers.',
    'phoneNumber.required' => 'The phone number field is required.',
    'phoneNumber.numeric' => 'The phone number must be number.',
    'phoneNumber.digits_between' => 'The phone number must be of 10 digits.',
    'password.confirmed' => 'The password and confirm password do not match.',
    'password.min' => 'The password must be at least :min characters.'
]);
            


            // Check if the validator fails
            if ($validator->fails()) {
                return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
            }
            if (!$this->checkUser($request->email)) {
                $users = new UserRegister;
                $users->name = $request->name;
                $users->email = $request->email;
                $uuid = Uuid::uuid4()->toString();
                $users->email_verification_token = $uuid;
                $users->is_email_verified = false;
                $users->phone_number = $request->phoneNumber;
                $users->password = md5($request->password);

                $users->save();
                $this->sendEmailVerificationEmail($request->email, $uuid);

                return redirect("/login");
            } else {
                return redirect('/register')->withErrors("User already exist");
            }
        } catch (\Throwable $th) {
            return redirect('/register')->withErrors($th->getMessage());
        }
    }

    public function checkUser($email)
    {
        $user = userRegister::where("email", $email)->first();

        if ($user) {

            return true;
        } else {
            return false;
        }
    }

    public function sendEmailVerificationEmail($email, $uuid)
    {

        $domain = URL::to('/');
        $url = $domain . '/userRegistration/' . $uuid;
        $data['url'] = $url;
        $data['email'] = $email;
        $data['title'] = 'User Registration'; // Corrected
        $data['body'] = "Below is the link for user registration";

        Mail::send('users/auth/userRegistration', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function VerificationEmail($uuid)
    {

        $user = userRegister::where('email_verification_token', $uuid)->first();
        if ($user) {
            //    $message="user successfully registered";
            $user->update(['is_email_verified' => true]);
            $user->save();
            return view("users/registrationSucessfull");
        } else {

            return view('404');
        }
    }
}
