@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
          <h3 class="display-3 font-weight-bold text-white">Gallery</h3>
          <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Gallery</p>
          </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
          <div class="text-center pb-2">
            <p class="section-title px-5">
              <span class="px-2">Our Gallery</span>
            </p>
            <h1 class="mb-4">Our Kids School Gallery</h1>
          </div>
          <div class="row">
            <div class="col-12 text-center mb-2">
              <ul class="list-inline mb-4" id="portfolio-flters">
                <li class="btn btn-outline-primary m-1 active" data-filter="*">
                  All
                </li>
                <li class="btn btn-outline-primary m-1" data-filter=".playing">
                  Playing
                </li>
                <li class="btn btn-outline-primary m-1" data-filter=".drawing">
                  Drawing
                </li>
                <li class="btn btn-outline-primary m-1" data-filter=".reading">
                  Reading
                </li>
              </ul>
            </div>
          </div>
          <div class="row portfolio-container" style="position: relative; height: 588.98px;">
            @foreach($getRecordFront as $image)
            {{-- <div class="col-lg-4 col-md-6 mb-4 portfolio-item playing" style="position: absolute; left: 0px; top: 0px;"> --}}
            <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{ $image->class }}" style="position: absolute; left: 0px; top: 0px;">
              <div class="position-relative overflow-hidden mb-2">
                @if(!empty($image->getImage()))
                {{-- <img style="height:224px;object-fit:cover" class="card-img-top mb-2" src="{{ $image->getImage() }}" alt="{{ $image->title }}"> --}}
                <img class="img-fluid w-100" src="{{ $image->getImage() }}" alt="{{ $image->title }}">
                @endif
                <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                  <a href="{{ $image->getImage() }}" data-lightbox="portfolio">
                    <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    <!-- About End -->

    
@endsection
    

    
