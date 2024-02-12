<?php
namespace App\Repository;

use App\Interface\StudentRepositoryInterface;
use App\Models\Attachment;
use App\Models\Blood;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Stage;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface{

 use \App\Http\Traits\AttachmentTrait;
 public function index(){
  $students = Student::all();
  return view('pages.students.index', compact('students'));
 }

 public function show($id){
  $student = Student::find($id);
  if($student){
   return view('pages.students.show', compact('student'));
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function edit($id){
  $student = Student::find($id);
  if($student){
   $genders = Gender::all();
   $bloods = Blood::all();
   $nationalities = Nationality::all();
   $religions = Religion::all();
   $stages = Stage::all();
   return view('pages.students.edit', compact('student', 'genders', 'bloods', 'nationalities', 'religions', 'stages'));
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create(){
  $genders = Gender::all();
  $bloods = Blood::all();
  $nationalities = Nationality::all();
  $stages = Stage::all();
  $religions = Religion::all();
  return view('pages.students.add', compact('genders', 'bloods', 'nationalities', 'religions', 'stages'));
 }

 public function store($request){
  $validated = $request->validated();
  DB::beginTransaction();
   try {
      $student = new Student();
      $student->email = $request->email;
      $student->password =  Hash::make($request->password);
      $student->name = [
         'ar' => $request->name_ar,
         'en' => $request->name_en,
      ];
      if(isset($request->phone)) $student->phone = $request->phone;
      $student->national_id = $request->national_id;
      $student->passport_id = $request->passport_id;
      $student->gender_id = $request->gender_id;
      $student->blood_id = $request->blood_id;
      $student->nationality_id = $request->nationality_id;
      $student->religion_id = $request->religion_id;
      $student->birth_of_date = $request->birth_of_date;
      $student->academic_year = $request->academic_year;
      $student->stage_id = $request->stage_id;
      $student->class_id = $request->class_id;
      $student->section_id = $request->section_id;
      $student->save();
      $this->storeAttachments($request, 'attachments', 'uploads/students', $student->id, 'Student');
      DB::commit();
      toastr()->success(trans('trans.data_saved_successfully'));
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function update($request, $student){
  $student = Student::find($student->id);
  if($student){
   $validated = $request->validated();
   DB::beginTransaction();
   try {
      $student->email = $request->email;
      if(isset($request->password)) $student->password =  Hash::make($request->password);
      $student->name = [
         'ar' => $request->name_ar,
         'en' => $request->name_en,
      ];
      if(isset($request->phone)) $student->phone = $request->phone;
      $student->national_id = $request->national_id;
      $student->passport_id = $request->passport_id;
      $student->gender_id = $request->gender_id;
      $student->blood_id = $request->blood_id;
      $student->nationality_id = $request->nationality_id;
      $student->religion_id = $request->religion_id;
      $student->birth_of_date = $request->birth_of_date;
      $student->academic_year = $request->academic_year;
      $student->stage_id = $request->stage_id;
      $student->class_id = $request->class_id;
      $student->section_id = $request->section_id;
      $student->update();
      if($request->hasFile('attachments')){
         if(($student->attachments()->count() + count($request->file('attachments'))) < 4){
            $this->storeAttachments($request, 'attachments', 'uploads/students', $student->id, 'Student');
         }else{
            toastr()->warning(trans('trans.maximum_3_attachments_and_used').$student->attachments->count());
         }
      }
      DB::commit();
      toastr()->success(trans('trans.data_updated_successfully'));
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function destroy($id){
  $student = Student::withTrashed()->find($id);
  if($student){
   if($student->gardians()->count() > 0){
      toastr()->error(trans('trans.this_row_have_ralated_data'));
      return redirect()->back();
   }else{
      $this->deleteAttachments($student->id, 'Student');
      $student->forceDelete();
      toastr()->success(trans('trans.data_updated_successfully'));
      return redirect()->back();
   }
  }else{
   toastr()->error(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }
}