<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller{
    
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login_form($type){
        return view('auth.login', compact('type'));
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        $type = $request->type;
        if($type == 'student'){$guard = 'student';}
        elseif($type == 'gardian'){$guard = 'gardian';}
        elseif($type == 'teacher'){$guard = 'teacher';}
        else{$guard = 'web';}

        if(Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password])){
            toastr()->success(trans('trans.logged_in_successfully'));
            if($type == 'student'){
                return redirect()->intended(RouteServiceProvider::STUDENT);
            }
            elseif($type == 'gardian'){
                return redirect()->intended(RouteServiceProvider::GARDIAN);
            }
            elseif($type == 'teacher'){
                return redirect()->intended(RouteServiceProvider::TEACHER);
            }
            else{
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }else{
            toastr()->error(trans('trans.email_or_password_not_valid'));
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->warning(trans('trans.logged_out_successfully'));
        return redirect('/');
    }

}