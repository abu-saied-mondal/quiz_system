@extends('layouts.app')

@section('content')
<h1 style="text-decoration:green underline;">Create a New Quiz</h1>
<form action="{{ url('/quizzes') }}" method="POST">
    @csrf
    <label for="title">Quiz Title:</label>
    <input type="text" name="title" id="title">
    
    <label for="time_limit">Time Limit (minutes):</label>
    <input type="number" name="time_limit" id="time_limit">
    
    <button class="btn btn-sm btn-success"  type="submit">Create Quiz</button>
</form>
<div class="table-responsive">
    <h3 style="text-align:center; margin-top:15px; text-decoration:green dotted underline;">Add Question to the available Quizzes</h3>
    <table class="table table-hover table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th>Sl No</th>
                <th>Quiz Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <thead>
            @if(isset($quiz))
            @foreach($quiz as $key => $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->title}}</td>
                <td><a href="{{url('/quizzes/questions/create')}}{{$item->id}}" ><button class="btn btn-sm btn-primary">Add Question</button></a></td>
            </tr>
            @endforeach
            @endif
        </thead>
    </table>
</div>
@endsection
