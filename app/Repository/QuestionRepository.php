<?php
namespace App\Repository;

use App\Interface\QuestionRepositoryInterface;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Stage;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;

class QuestionRepository implements QuestionRepositoryInterface{

 public function index(){
  $questions = Question::all();
  $stages = Stage::all();
  $subjects = Subject::all();
  $teachers = Teacher::all();
  return view('pages.exams.questions.index', compact('questions', 'stages', 'subjects', 'teachers'));
 }
 public function show($id){
  $question = Question::find($id);
  if($question){
   return $question;
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
      $question = new Question();
      $question->quiz_id = $request->quiz_id;
      $question->text = $request->question;
      $question->score = $request->score;
      $question->save();
      foreach($request->list_answers as $an){
         $question_answer = new Answer();
         $question_answer->question_id = $question->id;
         $question_answer->text = $an['answer'];
         if(isset($an['status'])){
            $question_answer->status = '1';
         }
         $question_answer->save();
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
   $question = Question::find($id);
   if($question){
    return $question;
   }else{
    toastr()->success(trans('trans.no_data_available'));
    return redirect()->back();
   }
  }

 public function update($request, $id){
   DB::beginTransaction();
   try {
      $question = Question::find($id);
      if($question){
         $question->text = $request->question;
         $question->score = $request->score;
         $question->update();
         
         $question->answers()->delete();
         
         foreach($request->list_answers as $an){
            $question_answer = new Answer();
            $question_answer->question_id = $question->id;
            $question_answer->text = $an['answer'];
            if(isset($an['status'])){
               $question_answer->status = '1';
            }
            $question_answer->save();
         }
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
      $question = Question::find($id);
      if($question){
         $question->delete();
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