@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Page</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Add Page</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Page</h5>

              <!-- Vertical Form -->
              @include('layouts._alert')
              <form class="row g-3" method="post" action="">
                @csrf

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Slug</label>
                    <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" id="inputEmail4">
                  </div>
              
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Title</label>
                  <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="inputEmail4">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Description</label>
                    <textarea class="form-control tinymce-editor" name="description" cols="30" rows="5">{{ old('description') }}</textarea>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" value="{{ old('meta_title') }}" name="meta_title" id="inputEmail4">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Description</label>
                    <textarea class="form-control" name="meta_description" cols="30" rows="3">{{ old('meta_description') }}</textarea>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Keyword</label>
                    <input type="text" class="form-control" value="{{ old('meta_keyword') }}" name="meta_keyword" id="inputEmail4">
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