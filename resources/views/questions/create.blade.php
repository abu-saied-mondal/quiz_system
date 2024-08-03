

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Question to {{ $quiz->title }}</h1>
        
        <form action="{{ route('questions.store', $quiz->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" required>
            </div>
            
            <div class="form-group">
                <label for="options">Options (Comma Separated)</label>
                <input type="text" class="form-control" id="options" name="options[]" required>
                <input type="text" class="form-control mt-2" id="options" name="options[]" required>
                <input type="text" class="form-control mt-2" id="options" name="options[]" required>
                <input type="text" class="form-control mt-2" id="options" name="options[]" required>
            </div>

            <div class="form-group">
                <label for="correct_answer">Correct Answer</label>
                <input type="text" class="form-control" id="correct_answer" name="correct_answer" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Question</button>
        </form>
    </div>
@endsection
