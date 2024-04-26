<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\queries;
use Illuminate\Support\Facades\Validator;

class QueryController extends Controller
{
    public function StoreQueryofUser(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|regex:/^[^\d]+$/|max:255',

            ],
            [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be a string.',
                'name.regex' => 'The name cannot contain numbers.',
            ]
        );
        if ($validation->fails()) {
            return redirect('/contactus')
                ->withErrors($validation)
                ->withInput();
        }

        $query = new queries;
        $query->name = $request->name;
        $query->email = $request->email;
        $query->message = $request->message;
        $query->save();
        return view('users/querysubmitted');
    }



    public function viewQueryInAdmin()
    {
        $queries = queries::all();
        return view('admin/querylist',compact('queries'));
}
}