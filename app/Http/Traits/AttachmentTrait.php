<?php 
namespace App\Http\Traits;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

trait AttachmentTrait{
 public function storeAttachment($request, $input, $path, $attachmentable_id, $model){
  if($request->hasFile($input)){
   $file = $request->file($input);
   $filename = $file->getClientOriginalName();
   $extension = $file->getClientOriginalExtension();
   $customFilename = uniqid().'.'.$extension;
   $filepath = $file->storeAs($path, $customFilename, 'public');
   Attachment::create([
      'name' => $filename,
      'path' => $filepath,
      'attachmentable_id' => $attachmentable_id,
      'model' => $model
   ]);
  }
 }


 public function storeAttachments($request, $input, $path, $attachmentable_id, $model){
  if($request->hasFile($input)){
   foreach($request->file($input) as $file){
    $filename = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    $customFilename = uniqid().'.'.$extension;
    $filepath = $file->storeAs($path, $customFilename, 'public');
    Attachment::create([
       'name' => $filename,
       'path' => $filepath,
       'attachmentable_id' => $attachmentable_id,
       'model' => $model
    ]);
   }
  }
 }

 public function deleteAttachments($attachmentable_id, $model){
  $attachments = Attachment::where('attachmentable_id', $attachmentable_id)->where('model', $model)->get();
  if($attachments->count() > 0){
   foreach ($attachments as $attachment) {
    if(Storage::disk('public')->exists($attachment->path)){
     Storage::disk('public')->delete($attachment->path);
     $attachment->delete();
    }
   }
  }
 }
 public function deleteAttachmentById($id){
  $attachment = Attachment::find($id);
  if($attachment){
    if(Storage::disk('public')->exists($attachment->path)){
     Storage::disk('public')->delete($attachment->path);
     $attachment->delete();
    }
  }
 }

 
}