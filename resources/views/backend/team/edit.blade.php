@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Teams</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Edit Team</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Team</h5>

              <!-- Vertical Form -->
              @include('layouts._alert')
              <form class="row g-3" method="post" action="" enctype="multipart/form-data" >
                @csrf
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Name</label>
                  <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name" id="inputEmail4">
                </div>
                
                <div class="col-12">
                    <label for="inputEmail4" class="form-label"> Team Image</label>
                    <input type="file" class="form-control" name="team_image">
                </div>
                @if(!empty($getRecord->getImage()))
                    <img style="width:130px" class="mt-3" src="{{ $getRecord->getImage() }}" alt="{{ $getRecord->name }}">
                @endif

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Designation</label>
                    <input type="text" class="form-control" value="{{ $getRecord->designation }}" name="designation" id="inputEmail4">
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Linkedin Link</label>
                    <input type="text" class="form-control" value="{{ $getRecord->linkedin }}" name="linkedin">
                </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option {{ ($getRecord['status'] == "1") ? 'selected': ''}} value="1">Active</option>
                        <option {{ ($getRecord['status'] == "0") ? 'selected': ''}} value="0">Unactive</option>
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