<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/home') }}">Steganography</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contactus') }}">Contact Us <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="hidden" name="redirect" id="redirect">
            </form>
              <a id="logoutBtn" href="{{url('/logout')}}" method="POST" class="nav-link">Logout</a>
        </li>
      </ul>
    </div>
    <h2 style="color: white;">Welcome, {{$current_user->name}}</h2>
  </nav>
