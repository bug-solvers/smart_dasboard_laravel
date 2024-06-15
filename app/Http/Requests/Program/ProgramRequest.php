<?php

namespace App\Http\Requests\Admin\Program;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'college_id' => 'required|exists:colleges,id',
            'name_en' => ['required', 'string', 'min:3', 'max:255','regex:/^[a-zA-Z\s]*$/'],
            'name_ar' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{Arabic} ]+$/u'],
            'description_en' => ['required','string','min:3', 'regex:/^[a-zA-Z\s]*$/'],
            'description_ar' => ['required','string','min:3', 'regex:/^[\p{Arabic} ]+$/u'],
            'price' => ['required', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'status' => ['sometimes', 'in:0,1'],
            'image' => $this->checkImage(),
        ];
    }

    public function checkImage(): string
    {
        return request()->isMethod('PUT') ? 'nullable|image|mimes:png,jpg,jpeg,webp' : 'required|image|mimes:png,jpg,jpeg,webp';
    }
}
