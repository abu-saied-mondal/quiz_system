
@extends('layouts.app')

@section('content')
<h1>Register</h1>
@if(session('success'))
<p class="text-success">{{session('success')}}</p>
@elseif($errors->has('email'))
<p class="text-danger">{{ $errors->first('email') }}</p>
@endif
<form action="{{ url('/register') }}" method="POST">
    @csrf'
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
    </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
    </div>
    
    <button class="btn btn-sm btn-primary" type="submit">Register</button>
</form>
Already have an account?  <a href="{{url('/login')}}"><span class="btn btn-sm btn-success">Login</span></a>
@endsection
