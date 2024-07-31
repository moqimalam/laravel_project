@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
      <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
          <h4 class="text-white mb-4 mt-5 mt-lg-0">Welcome to Sunshine Montessori Academy!</h4>
          <h1 class="display-3 font-weight-bold text-white">
            Early Childhood Education
          </h1>
          <p class="text-white mb-4">
            Where young minds are nurtured with love, independence, and a passion for lifelong learning, fostering their growth into confident and creative individuals.
          </p>
          <a href="{{ route('about')}}" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <img class="img-fluid mt-5" src="{{ asset('front/img/header.png') }}" alt="" />
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
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
    <!-- Facilities Start -->

    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <img
              class="img-fluid rounded mb-5 mb-lg-0"
              src="{{ asset('front/img/about-1.jpg') }}"
              alt=""
            />
          </div>
          <div class="col-lg-7">
            <p class="section-title pr-5">
              <span class="pr-2">Learn About Us</span>
            </p>
            <h1 class="mb-4">Best School For Your Kids</h1>
            <p>
              At Sunshine Montessori Academy, we nurture the whole child and foster a lifelong love for learning. Our students thrive in a vibrant environment, participating in music programs, annual gatherings, movement sessions, and creative activities like setting up beautiful tables for shared meals.
            </p>
            <div class="row pt-2 pb-4">
              <div class="col-6 col-md-4">
                <img class="img-fluid rounded" src="{{ asset('front/img/about-2.jpg') }}" alt="" />
              </div>
              <div class="col-6 col-md-8">
                <ul class="list-inline m-0">
                  <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Established in 1987.
                  </li>
                  <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Safe outdoor play area.
                  </li>
                  <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Programs for infants, toddlers, and preschoolers
                  </li>
                </ul>
              </div>
            </div>
            <a href="{{ route('about') }}" class="btn btn-primary mt-2 py-2 px-4">About Us</a>
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
            <span class="px-2">Popular Classes</span>
          </p>
          <h1 class="mb-4">Classes for Your Kids</h1>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="{{ asset('front/img/class-1.jpg') }}" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Drawing Class</h4>
                <p class="card-text">
                  Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                  ipsum duo et no et, ipsum ipsum erat duo amet clita duo
                </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Age of Kids</strong>
                  </div>
                  <div class="col-6 py-1">3 - 6 Years</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Total Seats</strong>
                  </div>
                  <div class="col-6 py-1">40 Seats</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Class Time</strong>
                  </div>
                  <div class="col-6 py-1">08:00 - 10:00</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Tution Fee</strong>
                  </div>
                  <div class="col-6 py-1">$290 / Month</div>
                </div>
              </div>
              <a href="{{ route('contact') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="{{ asset('front/img/class-2.jpg') }}" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Language Learning</h4>
                <p class="card-text">
                  Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                  ipsum duo et no et, ipsum ipsum erat duo amet clita duo
                </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Age of Kids</strong>
                  </div>
                  <div class="col-6 py-1">3 - 6 Years</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Total Seats</strong>
                  </div>
                  <div class="col-6 py-1">40 Seats</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Class Time</strong>
                  </div>
                  <div class="col-6 py-1">08:00 - 10:00</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Tution Fee</strong>
                  </div>
                  <div class="col-6 py-1">$290 / Month</div>
                </div>
              </div>
              <a href="{{ route('contact') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="{{ asset('front/img/class-3.jpg') }}" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Basic Science</h4>
                <p class="card-text">
                  Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                  ipsum duo et no et, ipsum ipsum erat duo amet clita duo
                </p>
              </div>
              <div class="card-footer bg-transparent py-4 px-5">
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Age of Kids</strong>
                  </div>
                  <div class="col-6 py-1">3 - 6 Years</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Total Seats</strong>
                  </div>
                  <div class="col-6 py-1">40 Seats</div>
                </div>
                <div class="row border-bottom">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Class Time</strong>
                  </div>
                  <div class="col-6 py-1">08:00 - 10:00</div>
                </div>
                <div class="row">
                  <div class="col-6 py-1 text-right border-right">
                    <strong>Tution Fee</strong>
                  </div>
                  <div class="col-6 py-1">$290 / Month</div>
                </div>
              </div>
              <a href="{{ route('contact') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Class End -->

    <!-- Registration Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-5 mb-lg-0">
            <p class="section-title pr-5">
              <span class="pr-2">Book A Seat</span>
            </p>
            <h1 class="mb-4">Book A Seat For Your Kid</h1>
            <p>
              Ensure your child receives the best start at Sunshine Montessori Academy! Our programs fill up quickly, so don't miss the opportunity to secure a place for your little one in our nurturing and enriching environment. Enroll today and give your child the gift of a quality education that fosters growth, independence, and a love for learning.
            </p>
            <ul class="list-inline m-0">
              <li class="py-2">
                <i class="fa fa-check text-success mr-3"></i>Experienced and caring teachers
              </li>
              <li class="py-2">
                <i class="fa fa-check text-success mr-3"></i>Safe and engaging environment
              </li>
              <li class="py-2">
                <i class="fa fa-check text-success mr-3"></i>Holistic approach to learning
              </li>
            </ul>
           
          </div>
          <div class="col-lg-5">
            <div class="card border-0">
              <div class="card-header bg-secondary text-center p-4">
                <h1 class="text-white m-0">Book A Seat</h1>
              </div>
              <div class="card-body rounded-bottom bg-primary p-5">
                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @endif
                <form method="post" action="{{ route('bookings-form-store') }}" >
                  @csrf
                  <div class="form-group">
                    <input type="text" name="name" value="{{ old('name')}}" class="form-control border-0 p-4" placeholder="Your Name"  />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" value="{{ old('email')}}" class="form-control border-0 p-4" placeholder="Your Email" />
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" name="phone" value="{{ old('phone')}}" class="form-control border-0 p-4" placeholder="Your Phone Number" />
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div>
                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit" >
                      Book Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Registration End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
      <div class="container p-0">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Testimonial</span>
          </p>
          <h1 class="mb-4">What Parents Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
          @foreach($getRecordFront as $testimonial)
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              <p>{{ $testimonial->message }}</p>
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                src="{{ $testimonial->getImage() }}"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>{{ $testimonial->name }}</h5>
                <i>{{ $testimonial->profession }}</i>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    
@endsection
@section('scripts')
  <script>
      document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                alert("Success: {{ session('success') }}");
            @endif

            @if ($errors->any())
                let errorMessages = [];
                @foreach ($errors->all() as $error)
                    errorMessages.push("{{ $error }}");
                @endforeach
                if (errorMessages.length > 0) {
                    alert("Validation errors:\n" + errorMessages.join("\n"));
                }
            @endif
        });
  </script>
@endsection 

    
