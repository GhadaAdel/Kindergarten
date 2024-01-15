<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\Appointmentmail;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointment = Appointment::get();
       return view('appointmentlist', compact('appointment'));
    }

    public function appointment(Request $request)
    {
        $data = $request->validate([
            'guardian_name' => 'required|string',
            'guardian_mail' => 'required|email',
            'student_name' => 'required|string',
            'student_age' => 'required|string',
            'message' => 'required|string|max:400'
        ]);

        Appointment::create($data);

        Mail::to('spareaccnt77@gmail.com')->send(new Appointmentmail($data));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointmentdetail', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id): RedirectResponse
    {
        Appointment::where('id', $id)->delete();
        return redirect('admin/appointmentlist');
    }

    public function trashed()
    {
        $appointment = Appointment::onlyTrashed()->get();
        return view('trashedappointment', compact('appointment'));
    }

    public function restore(string $id): RedirectResponse
    {
        Appointment::where('id', $id)->restore();
        return redirect('admin/appointmentlist');
    }

    public function fdappointment(string $id): RedirectResponse
    {
        Appointment::where('id', $id)->forceDelete();
        return redirect('admin/trashedappointment');
    }
}