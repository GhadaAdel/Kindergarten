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

    // public function contact(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required|string',
    //         'mail' => 'required|email',
    //         'subject' => 'required|string',
    //         'message' => 'required|string|max:400'
    //     ]);

    //     Contact::create($data);

    //     Mail::to('spareaccnt77@gmail.com')->send(new Contactmail($data));

    //     return redirect()->back()->with('success', 'Email sent successfully!');
    // }
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
