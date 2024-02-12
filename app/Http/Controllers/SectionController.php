<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Stage;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller{

    public function index(){
        $stages = Stage::all();
        $classes = Classroom::all();
        $teachers = Teacher::all();
        return view('pages.sections.index', compact('stages', 'classes', 'teachers'));
    }

    public function create(){
        //
    }

    public function store(StoreSectionRequest $request){
        $validated = $request->validated();
        try{
            $section = new Section();
            $section->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en
            ];
            $section->status = 1;
            $section->stage_id = $request->stage_id;
            $section->class_id = $request->class_id;
            $section->save();
            $section->teachers()->attach($request->teacher_id);
            toastr()->success(trans('trans.data_saved_successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id){
        //
    }

    public function edit(string $id){
        //
    }

    public function update(StoreSectionRequest $request, string $id){
        $validated = $request->validated();
        try {
            $section = Section::find($id);
            if($section){
                $section->name = [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ];
                $section->stage_id = $request->stage_id;
                $section->class_id = $request->class_id;
                $section->status = $request->status == 'on' ? '1' : '0';
                if(isset($request->teacher_id)){
                    $section->teachers()->sync($request->teacher_id);
                }
                $section->save();
                toastr()->success(trans('trans.data_updated_successfully'));
                return redirect()->back();
            }else{
                toastr()->error(trans('trans.no_data_available'));
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(string $id){
        try {
            $section = Section::find($id);
            if($section){
                $section->delete();
                toastr()->success(trans('trans.data_deleted_successfully'));
                return redirect()->back();
            }else{
                toastr()->error(trans('trans.no_data_available'));
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}