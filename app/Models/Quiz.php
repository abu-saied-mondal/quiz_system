<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Quiz.php
class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author_id',
        'time_limit',
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }
}

