@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
          <h3 class="display-3 font-weight-bold text-white">Our Teams</h3>
          <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Our Teams</p>
          </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container">
          <div class="text-center pb-2">
            <p class="section-title px-5">
              <span class="px-2">Our Teachers</span>
            </p>
            <h1 class="mb-4">Meet Our Teachers</h1>
          </div>
          <div class="row">
            @foreach($getRecordFront as $team)
            <div class="col-md-6 col-lg-4 text-center team mb-5">
              <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                <img class="img-fluid w-100" src="{{ $team->getImage() }}" alt="">
                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                  {{-- <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a> --}}
                  <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="{{ $team->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
              <h4>{{ $team->name }}</h4>
              <i>{{ $team->designation }}</i>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    <!-- Facilities Start -->

    
    
@endsection
    

    
