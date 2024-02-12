<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherDashboardController extends Controller{
    
    public function index(){
        $data['teacher_sections'] =  auth()->user()->sections->pluck('id');
        $data['teacher_students'] = Student::whereIn('section_id', $data['teacher_sections'])->get();
        
        return view('pages.teachers.dashboard.dashboard', compact('data'));
    }
    
    public function students(){
        $data['teacher_sections'] =  auth()->user()->sections->pluck('id');
        $students = Student::with('attendance')->whereIn('section_id', $data['teacher_sections'])->get();
        
        return view('pages.teachers.dashboard.students.index', compact('students'));
    }

    public function student($id){
        $student = Student::find($id);
        if($student){
            return view('pages.teachers.dashboard.students.show', compact('student'));
        }else{
            toastr()->success(trans('trans.no_data_available'));
            return redirect()->back();
        }
    }

    public function attendance_reports(){
        $data['teacher_sections'] =  auth()->user()->sections->pluck('id');
        $students = Student::with('attendance')->whereIn('section_id', $data['teacher_sections'])->get();
        $ids = Student::with('attendance')->whereIn('section_id', $data['teacher_sections'])->pluck('id');
        $students_report = Attendance::whereIn('student_id', $ids)->get();
        
        return view('pages.teachers.dashboard.reports.attendance', compact('students' ,'students_report'));
    }

    public function attendance_search(Request $request){
        $request->validate([
            'from'  =>'required|date|date_format:Y-m-d',
            'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
        ],[
            'from.date_format' => trans('validation.date_format'),
            'to.date_format' => trans('validation.date_format'),
            'to.after_or_equal' => trans('validaiton.after_or_equal'),
        ]);

        $data['teacher_sections'] =  auth()->user()->sections->pluck('id');
        $students = Student::with('attendance')->whereIn('section_id', $data['teacher_sections'])->get();
        $ids = Student::with('attendance')->whereIn('section_id', $data['teacher_sections'])->pluck('id');

        if($request->student_id == 0){
            $students_report = Attendance::whereBetween('date', [$request->from, $request->to])->whereIn('student_id', $ids)->get();
            return view('pages.teachers.dashboard.reports.attendance',compact('students', 'students_report'));
        }else{
            $students_report = Attendance::whereBetween('date', [$request->from, $request->to])->where('student_id',$request->student_id)->get();
            return view('pages.teachers.dashboard.reports.attendance',compact('students', 'students_report'));
        }
    }

    public function sections(){
        $sections =  auth()->user()->sections;
        
        return view('pages.teachers.dashboard.sections.index', compact('sections'));
    }
}