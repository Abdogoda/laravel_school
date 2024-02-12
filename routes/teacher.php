<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\OnlineClassController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\TeacherProfileController;
use App\Livewire\QuizCreate;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register teacher routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "teacher" middleware group. Make something great!
|
*/


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher' ]
], function(){ 


    Route::group(['prefix' => 'teacher'], function(){

        // teacher dashboard routes
        Route::get('/dashboard', [TeacherDashboardController::class, 'index']);
        
        // teacher students routes
        Route::get('/students', [TeacherDashboardController::class, 'students'])->name('teacher_students.index');
        Route::get('/students/{id}', [TeacherDashboardController::class, 'student'])->name('teacher_students.show');
        Route::post('/students/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
        
        // teacher sections routes
        Route::get('/sections', [TeacherDashboardController::class, 'sections'])->name('teacher_sections.index');

        // teacher reports routes
        Route::get('/reports/attendance', [TeacherDashboardController::class, 'attendance_reports'])->name('teacher_reports.attendance');
        Route::post('/reports/attendance', [TeacherDashboardController::class, 'attendance_search'])->name('teacher_reports.attendance_search');
        Route::get('/reports/exams', [TeacherDashboardController::class, 'reports'])->name('teacher_reports.exams');

        
        // quizzes routes
        Route::resource('quizzes', QuizController::class);
        
        // questions routes
        Route::resource('questions', QuestionController::class);
        
        // online_classes routes
        Route::resource('online_classes', OnlineClassController::class);
        
        // profile routes
        Route::get('teacher_profile', [TeacherProfileController::class, 'index'])->name('teacher_profile.index');
        Route::post('teacher_profile/update', [TeacherProfileController::class, 'update'])->name('teacher_profile.update');
        

    });

});