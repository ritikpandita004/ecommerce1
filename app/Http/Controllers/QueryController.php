<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\queries;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
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
public function updateStatus(Request $request)
    {
        try {
        $request->validate([
            'query_id' => 'required|exists:queries,id',
            'status' => 'required|in:resolved,onHold',
        ]);

        $query = queries::findOrFail($request->query_id);

    
        $query->status = $request->status;
        $query->save();

       
        $userEmail = $query->email;
        Mail::send([], [], function ($message) use ($userEmail, $request) {
            $message->to($userEmail)
                    ->subject('Query Status Updated')
                    ->setBody("Your query status has been {$request->status}. \n\n" .
                              "Thank you for contacting us. If you have any further questions, feel free to reach out.\n" .
                              "Best regards,\n" .
                              "Team ekart");
        });
        
        return redirect()->back()->with('success', 'Query status updated successfully');
    }
    catch (\Throwable $th) {
        return redirect('/queries')->withErrors('We are not able to send the mail. As user is not registered with mailgun.');
    }
    }







}