<?php
namespace App\Repository;

use App\Http\Traits\ZoomTrait;
use App\Interface\OnlineClassRepositoryInterface;
use App\Models\Answer;
use App\Models\OnlineClass;
use App\Models\Stage;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassRepository implements OnlineClassRepositoryInterface{
   use ZoomTrait;

 public function index(){
  $online_classes = OnlineClass::all();
  return view('pages.online_classes.index', compact('online_classes'));
}
public function show($id){
   $online_class = OnlineClass::find($id);
   if($online_class){
      return $online_class;
   }else{
      toastr()->success(trans('trans.no_data_available'));
      return redirect()->back();
   }
}

public function create(){
   $online_classes = OnlineClass::all();
   $stages = Stage::all();
   return view('pages.online_classes.add', compact('online_classes', 'stages'));
}

 public function store($request){
   DB::beginTransaction();
   try {
      $meeting = $this->createMeeting($request);

      if($meeting){
         $online_class = new OnlineClass();
         $online_class->stage_id = $request->stage_id;
         $online_class->class_id = $request->class_id;
         $online_class->section_id = $request->section_id;
         $online_class->user_id = auth()->user()->id;
         $online_class->meeting_id = $meeting->id;
         $online_class->password = $meeting->password;
         $online_class->join_url = $meeting->join_url;
         $online_class->topic = $request->topic;
         $online_class->start_at = $request->class_date;
         $online_class->duration = $request->duration;
         $online_class->save();
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
   $online_class = OnlineClass::find($id);
   if($online_class){
    return $online_class;
   }else{
    toastr()->success(trans('trans.no_data_available'));
    return redirect()->back();
   }
  }

 public function update($request, $id){
   DB::beginTransaction();
   try {
      $online_class = OnlineClass::find($id);
      if($online_class){
         $online_class->text = $request->OnlineClass;
         $online_class->score = $request->score;
         $online_class->update();
         
         $online_class->answers()->delete();
         
         foreach($request->list_answers as $an){
            $online_class_answer = new Answer();
            $online_class_answer->OnlineClass_id = $online_class->id;
            $online_class_answer->text = $an['answer'];
            if(isset($an['status'])){
               $online_class_answer->status = '1';
            }
            $online_class_answer->save();
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
      $online_class = OnlineClass::find($id);
      if($online_class){
         $online_class->delete();
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