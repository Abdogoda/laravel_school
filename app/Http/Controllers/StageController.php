<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStageRequest;
use App\Models\Classroom;
use App\Models\Stage;

class StageController extends Controller{

    public function index(){
        $stages = Stage::all();
        return view('pages.stages.index', compact('stages'));
    }

    public function create(){
        //
    }

    public function store(StoreStageRequest $request){
        $validated = $request->validated();
        try {
            $stage = new Stage();
            $stage->name = [
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ];
            $stage->notes = $request->notes;
            $stage->save();
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

    public function update(StoreStageRequest $request, string $id){
        $validated = $request->validated();
        try {
            $stage = Stage::find($id);
            if($stage){
                $stage->name = [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ];
                $stage->notes = $request->notes;
                $stage->save();
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
            $stage = Stage::find($id);
            if($stage){
                if($stage->classrooms()->count() > 0 || $stage->sections()->count() > 0){
                    toastr()->error(trans('trans.this_row_have_ralated_data'));
                    return redirect()->back();
                }else{
                    $stage->delete();
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

    public function get_stage_classes(string $id){
        $classes = Classroom::where('stage_id', $id)->pluck('name','id');
        return $classes;
    }
}