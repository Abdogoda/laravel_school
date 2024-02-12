<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\StudentQuizController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Student routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "student" middleware group. Make something great!
|
*/



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student' ]
], function(){ 

    Route::group(['prefix' => 'student'], function(){

        // student dashboard routes
        Route::get('/dashboard', [StudentDashboardController::class, 'index']);

        // student profile routes
        Route::get('/student_profile', [StudentProfileController::class, 'index'])->name('student_profile.index');
        Route::post('/student_profile', [StudentProfileController::class, 'update'])->name('student_profile.update');

        // student quizzes routes
        Route::resource('student_quizzes', StudentQuizController::class);
    });

});