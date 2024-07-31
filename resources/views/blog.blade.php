@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
          <h3 class="display-3 font-weight-bold text-white">Our Blog</h3>
          <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Our Blog</p>
          </div>
        </div>
      </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container">
          <div class="text-center pb-2">
            
            <h1 class="mb-4">Latest Articles From Blog</h1>
          </div>
          <div class="row pb-3">
            
            @foreach($getRecord as $fblog)
            <div class="col-lg-4 mb-4">
              <div class="card border-0 shadow-sm mb-2">
                @if(!empty($fblog->getImage()))
                <img style="height:224px;object-fit:cover" class="card-img-top mb-2" src="{{ $fblog->getImage() }}" alt="{{ $fblog->title }}">
                @endif
                <div class="card-body bg-light text-center p-4">
                  <a class="text-decoration-none" href="{{ url($fblog->slug)  }}"><h4 >{{ $fblog->title }}</h4></a>
                  <div class="d-flex justify-content-center mb-3">
                    <small class="mr-3"><i class="fa fa-user text-primary"></i> 
                        <a class="text-decoration-none;text-dark" href="{{ url($fblog->slug)  }}">{{ $fblog->user_name }}</a>
                    
                    </small>
                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $fblog->category_name }}</small>
                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> {{ $fblog->getCommentCount() }}</small>
                  </div>
                  <p>
                    {!! strip_tags(Str::substr($fblog->description, 0, 150,)). '...' !!}
                  </p>
                  <a href="{{ url($fblog->slug)  }}" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                </div>
              </div>
            </div>
            @endforeach


          </div>
          <div class="row">
            <div class="col-md-12 text-center">
                {{ $getRecord->appends(request()->except('page'))->links() }}
            </div>
          </div>
        </div>
      </div>
    <!-- About End -->

    
@endsection
    

    
