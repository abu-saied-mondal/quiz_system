<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Attempt;
use Illuminate\Http\Request;

class AttemptController extends Controller
{
    public function create($quizId)
    {
        $quiz = Quiz::with('questions')->findOrFail($quizId);
        return view('attempts.create', compact('quiz'));
    }

    public function store(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions')->findOrFail($quizId);
        $score = 0;

        foreach ($quiz->questions as $question) {
            if ($request->answers[$question->id] == $question->correct_answer) {
                $score++;
            }
        }

        $attempt = Attempt::create([
            'quiz_id' => $quizId,
            'user_id' => auth()->id(),
            'answers' => $request->answers,
            'score' => $score,
        ]);

        return redirect()->route('quizzes.show', $quizId)->with('success', 'Quiz attempted successfully. Your score: ' . $score);
    }
}
