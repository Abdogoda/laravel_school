<?php

namespace App\Http\Controllers;

use App\Models\Gardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GardianProfileController extends Controller{

    public function index(){
        $gardian = Gardian::find(auth()->user()->id);
        return view('pages.gardians.dashboard.profile', compact('gardian'));
    }

    public function update(Request $request){
        $gardian = Gardian::find(auth()->user()->id);
        if($gardian){
            if(!empty($request->password)){
                $gardian->password = Hash::make($request->password);
            }
            $gardian->name = $request->name;
            $gardian->email = $request->email;
            $gardian->phone = $request->phone;
            $gardian->address = $request->address;
            $gardian->update();
            toastr()->success(trans('trans.data_updated_successfully'));
            return redirect()->back();
        }else{
            toastr()->error(trans('trans.no_data_available'));
            return redirect()->back();
        }
    }
}