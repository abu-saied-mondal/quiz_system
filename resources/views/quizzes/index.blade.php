
@extends('layouts.app')

@section('content')
<h1>Available Quizzes</h1>
@if(session('success'))
<p class="text-success">{{session('success')}}</p>
@endif
<ol>
    @foreach($quizzes as $quiz)
        <li>
            <h4 style><a href="{{ url('/quizzes/' . $quiz->id) }}">{{ $quiz->title }}</a></h4>
        </li>
    @endforeach
</ol>
@endsection
