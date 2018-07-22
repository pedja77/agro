<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#"><img src="{{ asset('images/agrobearings_logo.png') }}" width="200px" alt="Agro Bearings logo" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/catalog">Catalog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sale">Sale</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/services">Services</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          About Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mission</a>
          <a class="dropdown-item" href="#">Vision</a>
          <a class="dropdown-item" href="#">Our history</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>
    </ul>
    @if(!Auth::check())
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="dropdown-item">
                    <form method="POST" action="/login">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="emil_choveka">Email</label>
                        <input id="emil_choveka" name="emil_choveka" placeholder="Email" type="email" required="required" class="form-control here">
                    </div>
                    <div class="form-group">
                        <label for="user_pwd">Password</label>
                        <input id="user_pwd" name="user_pwd" placeholder="Password" type="password" required="required" class="form-control here">
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-outline-success">Login</button>
                    </div>
                    </form>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
        </li>
        </ul>
    @else
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->user_name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </li>
        </ul>
    @endif
    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}

</nav>
</div>

