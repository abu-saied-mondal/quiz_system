<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('questions.create', compact('quiz'));
    }

    public function store(Request $request, $quizId)
    {
        // dd('Hello');
        $request->validate([
            'question' => 'required|string',
            'options' => 'required|array',
            'options.*' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        $question = Question::create([
            'quiz_id' => $quizId,
            'question' => $request->question,
            'options' => $request->options,
            'correct_answer' => $request->correct_answer,
        ]);
        return redirect()->route('quizzes.show', $quizId)->with('success', 'Question added successfully.');
    }
}
