<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="#">Quiz System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @auth
        <li class="nav-item active">
          <a class="btn btn-sm btn-outline-success mx-2" href="{{ url('/quizzes/create') }}">Create Quiz <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="btn btn-sm btn-outline-primary mx-2" href="{{ url('/quizzes') }}">Attempt Quiz <span class="sr-only">(current)</span></a>
        </li>
      @else
        <li class="nav-item active">
          <a class="btn btn-sm btn-outline-success mx-2" href="{{ url('/quizzes') }}">Quizzes <span class="sr-only">(current)</span></a>
        </li>
      @endauth
    </ul>
    <ul class="navbar-nav ml-auto">
      @auth
        <li class="nav-item active">
          <a class="btn btn-sm btn-danger mx-2" href="{{ url('/logout') }}">Logout <span class="sr-only">(current)</span></a>
        </li>
      @else
        <li class="nav-item">
          <a class="btn btn-sm btn-primary" href="{{ url('/register') }}">Register</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-sm btn-danger mx-2" href="{{ url('/login') }}">Login</a>
        </li>
      @endauth
    </ul>
  </div>
</nav>
