<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;
use Illuminate\Support\Facades\Session;
class myProfile extends Controller
{
   
    public function viewProfile()
    {
        $id = session('id');
        $data=UserRegister::where("id",$id)->first() ;     
        return view("users/auth/myprofile",compact("data"));
      

        
    }


}
