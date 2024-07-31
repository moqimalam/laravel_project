@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Page</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Page</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Page Table data</h5>
                <a href="{{ route('add-page')}}" class="btn btn-primary" style="float: right;margin-top: -50px;">Add Page</a>
                
                @include('layouts._alert')
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Meta Title</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                        <th scope="row">{{ $value->id}}</th>
                        <td>{{ $value->title}}</td>
                        <td>{{ $value->slug}}</td>
                        <td>{{ $value->meta_title}}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))  }}</td>
                        <td>
                            <a href="{{ route('edit-page',$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            
                        </td>
                      </tr>
                    @empty
                    <tr>
                        <td colspan="100%">No Records Found</td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              
              
            </div>
          </div>
        
    </div>
    </div>
    </section>


  @endsection