<?php
namespace App\Repository;

use App\Interface\GraduatedRepositoryInterface;
use App\Models\Promotion;
use App\Models\Stage;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GraduatedRepository implements GraduatedRepositoryInterface{

 public function index(){
  $graduated = Student::onlyTrashed()->get();
  return view('pages.students.graduated.index', compact('graduated'));
 }
 public function show($id){
  return $id;
 }

 public function create(){
   $stages = Stage::all();
  return view('pages.students.graduated.add', compact('stages'));
 }

 public function store($request){
  $validated = Validator::make($request->all(), [
   'stage_id' => 'required|exists:stages,id',
   'class_id' => 'required|exists:classrooms,id',
   'section_id' => 'required|exists:sections,id',
   'academic_year' => 'required',
  ]);
   DB::beginTransaction();
   try {
      $students = Student::where('stage_id', $request->stage_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();
      if($students->count() > 0) {
         foreach ($students as $student) {
            $student->delete();
         }    
         DB::commit();
         toastr()->success(trans('trans.data_saved_successfully'));
         return redirect()->back();
      }else{
         toastr()->warning(trans('trans.no_data_available')."<br>".trans('trans.no_changes_happend'));
         return redirect()->back();
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
   $student = Student::onlyTrashed()->find($id);
   if($student){
      $student->restore();
      toastr()->success(trans('trans.data_backed_successfully'));
      return redirect()->back();
   }else{
      toastr()->error(trans('trans.no_data_available'));
      return redirect()->back();
   }
 }
}