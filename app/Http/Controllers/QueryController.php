<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\queries;

class QueryController extends Controller
{
    public function StoreQueryofUser(Request $request)
    {
        $query= new queries;
        $query->name=$request->name;
        $query->email=$request->email;
        $query->message=$request->message;
        $query->save();
        return view ('welcome');
    }
}
