<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeeRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'cost' => 'required|numeric',
            'stage_id' => 'required|exists:stages,id',
            'class_id' => 'required|exists:classrooms,id',
            'academic_year' => 'required',
            'notes' => 'nullable',
        ];
    }

    public function messages(){
        return [
            'name_ar.required' => trans('validation.required'),
            'name_en.required' => trans('validation.unique'),
            'cost.required' => trans('validation.required'),
            'cost.numeric' => trans('validation.numeric'),
            'stage_id.required' => trans('validation.required'),
            'stage_id.exists' => trans('validation.exists'),
            'class_id.required' => trans('validation.required'),
            'class_id.exists' => trans('validation.exists'),
            'academic_year.required' => trans('validation.required'),
        ];
    }
}