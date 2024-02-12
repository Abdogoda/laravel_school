<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'email' => ['required', 'email', 'unique:teachers,email,'.$this->teacher->id.',id'],
            'password' => 'nullable|min:6|max:191',
            'name' => 'required|min:3|max:191',
            'phone' => ['required', 'min:11', 'max:11', 'unique:teachers,phone,'.$this->teacher->id.',id'],
            'national_id' => 'required|numeric|digits:14',
            'passport_id' => 'required|numeric|digits:14',
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'blood_id' => 'required',
            'nationality_id' => 'required',
            'religion_id' => 'required',
            'joining_date' => 'required|date|date_format:Y-m-d',
            'birth_of_date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
        ];
    }

    public function messages(){
        return [
            'email.required' => trans('validation.required'),
            'email.email' => trans('validation.email'),
            'email.unique' => trans('validation.unique'),
            'phone.required' => trans('validation.required'),
            'phone.unique' => trans('validation.unique'),
            'phone.min' => trans('validation.min'),
            'phone.max' => trans('validation.max'),
            'national_id.required' => trans('validation.required'),
            'national_id.numeric' => trans('validation.numeric'),
            'national_id.digits' => trans('validation.digits'),
            'passport_id.required' => trans('validation.required'),
            'passport_id.numeric' => trans('validation.numeric'),
            'passport_id.digits' => trans('validation.digits'),
            'password.min' => trans('validation.min'),
            'password.max' => trans('validation.max'),
            'name.required' => trans('validation.required'),
            'name.max' => trans('validation.max'),
            'specialization_id.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'blood_id.required' => trans('validation.required'),
            'nationality_id.required' => trans('validation.required'),
            'religion_id.required' => trans('validation.required'),
            'joining_date.required' => trans('validation.required'),
            'joining_date.date' => trans('validation.required'),
            'joining_date.date_format' => trans('validation.required'),
            'birth_of_date.required' => trans('validation.required'),
            'birth_of_date.date' => trans('validation.required'),
            'birth_of_date.date_format' => trans('validation.required'),
            'address.required' => trans('validation.required'),
        ];
    }
}