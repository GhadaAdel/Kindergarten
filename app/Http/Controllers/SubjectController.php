<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Subject;
use App\Models\Teacher;
use App\Trait\Common;

class SubjectController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view('addsubject', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();

        //form data validation
        $data = $request->validate([
            'class_subject' => 'required|string',
            'min_age' => 'required|decimal:0,2',
            'max_age' => 'required|decimal:0,2',
            'start_time' => 'required|decimal:0,2',
            'end_time' => 'required|decimal:0,2',
            'price' => 'required|decimal:0,2',
            'capacity' => 'required|decimal:0,2',
            'teacher_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);


        $filename = $this->uploadfile($request->image, 'assets/images');

        $data['image'] = $filename;

        Subject::create($data);

        //return redirect('admin/testmoniallist');
    }

    //custom error messages
    public function messages(){
        return ['name.required' => 'Name is required',
        'testimony.required' => 'Testimony is required'
      ];
    }

    /**
     * Display the specified resource.
     */
   /* public function show(string $id)
    {
        $sub = Subject::latest()->take(6)->get();
        return view('classes', compact('sub'));
    } */

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}