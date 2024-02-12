<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BillOfExchangeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\GardianController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcludeFeeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OnlineClassController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentReceiptController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Livewire\Calendar;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
--------------------------------------------------------------------------
    Web Routes
--------------------------------------------------------------------------
*/


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 

    // -------------------------------- Guest Routes --------------------------------
    Route::group(['middleware' => ['guest']], function(){
        Route::get('/', [HomeController::class, 'index'])->name('selections');
        Route::get('/login/{type}', [LoginController::class, 'login_form'])->middleware('guest')->name('login_form');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });
    
    // -------------------------------- Not Routes --------------------------------
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/get_stage_classes/{id}', [StageController::class, 'get_stage_classes']);
    Route::get('/get_class_sections/{id}', [ClassroomController::class, 'get_class_sections']);
    Route::get('/download_attachment/{id}', [StudentController::class, 'download_attachment'])->name('download_attachment');

    // -------------------------------- Auth Routes --------------------------------
    Route::group(['middleware' => ['auth']], function(){

        // dashboard routes
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        Livewire::component('calendar', Calendar::class);
        
        // stages routes
        Route::resource('stages', StageController::class);
        
        // classes routes
        Route::resource('classes', ClassroomController::class);
        Route::post('/delete_all_classes', [ClassroomController::class, 'delete_all'])->name('delete_all_classes');
        
        // sections routes
        Route::resource('sections', SectionController::class);
        
        // students routes
        Route::resource('students', StudentController::class);
        Route::post('/upload_student_attachments', [StudentController::class, 'upload_attachments'])->name('upload_student_attachments');
        Route::get('/download_attachment_by_model/{model}/{id}', [StudentController::class, 'download_attachment_by_model'])->name('download_attachment_by_model');
        Route::get('/delete_attachment/{id}', [StudentController::class, 'delete_attachment'])->name('delete_attachment');
        
        // student promotion routes
        Route::resource('promotions', PromotionController::class);
        
        // graduated student routes
        Route::resource('graduated', GraduatedController::class);
        
        // gardians routes
        Route::resource('gardians', GardianController::class);
        
        // teachers routes
        Route::resource('teachers', TeacherController::class);
        
        // fees routes
        Route::resource('fees', FeeController::class);
        Route::resource('fee_invoices', FeeInvoiceController::class);
        Route::get('fee_invoices/create/{id}', [FeeInvoiceController::class, 'add_student_fee_invoice']);
        
        // receipt routes
        Route::resource('student_receipts', StudentReceiptController::class);
        Route::get('student_receipts/create/{id}', [StudentReceiptController::class, 'add_student_receipt']);
        
        // exclude_fees routes
        Route::resource('exclude_fees', ExcludeFeeController::class);
        Route::get('exclude_fees/create/{id}', [ExcludeFeeController::class, 'add_exclude_fee']);
        
        // bills_of_exchange routes
        Route::resource('bills_of_exchange', BillOfExchangeController::class);
        Route::get('bills_of_exchange/create/{id}', [BillOfExchangeController::class, 'add_bill_of_exchange']);

        // attendance routes
        Route::resource('attendance', AttendanceController::class);

        // subjects routes
        Route::resource('subjects', SubjectController::class);
        
        // exams routes
        Route::resource('exams', ExamController::class);

        // library routes
        Route::resource('library', LibraryController::class);

        // settings routes
        Route::resource('settings', SettingController::class);
    });
});