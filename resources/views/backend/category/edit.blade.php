@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Category</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Edit Category</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Category</h5>

              <!-- Vertical Form -->
              @include('layouts._alert')
              <form class="row g-3" method="post" action="">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input type="text" class="form-control" value="{{ $getRecord['name'] }}" name="name" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Title</label>
                  <input type="text" class="form-control" value="{{ $getRecord['title'] }}" name="title" id="inputEmail4">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $getRecord['meta_title'] }}" name="meta_title" id="inputEmail4">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Description</label>
                    <textarea class="form-control" name="meta_description" cols="30" rows="10">{{ $getRecord['meta_description'] }}</textarea>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Keyword</label>
                    <input type="text" class="form-control" value="{{ $getRecord['meta_keyword'] }}" name="meta_keyword" id="inputEmail4">
                </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ ($getRecord['status'] == 1) ? 'selected': ''}}>Active</option>
                        <option value="0" {{ ($getRecord['status'] == 0) ? 'selected': ''}}>Unactive</option>
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