<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'email' => 'required|email|unique:students,email,'.$this->student->id,
            'password' => 'nullable|min:6|max:191',
            'name_ar' => 'required|min:3|max:191',
            'name_en' => 'required|min:3|max:191',
            'phone' => 'nullable|min:11|max:11|unique:students,phone,'.$this->student->id,
            'national_id' => 'required|numeric|digits:14|unique:students,national_id,'.$this->student->id,
            'passport_id' => 'nullable|numeric|digits:14|unique:students,passport_id,'.$this->student->id,
            'gender_id' => 'required|exists:genders,id',
            'blood_id' => 'required|exists:bloods,id',
            'nationality_id' => 'required|exists:nationalities,id',
            'religion_id' => 'required|exists:religions,id',
            'birth_of_date' => 'required|date|date_format:Y-m-d',
            'academic_year' => 'required',
            'stage_id' => 'required|exists:stages,id',
            'class_id' => 'required|exists:classrooms,id',
            'section_id' => 'required|exists:sections,id',
            'attachments' => 'nullable|array|max:3',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.email' => trans('validation.email'),
            'email.unique' => trans('validation.unique'),
            'phone.unique' => trans('validation.unique'),
            'phone.min' => trans('validation.min'),
            'phone.max' => trans('validation.max'),
            'national_id.required' => trans('validation.required'),
            'national_id.numeric' => trans('validation.numeric'),
            'national_id.digits' => trans('validation.digits'),
            'passport_id.numeric' => trans('validation.numeric'),
            'passport_id.digits' => trans('validation.digits'),
            'national_id.unique' => trans('validation.unique'),
            'passport_id.unique' => trans('validation.unique'),
            'password.min' => trans('validation.min'),
            'password.max' => trans('validation.max'),
            'name_ar.required' => trans('validation.required'),
            'name_ar.max' => trans('validation.max'),
            'name_en.required' => trans('validation.required'),
            'name_en.max' => trans('validation.max'),
            'gender_id.required' => trans('validation.required'),
            'gender_id.exists' => trans('validation.exists'),
            'blood_id.required' => trans('validation.required'),
            'blood_id.exists' => trans('validation.exists'),
            'nationality_id.required' => trans('validation.required'),
            'nationality_id.exists' => trans('validation.exists'),
            'religion_id.required' => trans('validation.required'),
            'religion_id.exists' => trans('validation.exists'),
            'academic_year.required' => trans('validation.required'),
            'birth_of_date.required' => trans('validation.required'),
            'birth_of_date.date' => trans('validation.required'),
            'birth_of_date.date_format' => trans('validation.required'),
            'stage_id.required' => trans('validation.required'),
            'stage_id.exists' => trans('validation.exists'),
            'class_id.required' => trans('validation.required'),
            'class_id.exists' => trans('validation.exists'),
            'section_id.required' => trans('validation.required'),
            'section_id.exists' => trans('validation.exists'),
            'attachments.array' => trans('validation.array'),
            'attachments.max' => trans('validation.max'),
            'attachments.*.image' => trans('validation.image'),
            'attachments.*.mimes' => trans('validation.mimes'),
            'attachments.*.max' => trans('validation.max'),
        ];
    }
}