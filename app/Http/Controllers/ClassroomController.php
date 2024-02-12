<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Stage;
use Illuminate\Http\Request;

class ClassroomController extends Controller{

    public function index(){
        $classes = Classroom::all();
        $stages = Stage::all();
        return view('pages.classes.index', compact('classes','stages'));
    }

    public function create(){
        //
    }

    public function store(StoreClassroomRequest $request){
        $validated = $request->validated();
        try {
            foreach ($request->list_classes as $key => $class_request) {
                $class = new Classroom();
                $class->name = [
                    'en' => $class_request['name_en'],
                    'ar' => $class_request['name_ar']
                ];
                $class->stage_id = $class_request['stage_id'];
                $class->save();
            }
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

    public function update(UpdateClassroomRequest $request, string $id){
        $validated = $request->validated();
        try {
            $class = Classroom::find($id);
            if($class){
                $class->name = [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ];
                $class->stage_id = $request->stage_id;
                $class->save();
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
            $class = Classroom::find($id);
            if($class){
                if($class->sections()->count() > 0){
                    toastr()->error(trans('trans.this_row_have_ralated_data'));
                    return redirect()->back();
                }else{
                    $class->delete();
                    toastr()->success(trans('trans.data_deleted_successfully'));
                    return redirect()->back();
                }
            }else{
                toastr()->error(trans('trans.no_data_available'));
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete_all(Request $request){
        try {
            foreach (explode(',', $request->delete_all_id) as $id) {
                $class = Classroom::find($id);
                if($class){
                    if($class->sections()->count() > 0){
                        toastr()->error(trans('trans.this_row_have_ralated_data'));
                        return redirect()->back();
                    }else{
                        $class->delete();
                    }
                }
            }
            toastr()->success(trans('trans.data_deleted_successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function get_class_sections(string $id){
        $sections = Section::where('class_id', $id)->pluck('name','id');
        return $sections;
    }
}