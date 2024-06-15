<?php

namespace App\Http\Requests\Admin\College;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_en' => 'required|min:2|max:255|string|regex:/^[a-zA-Z\s]*$/',
            'name_ar' => 'required|min:2|max:255|string|regex:/^[\p{Arabic} ]+$/u',
        ];
    }
}
