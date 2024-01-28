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
        $subject = Subject::get();
        return view('subjectList', compact('subject'));
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
        return [
        'class_subject.required' => 'class_subject name is required',
        'class_subject.string' => 'class_subject name must be string',
        'min_age.required' => 'min_age is required',
        'max_age.required' => 'max_age is required',
        'start_time.required' => 'start_time is required',
        'end_time.required' => 'end_time is required',
        'price.required' => 'price is required',
        'capacity.required' => 'capacity is required',
        'image.required' => 'Image is required',
        'image.mimes' => 'Image must be png, jpg, jpeg, webp'
      ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sub = Subject::findOrFail($id);
        return view('updateSubject', compact('sub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();

        //form data validation
        $data = $request->validate([
            'class_subject' => 'required|string',
            'min_age' => 'required|decimal:0,2',
            'max_age' => 'required|decimal:0,2',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|decimal:0,2',
            'capacity' => 'required|decimal:0,2',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        //update image
        if($request->hasFile('image')){
            $filename = $this->uploadfile($request->image, 'assets/images');
            $data['image'] = $filename;
        }
        

        Subject::where('id', $id)->update($data);
        return redirect('admin/subjectList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Subject::where('id', $id)->delete();
        return redirect('admin/subjectList');
    }

    public function trashed()
    {
        $subject = Subject::onlyTrashed()->get();
        return view('trashedSubject', compact('subject'));
    }

    public function restore(string $id): RedirectResponse
    {
        Subject::where('id', $id)->restore();
        return redirect('admin/subjectList');
    }

    public function fdSubject(string $id): RedirectResponse
    {
        Subject::where('id', $id)->forceDelete();
        return redirect('admin/trashedSubject');
    }
}