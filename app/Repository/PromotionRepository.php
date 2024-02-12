<?php
namespace App\Repository;

use App\Interface\promotionRepositoryInterface;
use App\Models\Attachment;
use App\Models\Blood;
use App\Models\Promotion;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Relationship;
use App\Models\Religion;
use App\Models\Stage;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PromotionRepository implements promotionRepositoryInterface{

 public function index(){
  $stages = Stage::all();
  return view('pages.students.promotions.index', compact('stages'));
 }
 public function show($id){
  return $id;
 }

 public function create(){
   $promotions = Promotion::all();
  return view('pages.students.promotions.management', compact('promotions'));
 }

 public function store($request){
  $validated = Validator::make($request->all(), [
   'old_stage_id' => 'required|exists:stages,id',
   'new_stage_id' => 'required|exists:stages,id',
   'old_class_id' => 'required|exists:classrooms,id',
   'new_class_id' => 'required|exists:classrooms,id',
   'old_section_id' => 'required|exists:sections,id',
   'new_section_id' => 'required|exists:sections,id',
   'old_academic_year' => 'required',
   'new_academic_year' => 'required',
  ]);
   DB::beginTransaction();
   try {
      if($request->old_stage_id == $request->new_stage_id && $request->old_class_id == $request->new_class_id && $request->old_section_id == $request->new_section_id && $request->old_academic_year == $request->new_academic_year){
         toastr()->warning(trans('trans.no_changes_happend'));
         return redirect()->back();
      }else{
         $students = Student::where('stage_id', $request->old_stage_id)->where('class_id', $request->old_class_id)->where('section_id', $request->old_section_id)->where('academic_year', $request->old_academic_year)->get();
         if($students->count() > 0) {
            foreach ($students as $student) {
               $student->update([
                  'stage_id' => $request->new_stage_id,
                  'class_id' => $request->new_class_id,
                  'section_id' => $request->new_section_id,
                  'academic_year' => $request->new_academic_year
               ]);
               Promotion::updateOrCreate([
                  'student_id'=>$student->id,
                  'from_stage'=>$request->old_stage_id,
                  'from_class'=>$request->old_class_id,
                  'from_section'=>$request->old_section_id,
                  'from_academic_year'=>$request->old_academic_year,
                  'to_stage'=>$request->new_stage_id,
                  'to_class'=>$request->new_class_id,
                  'to_section'=>$request->new_section_id,
                  'to_academic_year'=>$request->new_academic_year,
               ]);
            }    
            DB::commit();
            toastr()->success(trans('trans.data_saved_successfully'));
            return redirect()->back();
         }else{
            toastr()->warning(trans('trans.no_data_available')."<br>".trans('trans.no_changes_happend'));
            return redirect()->back();
         }
      }
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function update($request, $promotion){
  return [$request, $promotion];
 }

 public function destroy($id){
   if($id == 0){
      DB::beginTransaction();
      try {
      $promotions = Promotion::all();
         foreach ($promotions as $promotion) {
            $student = Student::find($promotion->student_id);
            if($student){
               $student->update([
                  'stage_id' => $promotion->from_stage,
                  'class_id' => $promotion->from_class,
                  'section_id' => $promotion->from_section,
                  'academic_year' => $promotion->from_academic_year
               ]);
            }
            $promotion->delete();
         }
         DB::commit();
         toastr()->success(trans('trans.data_backed_successfully'));
         return redirect()->back();
      }catch (Exception $e) {
         DB::rollBack();
         return redirect()->back()->with(['error' => $e->getMessage()]);
      }
   }else{
      $promotion = Promotion::find($id);
      if($promotion){
         $student = Student::find($promotion->student_id);
         if($student){
            $student->update([
               'stage_id' => $promotion->from_stage,
               'class_id' => $promotion->from_class,
               'section_id' => $promotion->from_section,
               'academic_year' => $promotion->from_academic_year
            ]);
         }
         $promotion->delete();
         DB::commit();
         toastr()->success(trans('trans.data_backed_successfully'));
         return redirect()->back();
      }else{
         toastr()->error(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }
 }
}