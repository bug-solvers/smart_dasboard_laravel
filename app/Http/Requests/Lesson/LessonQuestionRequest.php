<?php

namespace App\Http\Requests\Admin\Lesson;

use App\Models\LessonQuestion;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LessonQuestionRequest extends FormRequest
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
            'lesson_id' => 'required|exists:lessons,id',
            'type' => 'required|in:' . implode(',', LessonQuestion::$types),
            'question_en' => 'required|string',
            'question_ar' => 'required|string',
            'active' => 'boolean',
            'correct_answer' => 'required|boolean',
        ];
    }

    /**
     * Prepare inputs for validation
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'active' => $this->toBoolean($this->active),
            'correct_answer' => $this->toBoolean($this->correct_answer),
        ]);
    }

    /**
     * Convert to boolean
     *
     * @param $booleable
     * @return bool|null
     */
    private function toBoolean($booleable): ?bool
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
