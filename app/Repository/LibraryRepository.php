<?php
namespace App\Repository;

use App\Http\Traits\AttachmentTrait;
use App\Interface\LibraryRepositoryInterface;
use App\Models\Library;
use App\Models\Stage;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LibraryRepository implements LibraryRepositoryInterface{

   use AttachmentTrait;
 public function index(){
  $library = Library::all();
  $stages = Stage::all();
  $teachers = Teacher::all();
  return view('pages.library.index', compact('library', 'stages', 'teachers'));
 }
 public function show($id){
  $library = Library::find($id);
  if($library){
   return $library;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create(){
   return "create";
}

 public function store($request){
   $request->validated();
   DB::beginTransaction();
   try {
      $book = new Library();
      $book->title = [
         'ar' => $request->title_ar,
         'en' => $request->title_en,
      ];
      $book->stage_id = $request->stage_id;
      $book->class_id = $request->class_id;
      $book->section_id = $request->section_id;
      $book->teacher_id = $request->teacher_id;
      $book->save();

      $this->storeAttachment($request, 'file', 'uploads/books', $book->id, 'Library');

      toastr()->success(trans('trans.data_saved_successfully'));
      DB::commit();
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function edit($id){
   $library = Library::find($id);
   if($library){
    return $library;
   }else{
    toastr()->success(trans('trans.no_data_available'));
    return redirect()->back();
   }
  }

 public function update($request, $id){
   $request->validated();
   DB::beginTransaction();
   try {
      $book = Library::find($id);
      if($book){
         $book->title = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
         ];
         $book->stage_id = $request->stage_id;
         $book->class_id = $request->class_id;
         $book->section_id = $request->section_id;
         $book->teacher_id = $request->teacher_id;
         $book->update();

         $this->deleteAttachments($book->id, 'Library');
         $this->storeAttachment($request, 'file', 'uploads/books', $book->id, 'Library');

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
      $book = Library::find($id);
      if($book){
         $this->deleteAttachments($book->id, 'Library');
         $book->delete();
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