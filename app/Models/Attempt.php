<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Attempt.php
class Attempt extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'user_id',
        'answers',
        'score',
    ];
    protected $casts = [
        'answers' => 'array',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
