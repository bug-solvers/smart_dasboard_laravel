<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class LessonQuestionAnswer extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = [
        'answer',
        'answer_description'
    ];

    protected $fillable = [
       'answer',
       'answer_description',
       'is_correct',
        'lesson_question_id'
    ];

    public function lessonQuestion(): BelongsTo
    {
        return $this->belongsTo(LessonQuestion::class, 'lesson_question_id');
    }
}
