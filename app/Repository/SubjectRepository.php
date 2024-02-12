<?php
namespace App\Repository;

use App\Interface\SubjectRepositoryInterface;
use App\Models\Subject;
use App\Models\FundAccount;
use App\Models\Section;
use App\Models\Stage;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubjectRepository implements SubjectRepositoryInterface{

 public function index(){
  $subjects = Subject::all();
  $stages = Stage::all();
  $teachers = Teacher::all();
  return view('pages.subjects.index', compact('subjects','stages', 'teachers'));
 }
 public function show($id){
  $subject = Subject::find($id);
  if($subject){
   return $subject;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create(){
   $stages = Stage::all();
   $teachers = Teacher::all();
   return view('pages.subject.add', compact('stages', 'teachers'));
}

 public function store($request){
   DB::beginTransaction();
   try {
      $subject = new Subject();
      $subject->name = [
         'ar' => $request->name_ar,
         'en' => $request->name_en,
      ];
      $subject->stage_id = $request->stage_id;
      $subject->class_id = $request->class_id;
      $subject->teacher_id = $request->teacher_id;
      $subject->save();
      toastr()->success(trans('trans.data_saved_successfully'));
      DB::commit();
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function edit($id){
   $subject = Subject::find($id);
   if($subject){
    return $subject;
   }else{
    toastr()->success(trans('trans.no_data_available'));
    return redirect()->back();
   }
  }

 public function update($request, $id){
   DB::beginTransaction();
   try {
      $subject = Subject::find($id);
      if($subject){
         $subject->name = [
            'ar' => $request->name_ar,
            'en' => $request->name_en,
         ];
         $subject->stage_id = $request->stage_id;
         $subject->class_id = $request->class_id;
         $subject->teacher_id = $request->teacher_id;
         $subject->update();
         
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
      $subject = Subject::find($id);
      if($subject){
         $subject->delete();
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