<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeacherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/teachers',[TeacherController::class, 'index']);

Route::get('/teacher/{id}',[TeacherController::class, 'show']);

Route::post('/teachers',[TeacherController::class, 'store']);

Route::post('/teacher/{id}',[TeacherController::class, 'update']);

Route::post('/teachers/{id}',[TeacherController::class, 'destroy']);

