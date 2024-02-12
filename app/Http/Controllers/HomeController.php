<?php

namespace App\Http\Controllers;

use App\Models\Gardian;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(){
        return view('auth.selections');
    }

    public function dashboard(){
        return view('dashboard');
    }
}