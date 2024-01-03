<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Trait\Common;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimony = Client::get();
        return view('testimoniallist', compact('testimony'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addtestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();

        //form data validation
        $data = $request->validate([
            'name' => 'required|string',
            'profession' => 'required|string',
            'testimony' => 'required|string|max:100',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);


        $filename = $this->uploadfile($request->image, 'assets/images');

        $data['image'] = $filename;

        $testimony = Client::create($data);

        $testimony->save();

        return redirect('admin/testimoniallist');
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
   /* public function show()
    {
        $testimony = Client::latest()->take(4)->get();
        return view('testimonial', compact('testimony'));
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimony = Client::findOrFail($id);
        return view('updatetestimony', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();

        $data = $request->validate([
            'name' => 'required|string',
            'profession' => 'required|string',
            'testimony' => 'required|string',
            'image' => 'sometimes|required|mimes:png,jpg,jpeg|max:2048',
            ], $messages); 
     
            //update image if new file is selected
            if($request->hasFile('image')){
             $filename = $this->uploadfile($request->image, 'assets/images');
             $data['image'] = $filename;
            }
               
            Client::where('id', $id)->update($data);   
     
            return redirect('admin/testimoniallist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Client::where('id', $id)->delete();
        return redirect('admin/testimoniallist');
    }

    public function trashed()
    {
        $testimony = Client::onlyTrashed()->get();
        return view('trashedtestimony', compact('testimony'));
    }

    public function restore(string $id): RedirectResponse
    {
        Client::where('id', $id)->restore();
        return redirect('admin/testimoniallist');
    }

    public function fdtestimony(string $id): RedirectResponse
    {
        Client::where('id', $id)->forceDelete();
        return redirect('admin/trashedtestimony');
    }
}