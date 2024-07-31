@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Blog</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Add Blog</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Blog</h5>

              <!-- Vertical Form -->
              @include('layouts._alert')
              <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                @csrf

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Select Category</label>
                    <select name="category_id" class="form-control">
                        <option value="0">Select Category</option>
                        @foreach($getCategory as $cat)
                        <option {{ ($getRecord->category_id == $cat->id) ? 'selected': '' }} value="{{$cat->id}}">{{ $cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Title</label>
                  <input type="text" class="form-control" value="{{ $getRecord->title }}" name="title" id="inputEmail4">
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Featured Image</label>
                    <input type="file" class="form-control" name="image_file">
                    @if(!empty($getRecord->getImage()))
                        <img width="100" class="mt-3" src="{{ $getRecord->getImage() }}" alt="{{ $getRecord->title}}">
                    @endif
                    
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Description</label>
                    <textarea class="form-control tinymce-editor" name="description" cols="30" rows="10">{{ $getRecord->description }}</textarea>
                </div>

                <div class="col-12">
                    @php
                        $tag = '';
                        foreach($getRecord->getTag as $tagvalue) {
                            $tag .= $tagvalue->name . ',';
                        }
                        $tag = rtrim($tag, ','); // Remove the trailing comma
                    @endphp
                    
                    <label for="inputEmail4" class="form-label">Tags</label>
                    
                    <input type="text" class="form-control" value="{{ $tag }}" name="tag" id="tags">
                </div>


                <hr>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $getRecord->meta_title }}" name="meta_title" id="inputEmail4">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Description</label>
                    <textarea class="form-control" name="meta_description" cols="30" rows="10">{{ $getRecord->meta_description }}</textarea>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Meta Keyword</label>
                    <input type="text" class="form-control" value="{{ $getRecord->meta_keyword }}" name="meta_keyword" id="inputEmail4">
                </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Publish</label>
                    <select name="is_publish" class="form-control">
                        <option {{ ($getRecord->is_publish == 1) ? 'selected': '' }} value="1">Yes</option>
                        <option {{ ($getRecord->is_publish == 0) ? 'selected': '' }} value="0">No</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option {{ ($getRecord->status == 1) ? 'selected': '' }} value="1">Active</option>
                        <option {{ ($getRecord->status == 0) ? 'selected': '' }} value="0">Unactive</option>
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

  @section('scripts')
  <script>
    $("#tags").tagsinput();
  </script>
  @endsection