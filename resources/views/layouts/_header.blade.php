<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav
      class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
    >
      <a href="{{ route('home')}}" >
      <img style="width:160px" src="{{ asset('front/img/logo.png')}}" alt="logo">
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse justify-content-between"
        id="navbarCollapse"
      >
        <div class="navbar-nav font-weight-bold mx-auto py-0">
          <a href="{{ url('/') }}" class="nav-item nav-link @if(Request::is('/')) active @endif">Home</a>
          <a href="{{ route('about') }}" class="nav-item nav-link @if(Request::is('about')) active @endif">About</a>
          <a href="{{ route('teams') }}" class="nav-item nav-link @if(Request::is('teams')) active @endif">Teams</a>
          <a href="{{ route('gallery') }}" class="nav-item nav-link @if(Request::is('gallery')) active @endif">Gallery</a>
          <a href="{{ route('blog-front') }}" class="nav-item nav-link @if(Request::is('blog')) active @endif">Blog</a>
          <a href="{{ route('contact') }}" class="nav-item nav-link @if(Request::is('contact')) active @endif">Contact</a>
        </div>
        <a href="{{route('login')}}" class="btn btn-primary px-4">Login</a>
        <a href="{{route('register')}}" class="btn btn-primary px-4 ml-3">Register</a>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->