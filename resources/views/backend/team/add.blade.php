@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Teams</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Add Team</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Team</h5>

              <!-- Vertical Form -->
              @include('layouts._alert')
              <form class="row g-3" method="post" action="" enctype="multipart/form-data" >
                @csrf
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Title</label>
                  <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="inputEmail4">
                </div>
                
                <div class="col-12">
                    <label for="inputEmail4" class="form-label"> Team Image</label>
                    <input type="file" class="form-control" name="team_image">
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Designation</label>
                    <input type="text" class="form-control" value="{{ old('designation') }}" name="designation" id="inputEmail4">
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Linkedin Link</label>
                    <input type="text" class="form-control" value="{{ old('linkedin') }}" name="linkedin">
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