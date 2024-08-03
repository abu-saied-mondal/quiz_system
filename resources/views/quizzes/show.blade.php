
@extends('layouts.app')

@section('content')
<h1>{{ $quiz->title }}</h1>
@if(session('success'))
<p class="text-success">{{session('success')}}</p>
@endif
<p>Time Limit: {{ $quiz->time_limit }} minutes</p>
<ol>
    @foreach($quiz->questions as $key =>  $question)
    <li>{{ $question->question }}</li>
    @endforeach
</ol>
@auth
    <a href="{{ url('/quizzes/' . $quiz->id . '/attempt') }}"><button class="btn btn-sm btn-success">Attempt Quiz</button></a>
@endauth
@endsection
