@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Gallery Image</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Edit Gallery Image</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit New Image</h5>

              <!-- Vertical Form -->
              @include('layouts._alert')
              <form class="row g-3" method="post" action="" enctype="multipart/form-data" >
                @csrf
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Title</label>
                  <input type="text" class="form-control" value="{{ $getRecord->title }}" name="title" id="inputEmail4">
                </div>
                
                <div class="col-12">
                    <label for="inputEmail4" class="form-label"> Gallery Image</label>
                    <input type="file" class="form-control" name="gallery_image">
                </div>
                @if(!empty($getRecord->getImage()))
                    <img style="width:130px" class="mt-3" src="{{ $getRecord->getImage() }}" alt="{{ $getRecord->title }}">
                @endif

                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Image Category</label>
                  <select name="class" class="form-control">
                      <option {{ ($getRecord['class'] == "all") ? 'selected': ''}} value="all">All</option>
                      <option {{ ($getRecord['class'] == "playing") ? 'selected': ''}} value="playing">Playing</option>
                      <option {{ ($getRecord['class'] == "drawing") ? 'selected': ''}} value="drawing">Drawing</option>
                      <option {{ ($getRecord['class'] == "reading") ? 'selected': ''}} value="reading">Reading</option>
                  </select>
              </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option {{ ($getRecord['status'] == "1") ? 'selected': ''}} value="1">Active</option>
                        <option {{ ($getRecord['status'] == "0") ? 'selected': ''}} value="0">Unactive</option>
                    </select>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                  
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        
    </div>
    </div>
    </section>


  @endsection