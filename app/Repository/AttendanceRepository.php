<?php
namespace App\Repository;

use App\Interface\AttendanceRepositoryInterface;
use App\Models\Attendance;
use App\Models\FundAccount;
use App\Models\Section;
use App\Models\Stage;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AttendanceRepository implements AttendanceRepositoryInterface{

 public function index(){
  $attendances = Attendance::all();
  $stages = Stage::all();
  $students = Student::all();
  return view('pages.attendance.index', compact('attendances', 'stages', 'students'));
 }
 public function show($id){
  $students = Student::with('attendance')->where('section_id', $id)->get();
  if($students){
   return view('pages.attendance.show', compact('students'));
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }


 public function create(){
   $students = Student::all();
   return view('pages.attendance.add', compact('students'));
}

 public function store($request){
   DB::beginTransaction();
   try {
      $date = date('Y-m-d');
      foreach ($request->attendances as $student_id => $status) {
         $student = Student::find($student_id);
         if($student){
            $student_attendance = $student->attendance()->where('date', date('Y-m-d'))->first();
            if($student_attendance){
               $student_attendance->status = $status == "presence" ? true : false;
               $student_attendance->update();
            }else{
               $attendance = new Attendance();
               $attendance->stage_id = $student->stage->id;
               $attendance->class_id = $student->class->id;
               $attendance->section_id = $student->section->id;
               $attendance->student_id = $student->id;
               $attendance->teacher_id = auth()->user()->id;
               $attendance->status = $status == "presence" ? true : false;
               $attendance->date = $date;
               $attendance->save();
            }
         }
      }
      toastr()->success(trans('trans.data_saved_successfully'));
      DB::commit();
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function edit($id){
   $attendance = Attendance::find($id);
   if($attendance){
    return $attendance;
   }else{
    toastr()->success(trans('trans.no_data_available'));
    return redirect()->back();
   }
  }


 public function update($request, $id){
   DB::beginTransaction();
   try {
      $attendance = Attendance::find($id);
      if($attendance){
         $attendance->status = $request->status == "presence" ? true : false;
         $attendance->update();
         toastr()->success(trans('trans.data_updated_successfully'));
         DB::commit();
         return redirect()->back();
      }else{
         toastr()->warning(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function destroy($id){
   try {
      $attendance = Attendance::find($id);
      if($attendance){
         $attendance->delete();
         toastr()->success(trans('trans.data_updated_successfully'));
         return redirect()->back();
      }else{
         toastr()->error(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }catch (Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }
}