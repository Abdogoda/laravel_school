<?php
namespace App\Repository;

use App\Interface\QuizRepositoryInterface;
use App\Models\Quiz;
use App\Models\Stage;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;

class QuizRepository implements QuizRepositoryInterface{

 public function index(){
  $quizzes = Quiz::where('teacher_id', '=', auth()->user()->id)->get();
  $stages = Stage::all();
  $subjects = Subject::all();
  return view('pages.exams.quizzes.index', compact('quizzes', 'stages', 'subjects'));
}
public function show($id){
   $quiz = Quiz::find($id);
   $stages = Stage::all();
   $subjects = Subject::all();
   if($quiz){
      return view('pages.exams.quizzes.show', compact('quiz', 'stages', 'subjects'));
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
      $quiz = new Quiz();
      $quiz->name = [
         'ar' => $request->name_ar,
         'en' => $request->name_en,
      ];
      $quiz->stage_id = $request->stage_id;
      $quiz->class_id = $request->class_id;
      $quiz->section_id = $request->section_id;
      $quiz->subject_id = $request->subject_id;
      $quiz->teacher_id = auth()->user()->id;
      $quiz->save();
      toastr()->success(trans('trans.data_saved_successfully'));
      DB::commit();
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function edit($id){
   $quiz = Quiz::find($id);
   if($quiz){
    return $quiz;
   }else{
    toastr()->success(trans('trans.no_data_available'));
    return redirect()->back();
   }
  }

 public function update($request, $id){
   DB::beginTransaction();
   try {
      $quiz = Quiz::find($id);
      if($quiz){
         $quiz->name = [
            'ar' => $request->name_ar,
            'en' => $request->name_en,
         ];
         $quiz->stage_id = $request->stage_id;
         $quiz->class_id = $request->class_id;
         $quiz->section_id = $request->section_id;
         $quiz->subject_id = $request->subject_id;
         $quiz->teacher_id = auth()->user()->id;
         $quiz->update();
         
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
      $quiz = Quiz::find($id);
      if($quiz){
         $quiz->delete();
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