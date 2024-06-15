<?php

namespace App\Http\Requests\Admin\Lesson;

use App\Models\LessonQuestion;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonQuestionRequest extends FormRequest
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
        $rules = [];

        $totalAnswers = count($this->input('answer_en', []));

        for ($index = 0; $index < $totalAnswers; $index++) {
            $rules["answer_en.$index"] = 'required|string';
            $rules["answer_ar.$index"] = 'required|string';
            $rules["answer_desc_en.$index"] = 'required|string';
            $rules["answer_desc_ar.$index"] = 'required|string';
            $rules["correct_answer.$index"] = 'required|in:0,1';
        }

        return array_merge($rules, [
            'lesson_id' =>'required|exists:lessons,id',
            'type' =>'required|in:'.implode(',', LessonQuestion::$types),
            'question_en' =>'required|string',
            'question_ar' =>'required|string',
            'active' => 'boolean',
        ]);
    }

    public function messages()
    {
        $messages = [];

        $totalAnswers = count($this->input('answer_en', []));

        for ($index = 0; $index < $totalAnswers; $index++) {
            $messages["answer_en.$index.required"] = 'The English answer field is required.';
            $messages["answer_ar.$index.required"] = 'The Arabic answer field is required.';
            $messages["answer_desc_en.$index.required"] = 'The English answer description field is required.';
            $messages["answer_desc_ar.$index.required"] = 'The Arabic answer description field is required.';
            $messages["correct_answer.$index.required"] = 'The correct answer selection is required.';
            $messages["correct_answer.$index.in"] = 'The correct answer must be true or false.';
        }

        return $messages;
    }

    /**
     * Prepare inputs for validation
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'active' => $this->toBoolean($this->active),
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
