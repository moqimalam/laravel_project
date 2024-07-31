@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Bookings</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Bookings</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bookings Table data</h5>
                @include('layouts._alert')
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Meta Title</th>
                    <th scope="col">Meta Description</th>
                    <th scope="col">Meta Keyword</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                        <th scope="row">{{ $value->id}}</th>
                        <td>{{ $value->name}}</td>
                        <td>{{ $value->title}}</td>
                        <td>{{ $value->meta_title}}</td>
                        <td>{{ $value->meta_description}}</td>
                        <td>{{ $value->meta_keyword}}</td>
                        
                        <td>{{ !empty($value->status) ? 'Active': 'Deactive' }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))  }}</td>
                        <td>
                            {{-- <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('delete-Bookings',$value->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
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
              {{-- pagination --}}
              {{ $getRecord->appends(request()->except('page'))->links() }}
              {{-- pagination --}}
              
            </div>
          </div>
        
    </div>
    </div>
    </section>


  @endsection