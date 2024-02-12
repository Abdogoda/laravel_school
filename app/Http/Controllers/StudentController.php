<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Traits\AttachmentTrait;
use App\Interface\StudentRepositoryInterface;
use App\Models\Attachment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller{

    use AttachmentTrait;
    public $student;

    public function __construct(StudentRepositoryInterface $student){
        $this->student = $student;
    }


    public function index(){
        return $this->student->index();
    }

    public function create(){
        return $this->student->create();
    }

    public function store(StoreStudentRequest $request){
        return $this->student->store($request);
    }

    public function show(string $id){
        return $this->student->show($id);
    }

    public function edit(string $id){
        return $this->student->edit($id);
    }

    public function update(UpdateStudentRequest $request, Student $student){
        return $this->student->update($request, $student);
    }

    public function destroy(string $id){
        return $this->student->destroy($id);
    }
    
    public function upload_attachments(Request $request){
        $customMessages = [
            'required' => trans('validation.required'),
            'array' => trans('validation.array'),
            'max' => trans('validation.max'),
            'image' => trans('validation.image'),
            'mimes' => trans('validation.mimes'),
        ];
        $request->validate([
            'attachments' => 'required|array|max:3',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ], $customMessages);
        
        if($request->hasFile('attachments')){
            $student = Student::find($request->student_id);
            if($student){
                if(($student->attachments()->count() + count($request->file('attachments'))) < 4){
                    $this->storeAttachments($request, 'attachments', 'uploads/students', $student->id, 'Student');
                    toastr()->success(trans('trans.data_saved_successfully'));
                    return redirect()->back();
                }else{
                    toastr()->warning(trans('trans.maximum_3_attachments_and_used').$student->attachments->count());
                    return redirect()->back();
                }
            }else{
                toastr()->warning(trans('trans.no_data_available'));
                return redirect()->back();
            }
        }
    }
    
    public function download_attachment(string $id){
        $attachment = Attachment::find($id);
        if(!$attachment){
            toastr()->warning(trans('trans.no_data_available'));
            return redirect()->back();
        }else{
            if(Storage::disk('public')->exists($attachment->path)){
                return Storage::disk('public')->download($attachment->path);
            }else{
                toastr()->warning(trans('trans.no_data_available'));
                return redirect()->back();
            }
        }
    }
    public function download_attachment_by_model(string $model, string $attachmentable_id){
        $attachment = Attachment::where('attachmentable_id', $attachmentable_id)->where('model', $model)->first();
        if(!$attachment){
            toastr()->warning(trans('trans.no_data_available'));
            return redirect()->back();
        }else{
            if(Storage::disk('public')->exists($attachment->path)){
                return Storage::disk('public')->download($attachment->path);
            }else{
                toastr()->warning(trans('trans.no_data_available'));
                return redirect()->back();
            }
        }
    }
    
    public function delete_attachment(string $id){
        $attachment = Attachment::find($id);
        if(!$attachment){
            toastr()->warning(trans('trans.no_data_available'));
            return redirect()->back();
        }else{
            $this->deleteAttachmentById($id);
            toastr()->success(trans('trans.data_deleted_successfully'));
            return redirect()->back();
        }
    }
}