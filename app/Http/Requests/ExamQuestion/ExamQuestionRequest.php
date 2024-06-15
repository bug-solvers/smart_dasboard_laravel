<?php

namespace App\Http\Requests\Admin\ExamQuestion;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ExamQuestionRequest extends FormRequest
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
            'exam_id' => 'required|exists:exams,id',
            'question_en' => 'nullable|string',
            'question_ar' => 'nullable|string',
            'video_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'answers.*.answer_en' => 'required|string',
            'answers.*.answer_ar' => 'required|string',
            'answers.*.correct_answer' => 'required|in:0,1',
        ];
    }
}
