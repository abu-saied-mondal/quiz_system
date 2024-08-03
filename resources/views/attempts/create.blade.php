
@extends('layouts.app')

@section('content')
@if(isset($quiz))
<h1>Attempt Quiz: {{ $quiz->title }}</h1>
<form action="{{ url('/quizzes/' . $quiz->id . '/attempts') }}" method="POST">
    @csrf
    @foreach($quiz->questions as $key => $question)
        <div>
            <p>{{++$key}}. <b>{{ $question->question }}</b></p>
            @foreach($question->options as $option)
            <div class="form-group">
                <label for="ra">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" >
                {{ $option }}
                </label>
            </div>   
            @endforeach
        </div>
    @endforeach
    <button class="btn btn-sm btn-primary" type="submit">Submit Quiz</button>
    @endif
</form>
@endsection
