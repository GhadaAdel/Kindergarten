<?php

namespace App\Http\Controllers;

use App\Charts\TeacherPerClassChart;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Teacher;
use App\Models\Facility;
use App\Trait\Common;

class TeacherController extends Controller
{
    use Common;

    public function teacher()
    {
        $teacher = Teacher::latest()->take(3)->get();
        return view('team', compact('teacher'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(TeacherPerClassChart $chart)
    {
        $teacher = Teacher::get();
        $chart = $chart->build();

        return view('teacherlist', compact('teacher','chart'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addteacher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = $this->messages();

        //form data validation
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'fb' => 'required|string',
            'x' => 'required|string',
            'insta' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ], $messages);

        //add image
        $filename = $this->uploadfile($request->image, 'assets/images');
        $data['image'] = $filename;

        Teacher::create($data);
        return redirect('admin/teacherlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('updateteacher', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();

        //form data validation
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'fb' => 'required|string',
            'x' => 'required|string',
            'insta' => 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048'
        ], $messages);

        //update image
        if($request->hasFile('image')){
            $filename = $this->uploadfile($request->image, 'assets/images');
            $data['image'] = $filename;
        }
        

        Teacher::where('id', $id)->update($data);
        return redirect('admin/teacherlist');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Teacher::where('id', $id)->delete();
        return redirect('admin/teacherlist');
    }

    public function trashed()
    {
        $teacher = Teacher::onlyTrashed()->get();
        return view('trashedteacher', compact('teacher'));
    }

    public function restore(string $id): RedirectResponse
    {
        Teacher::where('id', $id)->restore();
        return redirect('admin/teacherlist');
    }

    public function fdteacher(string $id): RedirectResponse
    {
        Teacher::where('id', $id)->forceDelete();
        return redirect('admin/trashedteacher');
    }

    public function messages(){
        return [
        'name.required' => 'Teacher name is required',
        'name.string' => 'Teacher name must be string',
        'position.required' => 'Position is required',
        'position.string' => 'Position must be string',
        'fb.required' => 'Facebook is required',
        'fb.string' => 'Facebook must be string',
        'x.required' => 'Twitter is required',
        'x.string' => 'Twitter must be string',
        'insta.required' => 'Instagram is required',
        'insta.string' => 'Instagram must be string',
        'image.required' => 'Image is required',
        'image.mimes' => 'Image must be png, jpg, jpeg, webp'
      ];
    }
   
}