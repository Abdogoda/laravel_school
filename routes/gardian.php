<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GardianDashboardController;
use App\Http\Controllers\GardianProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| gardian Routes
|--------------------------------------------------------------------------
|
| Here is where you can register gardian routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "gardian" middleware group. Make something great!
|
*/


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:gardian' ]
], function(){ 

    Route::group(['prefix' => 'gardian'], function(){

        // gardian dashboard routes
        Route::get('/dashboard', [GardianDashboardController::class, 'index']);

        
        // gardian profile routes
        Route::get('/gardian_profile', [GardianProfileController::class, 'index'])->name('gardian_profile.index');
        Route::post('/gardian_profile', [GardianProfileController::class, 'update'])->name('gardian_profile.update');
        
        // gardian other_gardians routes
        Route::get('/other_gardians', [GardianDashboardController::class, 'gardians'])->name('other_gardians');
        
        // gardian my_children routes
        Route::get('/my_children', [GardianDashboardController::class, 'my_children'])->name('my_children');
        Route::get('/my_child/{id}', [GardianDashboardController::class, 'my_child'])->name('my_child');
    });

});