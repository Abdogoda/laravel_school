<?php
namespace App\Repository;
use App\Interface\TeacherRepositoryInterface;
use App\Models\Blood;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

 public function index(){
  $teachers = Teacher::all();
  return view('pages.teachers.index', compact('teachers'));
 }
 public function show($id){
  $teacher = Teacher::find($id);
  if($teacher){
   $specializations = Specialization::all();
   $genders = Gender::all();
   $bloods = Blood::all();
   $nationalities = Nationality::all();
   $religions = Religion::all();
   return view('pages.teachers.edit', compact('teacher', 'specializations', 'genders', 'bloods', 'nationalities', 'religions'));
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create(){
  $specializations = Specialization::all();
  $genders = Gender::all();
  $bloods = Blood::all();
  $nationalities = Nationality::all();
  $religions = Religion::all();
  return view('pages.teachers.add', compact('specializations', 'genders', 'bloods', 'nationalities', 'religions'));
 }

 public function store($request){
  $validated = $request->validated();
  try {
   $teacher = new Teacher();
   $teacher->email = $request->email;
   $teacher->password =  Hash::make($request->password);
   $teacher->name = [
      'ar' => $request->name_ar,
      'en' => $request->name_en
   ];
   $teacher->phone = $request->phone;
   $teacher->national_id = $request->national_id;
   $teacher->passport_id = $request->passport_id;
   $teacher->specialization_id = $request->specialization_id;
   $teacher->gender_id = $request->gender_id;
   $teacher->blood_id = $request->blood_id;
   $teacher->nationality_id = $request->nationality_id;
   $teacher->religion_id = $request->religion_id;
   $teacher->joining_date = $request->joining_date;
   $teacher->birth_of_date = $request->birth_of_date;
   $teacher->address = $request->address;
   $teacher->save();
   toastr()->success(trans('trans.data_saved_successfully'));
   return redirect()->back();
  }catch (Exception $e) {
     return redirect()->back()->with(['error' => $e->getMessage()]);
  }
 }

 public function update($request, $teacher){
  $teacher = Teacher::find($teacher->id);
  if($teacher){
   $validated = $request->validated();
   try {
    $teacher->email = $request->email;
    if($request->password){
     $teacher->password =  Hash::make($request->password);
    }
    $teacher->name = [
       'ar' => $request->name_ar,
       'en' => $request->name_en
    ];
    $teacher->phone = $request->phone;
    $teacher->national_id = $request->national_id;
    $teacher->passport_id = $request->passport_id;
    $teacher->specialization_id = $request->specialization_id;
    $teacher->gender_id = $request->gender_id;
    $teacher->blood_id = $request->blood_id;
    $teacher->nationality_id = $request->nationality_id;
    $teacher->religion_id = $request->religion_id;
    $teacher->joining_date = $request->joining_date;
    $teacher->birth_of_date = $request->birth_of_date;
    $teacher->address = $request->address;
    $teacher->update();
    toastr()->success(trans('trans.data_updated_successfully'));
    return redirect()->back();
   }catch (Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function destroy($id){
  $teacher = Teacher::find($id);
  if($teacher){
   $teacher->delete();
    toastr()->success(trans('trans.data_updated_successfully'));
    return redirect()->back();
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }
}