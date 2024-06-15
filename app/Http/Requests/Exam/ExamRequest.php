<?php

namespace App\Http\Requests\Admin\Exam;

use App\Models\Exam;
use App\Rules\UniqueTranslation;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function onCreate(): array
    {
        return [
            'lesson_id' => 'required|exists:lessons,id',
            'title_en' => ['required', 'string', 'min:3', 'max:255','regex:/^[a-zA-Z\s]*$/',new UniqueTranslation('exams', 'title')],
            'title_ar' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{Arabic} ]+$/u', new UniqueTranslation('exams', 'title')],
            'type' =>'required|in:'.implode(',', Exam::$types),
            'degree' =>'required|numeric',
            'success_degree' =>'required|numeric',
            'fail_degree' =>'required|numeric',
        ];
    }

    public function onUpdate(): array
    {
        return [
            'lesson_id' => 'required|exists:lessons,id',
            'title_en' => ['required', 'string', 'min:3', 'max:255','regex:/^[a-zA-Z\s]*$/',new UniqueTranslation('exams', 'title', request('id_unique'))],
            'title_ar' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{Arabic} ]+$/u', new UniqueTranslation('exams', 'title', request('id_unique'))],
            'type' =>'required|in:'.implode(',', Exam::$types),
            'degree' =>'required|numeric',
            'success_degree' =>'required|numeric',
            'fail_degree' =>'required|numeric',
        ];
    }

    public function onDelete(): array
    {
        return [
            'id' => 'required|exists:exams,id',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => $this->onCreate(),
            'PUT', 'PATCH' => $this->onUpdate(),
            'DELETE' => $this->onDelete(),
            default => [],
        };
    }
}
