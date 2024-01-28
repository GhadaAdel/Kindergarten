<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;


class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimony = Client::get();
        $sub = Subject::latest()->take(6)->get();
        $teacher = Teacher::latest()->take(3)->get();

        return view('kider', compact('testimony', 'sub', 'teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page');
    }

    public function about()
    {
        return view('about');
        
    }

    public function classes()
    {
        $sub = Subject::latest()->take(6)->get();
        return view('classes', compact('sub'));
    }

    public function contact()
    {
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
    public function testimonial()
    {
        $testimony = Client::get();
        return view('testimonial', compact('testimony'));
    }

    public function facilities()
    {
        return view('facilities');
    }

    public function team()
    {
        $teacher = Teacher::latest()->take(3)->get();
        return view('team', compact('teacher'));    }

    public function action()
    {
        return view('action');
    }

    public function appointment()
    {
        return view('appointment');
    }

    public function error404()
    {
        return view('404page');
    }

}