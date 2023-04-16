<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function email(Request $request)
    {
        // dd($request);
        $mailData = [
            'first' => Auth::user()->First,
            'last' => Auth::user()->Last,
            'email' => Auth::user()->email,
            'title' => $request->c_subject,
            'body' => $request->c_message
        ];
        Mail::to('mnachit33@gmail.com')->send(new DemoMail($mailData));
        // dd("puo");
        return redirect()->back();
    }
}
