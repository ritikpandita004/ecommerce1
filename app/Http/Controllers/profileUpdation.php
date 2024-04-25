<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;

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

        $id = session('id');

        $user = UserRegister::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->route("myProfile");
    }
}
