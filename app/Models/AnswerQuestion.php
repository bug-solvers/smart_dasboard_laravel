<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class AnswerQuestion extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['answer'];

    protected $fillable = [
        'answer',
        'is_correct_answer',
        'exam_question_id',
    ];

    public function examQuestion(): BelongsTo
    {
        return $this->belongsTo(ExamQuestion::class, 'exam_question_id');
    }
}
