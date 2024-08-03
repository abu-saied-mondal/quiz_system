<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Question.php
class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'question',
        'options',
        'correct_answer',
    ];
    protected $casts = [
        'options' => 'array',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}

