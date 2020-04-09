
<header>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-left">

        </ul>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/rooms">Rooms</a>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          @if(Auth::check())
            <li class="nav-item">
              <span class="nav-link" style="color:red"><small>{{ Auth::user()->name}}</small></span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('logout')}}">{{ __('Logout') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('adminperm')}}">{{ __('Admin') }}</a>
            </li>
            
          @else
            <li class="nav-item">
                <a class="nav-link" href="{{Route('users.index')}}">{{ __('Login') }}</a>
            </li>
         
            <li class="nav-item">
                <a class="nav-link" href="{{Route('users.create')}}">{{ __('Register') }}</a>
            </li>
          @endif 
        </ul>
      </div>
    </div>
  </nav>
</header>


