<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class ExamQuestion extends Model
{
    use HasFactory, HasTranslations;

    const PATH = 'questions';
    public array $translatable = ['question',];

    protected $fillable = [
        'question',
        'exam_id',
        'image',
        'video_url'
    ];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(AnswerQuestion::class, 'exam_question_id');
    }

    public function getImageAttribute($value): string
    {
        return asset(static::PATH . DIRECTORY_SEPARATOR . $value);
    }
}
