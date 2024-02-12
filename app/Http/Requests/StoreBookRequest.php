<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }


    public function rules(): array{
        return [
            'title_ar' => 'required|max:191',
            'title_en' => 'required|max:191',
            'file' => 'required',
            'stage_id' => 'required|exists:stages,id',
            'class_id' => 'required|exists:classrooms,id',
            'section_id' => 'required|exists:sections,id',
            'teacher_id' => 'required|exists:teachers,id',
        ];
    }

    public function messages(){
        return [
            'title_ar.required' => trans('validation.required'),
            'title_ar.max' => trans('validation.max'),
            'title_en.required' => trans('validation.unique'),
            'title_en.max' => trans('validation.max'),
            'file.required' => trans('validation.required'),
            'stage_id.required' => trans('validation.required'),
            'stage_id.exists' => trans('validation.exists'),
            'class_id.required' => trans('validation.required'),
            'class_id.exists' => trans('validation.exists'),
            'section_id.required' => trans('validation.required'),
            'section_id.exists' => trans('validation.exists'),
            'teacher_id.required' => trans('validation.required'),
            'teacher_id.exists' => trans('validation.exists'),
        ];
    }
}