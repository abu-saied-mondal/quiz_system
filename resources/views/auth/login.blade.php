@extends('layouts.app')

@section('content')
<h1>Login</h1>
@if(session('success'))
<p class="text-success">{{ session('success') }}</p>
@elseif($errors->has('email'))
<p class="text-danger">{{ $errors->first('email') }}</p>
@endif
<form action="{{ url('/login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    </div>
    <button class="btn btn-sm btn-success" type="submit">Login</button>
</form>
@endsection
    