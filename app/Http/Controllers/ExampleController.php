<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function test(){
    return view('kider');
    }
    
    public function blog(){
        return view('blog');
        }
}
