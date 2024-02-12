<?php

namespace App\Http\Controllers;

use App\Http\Traits\AttachmentTrait;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller{

    use AttachmentTrait;
    public function index(){
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function($collection){
            return [$collection->key => $collection->value];
        });
        return view('pages.settings.index', $setting);
    }

    public function update(Request $request){
        try{
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }
            if($request->hasFile('logo')) {
                $logo = Setting::where('key', 'logo')->first();
                if(Storage::disk('public')->exists($logo->value)){
                    Storage::disk('public')->delete($logo->value);
                }
                $file = $request->file('logo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/settings/logo';
                $file->storeAs($path, $filename,'public');
                $logo->update(['value' => $path.'/'.$filename]);
            }
            toastr()->success(trans('trans.data_updated_successfully'));
            return back();
        }
        catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
}