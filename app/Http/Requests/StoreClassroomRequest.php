<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'list_classes.*.name_ar' => 'required|max:191',
            'list_classes.*.name_en' => 'required|max:191',
            'list_classes.*.stage_id' => 'required|exists:stages,id',
        ];
    }

    public function messages(){
        return [
            'name_en.required' => trans('validation.required'),
            'name_en.max' => trans('validation.max'),
            'name_ar.required' => trans('validation.required'),
            'name_ar.max' => trans('validation.max'),
            'stage_id.required' => trans('validation.required'),
            'stage_id.exists' => trans('validation.exists'),
        ];
    }
}