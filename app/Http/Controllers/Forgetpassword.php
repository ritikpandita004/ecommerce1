<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Forgetpassword extends Controller
{
    use SendsPasswordResetEmails;

    protected function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }

        return back()->withErrors(
            ['email' => trans($response)]
        );
    }
}
