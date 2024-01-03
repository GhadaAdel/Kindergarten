<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;

use Illuminate\Http\Request;
use Mail;
class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }
    public function sendEmail(Request $request) {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg,
        ];
        Mail::to('ghada@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent', 'Ur message has been sent succesfullyyyy');

    }
}
