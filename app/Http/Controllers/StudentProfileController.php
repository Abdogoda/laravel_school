<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller{
    
    public function index(){
        $student = Student::find(auth()->user()->id);
        return view('pages.students.dashboard.profile', compact('student'));
    }

    public function update(Request $request){
        $student = Student::find(auth()->user()->id);
        if($student){
            if(!empty($request->password)){
                $student->password = Hash::make($request->password);
            }
            $student->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en
            ];
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->update();
            toastr()->success(trans('trans.data_updated_successfully'));
            return redirect()->back();
        }else{
            toastr()->error(trans('trans.no_data_available'));
            return redirect()->back();
        }
    }
}