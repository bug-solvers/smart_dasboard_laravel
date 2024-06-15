<?php

namespace App\Http\Requests\Admin\Lesson;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'module_id' => 'required|exists:modules,id',
            'name_en' => ['required', 'string', 'min:3', 'max:255','regex:/^[a-zA-Z\s]*$/'],
            'name_ar' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{Arabic} ]+$/u'],
            'description_en' => ['required','string','min:3', 'regex:/^[a-zA-Z\s]*$/'],
            'description_ar' => ['required','string','min:3', 'regex:/^[\p{Arabic} ]+$/u'],
            'is_free' => 'required|boolean',
            'image' => $this->checkImage(),
        ];
    }

    public function checkImage(): string
    {
        return request()->isMethod('PUT') ? 'nullable|image|mimes:png,jpg,jpeg,webp' : 'required|image|mimes:png,jpg,jpeg,webp';
    }

    /**
     * Prepare inputs for validation
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_free' => $this->toBoolean($this->is_free),
        ]);
    }

    /**
     * Convert to boolean
     *
     * @param $booleable
     * @return boolean
     */
    private function toBoolean($booleable): bool
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
