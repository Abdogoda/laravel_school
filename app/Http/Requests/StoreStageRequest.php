<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStageRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'name_ar' => 'required|max:191',
            'name_en' => 'required|max:191',
            'notes' => 'max:191',
        ];
    }

    public function messages(){
        return [
            'name_en.required' => trans('validation.required'),
            'name_en.max' => trans('validation.max'),
            'name_ar.required' => trans('validation.required'),
            'name_ar.max' => trans('validation.max'),
            'notes.max' => trans('validation.max'),
        ];
    }
}