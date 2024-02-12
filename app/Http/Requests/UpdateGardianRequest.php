<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGardianRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'email' => 'required|email|unique:gardians,email,'.$this->gardian->id,
            'password' => 'nullable|min:6|max:191',
            'name' => 'required|min:3|max:191',
            'phone' => 'required|min:11|max:11|unique:gardians,phone,'.$this->gardian->id,
            'national_id' => 'required|numeric|digits:14|unique:gardians,national_id,'.$this->gardian->id,
            'passport_id' => 'nullable|numeric|digits:14|unique:gardians,passport_id,'.$this->gardian->id,
            'student_id' => 'required|exists:students,id',
            'relationship_id' => 'required|exists:relationships,id|unique:gardians,relationship_id,'.$this->gardian->id.',id,student_id,' . $this->gardian->student_id,
            'gender_id' => 'required',
            'blood_id' => 'required',
            'nationality_id' => 'required',
            'religion_id' => 'required',
            'birth_of_date' => 'required|date|date_format:Y-m-d',
            'job' => 'required',
            'address' => 'required',
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
            'phone.required' => trans('validation.required'),
            'phone.unique' => trans('validation.unique'),
            'phone.min' => trans('validation.min'),
            'phone.max' => trans('validation.max'),
            'national_id.required' => trans('validation.required'),
            'national_id.numeric' => trans('validation.numeric'),
            'national_id.digits' => trans('validation.digits'),
            'national_id.unique' => trans('validation.unique'),
            'passport_id.numeric' => trans('validation.numeric'),
            'passport_id.digits' => trans('validation.digits'),
            'passport_id.unique' => trans('validation.unique'),
            'password.min' => trans('validation.min'),
            'password.max' => trans('validation.max'),
            'name.required' => trans('validation.required'),
            'name.max' => trans('validation.max'),
            'student_id.required' => trans('validation.required'),
            'relationship_id.required' => trans('validation.required'),
            'student_id.exists' => trans('validation.exists'),
            'relationship_id.exists' => trans('validation.exists'),
            'gender_id.required' => trans('validation.required'),
            'blood_id.required' => trans('validation.required'),
            'nationality_id.required' => trans('validation.required'),
            'religion_id.required' => trans('validation.required'),
            'birth_of_date.required' => trans('validation.required'),
            'birth_of_date.date' => trans('validation.required'),
            'birth_of_date.date_format' => trans('validation.required'),
            'address.required' => trans('validation.required'),
            'job.required' => trans('validation.required'),
            'attachments.array' => trans('validation.array'),
            'attachments.max' => trans('validation.max'),
            'attachments.*.image' => trans('validation.image'),
            'attachments.*.mimes' => trans('validation.mimes'),
            'attachments.*.max' => trans('validation.max'),
        ];
    }
}