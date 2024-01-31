<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
use ApiResponseTrait;

    public function index() {

        $teachers = TeacherResource::collection(Teacher::get());

        return $this->apiResponse($teachers, 'ok', 200);
    }

    public function show($id) {
        $teacher = Teacher::find($id);

        if($teacher){
            return $this->apiResponse(new TeacherResource($teacher), 'ok', 200);
        }
        return $this->apiResponse(null, 'Not Found', 401);
        
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'position' => 'required|string',
            'fb' => 'required|string',
            'x' => 'required|string',
            'insta' => 'required|string',
            'image' => 'required'
        ]);

        if($validator->fails()){

        return $this->apiResponse(null, $validator->errors(), 400);

        }

        $teacher = Teacher::create($request->all());

        if($teacher){
            return $this->apiResponse(new TeacherResource($teacher), 'ok', 200);
        }
        return $this->apiResponse(null, 'Not Found', 401);
        
    }

    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'position' => 'required|string',
            'fb' => 'required|string',
            'x' => 'required|string',
            'insta' => 'required|string',
            'image' => 'required'
        ]);

        if($validator->fails()){

        return $this->apiResponse(null, $validator->errors(), 400);
    
        }
    
        $teacher = Teacher::find($id);
        
        if(!$teacher){
        
            return $this->apiResponse(null, 'Not Found', 401);
        }

        $teacher->update($request->all());

        if($teacher){
            return $this->apiResponse(new TeacherResource($teacher), 'ok', 200);
        }
        
    }

    public function destroy($id) {


        $teacher = Teacher::find($id);
        
        if(!$teacher){
        
            return $this->apiResponse(null, 'Not Found', 401);
        }

        $teacher->delete();

        if($teacher){
            return $this->apiResponse(null, 'Deleted', 200);
        }
        
    }
}
