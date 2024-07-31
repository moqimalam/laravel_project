<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'dashboard') collapsed @endif" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if(Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'user') collapsed @endif" href="{{route('user')}}">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'category') collapsed @endif" href="{{route('category')}}">
          <i class="bi bi-folder"></i>
          <span>Category</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'blog') collapsed @endif" href="{{route('blog')}}">
          <i class="bi bi-journal"></i>
          <span>Blog</span>
        </a>
      </li>
      @if(Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'page') collapsed @endif" href="{{route('page')}}">
          <i class="bi bi-journal"></i>
          <span>Page</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'bookings') collapsed @endif" href="{{route('bookings-form')}}">
          <i class="bi bi-journal"></i>
          <span>Bookings</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'image-gallery') collapsed @endif" href="{{route('gallery_back')}}">
          <i class="bi bi-journal"></i>
          <span>Image Gallery</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'teams') collapsed @endif" href="{{route('team_back')}}">
          <i class="bi bi-journal"></i>
          <span>Teams</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'testimonials') collapsed @endif" href="{{route('testimonial')}}">
          <i class="bi bi-journal"></i>
          <span>Testimonials</span>
        </a>
      </li>
      @endif


      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Home Page</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>About</span>
            </a>
          </li>
          
          
        </ul>
      </li><!-- End Forms Nav -->

      
      


    </ul>

  </aside>