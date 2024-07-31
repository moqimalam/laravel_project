@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
          <h3 class="display-3 font-weight-bold text-white">About Us</h3>
          <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="{{ route('home')}}">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">About Us</p>
          </div>
        </div>
      </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('front/img/about-1.jpg') }}" alt="">
            </div>
            <div class="col-lg-7">
              <p class="section-title pr-5">
                <span class="pr-2">Learn About Us</span>
              </p>
              <h1 class="mb-4">Welcome to Sunshine Montessori Academy!</h1>
              <p>
                At Sunshine Montessori Academy, we believe in nurturing the whole child and fostering a lifelong love for learning. Our students thrive in a rich, interactive environment, whether they are participating in our afternoon music program, engaging in the annual Thanksgiving Harvest Gathering, moving and grooving during afternoon movement sessions, or helping create a beautiful table setting to share a meal.
              </p>
              <h2>Highlights of Our School:</h2>
              <ul>
                <li>A team of dedicated, experienced staff certified in First Aid and CPR.</li>
                <li>Comprehensive programs for infants, toddlers, and preschoolers, starting from 6 weeks old.</li>
                <li>An exciting Summer Camp with diverse themes that engage and delight children.</li>
                <li>Licensed by the State of New Hampshire.</li>
                <li>Established in 1978, with a facility designed specifically for young children.</li>
                <li>A spacious, fenced-in area for safe outdoor play.</li>
                <li>Conveniently located off of Main Street in Keene, New Hampshire.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <!-- Facilities Start -->

    <!-- About Start -->
    <div class="container-fluid pt-5">
      <div class="container pb-3">
        <div class="row">
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Play Ground</h4>
                <p class="m-0">
                  A spacious and secure play area where children can explore, socialize, and develop their physical skills.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Music and Dance</h4>
                <p class="m-0">
                  Engaging music and dance sessions that encourage creativity, rhythm, and self-expression.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Arts and Crafts</h4>
                <p class="m-0">
                  Creative arts and crafts activities that inspire imagination and enhance fine motor skills.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Safe Transportation</h4>
                <p class="m-0">
                  Reliable and safe transportation services ensuring your child's comfort and security.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Healthy food</h4>
                <p class="m-0">
                  Nutritious and balanced meals prepared to support your child's growth and well-being.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Educational Tour</h4>
                <p class="m-0">
                  Exciting educational tours that broaden children's horizons and provide hands-on learning experiences.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Class Start -->
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
    <!-- Class End -->
@endsection
    

    
