<nav class="navbar navbar-header navbar-expand-lg navbar-light border-bottom height-auto py-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage.index') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link me-2 text-primary">
                <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="log-in"></i>Login
              </a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link text-info">
                <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="user-plus"></i>Register
              </a>
            </li>
          @endif
        @else
          <li class="dropdown">
            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <div class="avatar me-1">
                <img src="{{ asset('images/icon-person.png') }}" alt="Logo Person" srcset="">
              </div>
              <div class="d-none d-md-block d-lg-inline-block">Hi, {{ ucwords(Auth::user()->name) }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="{{ route('homepage.index') }}"><i data-feather="home"></i> Homepage</a>
              <a class="dropdown-item" href="{{ route('dashboard.index') }}"><i data-feather="settings"></i> Dashboard</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i data-feather="log-out"></i> Logout
              </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
