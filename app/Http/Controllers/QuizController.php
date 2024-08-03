<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $quiz = Quiz::get();
        return view('quizzes.create',compact('quiz'));
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'time_limit' => 'nullable|integer',
        ]);

        $quiz = Quiz::create([
            'title' => $request->title,
            'author_id' => auth()->id(),
            'time_limit' => $request->time_limit,
        ]);

        return redirect('/quizzes/create')->with('success', 'Quiz created successfully.');
    }
}
