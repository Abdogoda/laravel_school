<?php
namespace App\Repository;

use App\Interface\FeeRepositoryInterface;
use App\Models\Attachment;
use App\Models\Blood;
use App\Models\fee;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Relationship;
use App\Models\Religion;
use App\Models\Stage;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FeeRepository implements FeeRepositoryInterface{

 public function index(){
  $stages = Stage::all();
  $fees = Fee::all();
  return view('pages.fees.index', compact('fees', 'stages'));
 }
 public function show($id){
  $fee = Fee::find($id);
  if($fee){
   return $fee;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create(){
  return "create";
 }

 public function store($request){
  $validated = $request->validated();
  try {
   $fee = new Fee();
   $fee->name = [
      'ar' => $request->name_ar,
      'en' => $request->name_en,
   ];
   $fee->stage_id =  $request->stage_id;
   $fee->class_id =  $request->class_id;
   $fee->academic_year = $request->academic_year;
   $fee->cost = $request->cost;
   $fee->notes = $request->notes;
   $fee->save();
   toastr()->success(trans('trans.data_saved_successfully'));
   return redirect()->back();
  }catch (Exception $e) {
     return redirect()->back()->with(['error' => $e->getMessage()]);
  }
 }

 public function update($request, $fee){
  $fee = Fee::find($fee->id);
  if($fee){
   $validated = $request->validated();
   try {
      $fee->name = [
         'ar' => $request->name_ar,
         'en' => $request->name_en,
      ];
      $fee->stage_id =  $request->stage_id;
      $fee->class_id =  $request->class_id;
      $fee->academic_year = $request->academic_year;
      $fee->cost = $request->cost;
      $fee->notes = $request->notes;
      $fee->update();
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
      $fee = Fee::find($id);
      if($fee){
         $fee->delete();
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