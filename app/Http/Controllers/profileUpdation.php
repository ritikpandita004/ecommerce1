<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;
use Illuminate\Support\Facades\Validator;
class profileUpdation extends Controller
{

    public function editProfile()
    {
        $id = session('id');
        $data = UserRegister::where('id', $id)->first();

        return view("users/auth/updateProfile", compact("data"));
    }
    public function updateMyProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[^\d]+$/|max:255',
            'phone_number' => 'required|string|regex:/^[0-9]{10}$/',
        ],
        [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.regex' => 'The name cannot contain numbers.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.string' => 'The phone number must be a string.',
            'phone_number.regex' => 'The phone number must be a 10-digit numeric value.',
        ]);
    
        // Check if the validator fails
        if ($validator->fails()) {
            return redirect('/updateView')
                ->withErrors($validator)
                ->withInput();
        }
            


            // Check if the validator fails
            if ($validator->fails()) {
                return redirect('/updateView')
                    ->withErrors($validator)
                    ->withInput();
            }
        $id = session('id');

        $user = UserRegister::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->route("myProfile");
    }
}
