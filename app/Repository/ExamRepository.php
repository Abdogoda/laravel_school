<?php
namespace App\Repository;

use App\Interface\ExamRepositoryInterface;
use App\Models\Exam;
use App\Models\FundAccount;
use App\Models\Section;
use App\Models\Stage;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExamRepository implements ExamRepositoryInterface{

 public function index(){
  $exams = Exam::all();
  return view('pages.exams.index', compact('exams'));
 }
 public function show($id){
  $exam = Exam::find($id);
  if($exam){
   return $exam;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create(){
   return "create";
}

 public function store($request){
   DB::beginTransaction();
   try {
      $exam = new Exam();
      $exam->name = [
         'ar' => $request->name_ar,
         'en' => $request->name_en,
      ];
      $exam->term = $request->term;
      $exam->academic_year = $request->academic_year;
      $exam->save();
      toastr()->success(trans('trans.data_saved_successfully'));
      DB::commit();
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function edit($id){
   $exam = Exam::find($id);
   if($exam){
    return $exam;
   }else{
    toastr()->success(trans('trans.no_data_available'));
    return redirect()->back();
   }
  }

 public function update($request, $id){
   DB::beginTransaction();
   try {
      $exam = Exam::find($id);
      if($exam){
         $exam->name = [
            'ar' => $request->name_ar,
            'en' => $request->name_en,
         ];
         $exam->term = $request->term;
         $exam->academic_year = $request->academic_year;
         $exam->update();
         
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
      $exam = Exam::find($id);
      if($exam){
         $exam->delete();
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