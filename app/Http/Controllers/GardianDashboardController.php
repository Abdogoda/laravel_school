<?php

namespace App\Http\Controllers;

use App\Models\Gardian;
use App\Models\Student;
use Illuminate\Http\Request;

class GardianDashboardController extends Controller{
    
    public function index(){
        $gardian = Gardian::find(auth()->user()->id);
        $student = Student::find($gardian->student_id);
        return view('pages.gardians.dashboard.dashboard', compact('student'));
    }

    public function gardians(){
        $gardian = Gardian::find(auth()->user()->id);
        $gardians = Gardian::where('student_id', $gardian->student_id)->get();
        return view('pages.gardians.dashboard.other_gardians', compact('gardians'));
    }

    public function my_children(){
        $gardian = Gardian::find(auth()->user()->id);
        $students = Student::where('id', $gardian->student_id)->get();
        return view('pages.gardians.dashboard.children', compact('students'));
    }
    
    public function my_child($id){
        $gardian = Gardian::find(auth()->user()->id);
        if($gardian->student_id == $id){
            $student = Student::find($id);
            return view('pages.gardians.dashboard.child', compact('student'));
        }else{
            toastr()->warning(trans('trans.no_data_available'));
            return redirect()->back();
        }
    }
}