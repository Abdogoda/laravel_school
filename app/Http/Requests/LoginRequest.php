<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'login' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(){
        return [
            'login.required' => trans('validation.required'),
            'login.email' => trans('validation.email'),
            'password.required' => trans('validation.unique'),
            'password.min' => trans('validation.min'),
        ];
    }
}