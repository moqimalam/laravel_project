@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Gallery Image</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Add Gallery Image</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Image</h5>

              <!-- Vertical Form -->
              @include('layouts._alert')
              <form class="row g-3" method="post" action="" enctype="multipart/form-data" >
                @csrf
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Title</label>
                  <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="inputEmail4">
                </div>
                
                <div class="col-12">
                    <label for="inputEmail4" class="form-label"> Gallery Image</label>
                    <input type="file" class="form-control" name="gallery_image">
                </div>

                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Image Category</label>
                  <select name="class" class="form-control">
                      <option value="all">All</option>
                      <option value="playing">Playing</option>
                      <option value="drawing">Drawing</option>
                      <option value="reading">Reading</option>
                  </select>
              </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Unactive</option>
                    </select>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        
    </div>
    </div>
    </section>


  @endsection