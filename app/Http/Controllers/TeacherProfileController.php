<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherProfileController extends Controller{

    public function index(){
        $teacher = Teacher::find(auth()->user()->id);
        return view('pages.teachers.dashboard.profile', compact('teacher'));
    }

    public function update(Request $request){
        $teacher = Teacher::find(auth()->user()->id);
        if($teacher){
            if(!empty($request->password)){
                $teacher->password = Hash::make($request->password);
            }
            $teacher->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en
            ];
            $teacher->email = $request->email;
            $teacher->phone = $request->phone;
            $teacher->address = $request->address;
            $teacher->update();
            toastr()->success(trans('trans.data_updated_successfully'));
            return redirect()->back();
        }else{
            toastr()->error(trans('trans.no_data_available'));
            return redirect()->back();
        }
    }
}