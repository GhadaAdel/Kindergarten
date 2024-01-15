<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::prefix('admin')->controller(ClientController::class)->group(function(){
        Route::get('addtestimonial', 'create')->name('createTestimonial');
        Route::post('addtestimony', 'store')->name('displaytestimony');
        Route::get('testimoniallist', 'index')->name('testimonials');
        Route::get('deletetestimony/{id}', 'destroy');
        Route::get('trashedtestimony','trashed');
        Route::get('restoretestimony/{id}', 'restore');
        Route::get('fdtestimony/{id}', 'fdtestimony');
        Route::get('edittestimony/{id}', 'edit');
        Route::put('updatetestimony/{id}', 'update')->name('updateTestimonial');
    })->middleware('verified');

    Route::prefix('admin')->controller(SubjectController::class)->group(function(){
        Route::get('addsubject', 'create')->name('createSubject');
        Route::post('subjectentry', 'store')->name('displaysubject');
        Route::get('subjectList', 'index')->name('subjects');
        Route::get('editSubject/{id}', 'edit');
        Route::put('updateSubject/{id}', 'update')->name('updateSubject');
        Route::get('deleteSubject/{id}', 'destroy');
        Route::get('trashedSubject','trashed');
        Route::get('restoreSubject/{id}', 'restore');
        Route::get('fdSubject/{id}', 'fdSubject');
    })->middleware('verified');

    Route::prefix('admin')->controller(TeacherController::class)->group(function(){
        Route::get('addteacher', 'create')->name('createTeacher');
        Route::post('teacherentry', 'store')->name('teacher');
        Route::get('teacherlist', 'index')->name('teachers');
        Route::get('editteacher/{id}', 'edit');
        Route::put('updateteacher/{id}', 'update')->name('updateteacher');
        Route::get('deleteteacher/{id}', 'destroy');
        Route::get('trashedteacher','trashed');
        Route::get('restoreteacher/{id}', 'restore');
        Route::get('fdteacher/{id}', 'fdteacher');
})->middleware('verified');

    Route::post('submit', [AppointmentController::class, 'appointment'])->name('submit');

    Route::prefix('admin')->controller(AppointmentController::class)->group(function(){
        Route::get('appointmentlist', 'index')->name('appointments');
        Route::get('showappointment/{id}', 'show');
        Route::get('trashedappointment','trashed');
        Route::get('restoreappointment/{id}', 'restore');
        Route::get('deleteappointment/{id}', 'destroy');
        Route::get('fdappointment/{id}', 'fdappointment');
})->middleware('verified');


       