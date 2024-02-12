<?php
namespace App\Repository;

use App\Http\Traits\AttachmentTrait;
use App\Interface\GardianRepositoryInterface;
use App\Models\Attachment;
use App\Models\Blood;
use App\Models\Gardian;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Relationship;
use App\Models\Religion;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GardianRepository implements GardianRepositoryInterface{

   use AttachmentTrait;
 public function index(){
  $gardians = Gardian::all();
  return view('pages.gardians.index', compact('gardians'));
 }
 public function show($id){
  $gardian = Gardian::find($id);
  if($gardian){
   $genders = Gender::all();
   $bloods = Blood::all();
   $nationalities = Nationality::all();
   $religions = Religion::all();
   $students = Student::all();
   $relationships = Relationship::all();
   return view('pages.gardians.edit', compact('gardian', 'genders', 'bloods', 'nationalities', 'religions', 'students', 'relationships'));
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create(){
  $genders = Gender::all();
  $bloods = Blood::all();
  $nationalities = Nationality::all();
  $students = Student::all();
  $religions = Religion::all();
  $relationships = Relationship::all();
  return view('pages.gardians.add', compact('genders', 'bloods', 'nationalities', 'religions', 'students', 'relationships'));
 }

 public function store($request){
  $validated = $request->validated();
  try {
   $gardian = new Gardian();
   $gardian->email = $request->email;
   $gardian->password =  Hash::make($request->password);
   $gardian->name = $request->name;
   $gardian->phone = $request->phone;
   $gardian->birth_of_date = $request->birth_of_date;
   $gardian->job = $request->job;
   $gardian->national_id = $request->national_id;
   $gardian->passport_id = $request->passport_id;
   $gardian->gender_id = $request->gender_id;
   $gardian->blood_id = $request->blood_id;
   $gardian->nationality_id = $request->nationality_id;
   $gardian->religion_id = $request->religion_id;
   $gardian->student_id = $request->student_id;
   $gardian->relationship_id = $request->relationship_id;
   $gardian->address = $request->address;
   $gardian->save();
   $this->storeAttachments($request, 'attachments', 'uploads/gardians', $gardian->id, 'Gardian');
   toastr()->success(trans('trans.data_saved_successfully'));
   return redirect()->back();
  }catch (Exception $e) {
     return redirect()->back()->with(['error' => $e->getMessage()]);
  }
 }

 public function update($request, $gardian){
  $gardian = Gardian::find($gardian->id);
  if($gardian){
   $validated = $request->validated();
   try {
      $gardian->email = $request->email;
      if(isset($request->password)) $gardian->password =  Hash::make($request->password);
      $gardian->name = $request->name;
      $gardian->phone = $request->phone;
      $gardian->birth_of_date = $request->birth_of_date;
      $gardian->job = $request->job;
      $gardian->national_id = $request->national_id;
      $gardian->passport_id = $request->passport_id;
      $gardian->gender_id = $request->gender_id;
      $gardian->blood_id = $request->blood_id;
      $gardian->nationality_id = $request->nationality_id;
      $gardian->religion_id = $request->religion_id;
      $gardian->student_id = $request->student_id;
      $gardian->relationship_id = $request->relationship_id;
      $gardian->address = $request->address;
      $gardian->update();
      if($request->hasFile('attachments')){
         if(($gardian->attachments()->count() + count($request->file('attachments'))) < 4){
            $this->storeAttachments($request, 'attachments', 'uploads/gardians', $gardian->id, 'Gardian');
         }else{
            toastr()->warning(trans('trans.maximum_3_attachments_and_used').$gardian->attachments->count());
         }
      }
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
   try {
      $gardian = Gardian::find($id);
      if($gardian){
         $this->deleteAttachments($gardian->id, 'Gardian');
         $gardian->delete();
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