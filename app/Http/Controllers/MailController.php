<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function send(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'message' => 'required'
    	]);

    	Mail::send(new SendMail);

    	return back()->with('success', 'Thanks for contacting us!');
    }
}
