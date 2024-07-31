@extends('backend.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Blogs</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Blog</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Blog (Total Blog: {{$getRecord->total() }})</h5>
                <p><strong>Filter Search</strong></p>
                <a href="{{ route('add-blog')}}" class="btn btn-primary" style="float: right;">Add New Blog</a>
                </div>
                @include('layouts._alert')
              <!-- Table with stripped rows -->
              <div class="container">
                
                <form action="" method="get">
                    <div class="row">
                        <div class="col-md-1-5 flex-fill" style="flex: 0 0 12.5%;!important">
                            <div class="form-group">
                                <label for="idInput" class="form-label">Id</label>
                                <input type="text" class="form-control" id="idInput" value="{{ Request::get('id') }}" name="id">
                            </div>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="userNameInput" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="userNameInput" value="{{ Request::get('user_name') }}" name="user_name">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="emailInput" class="form-label">Title</label>
                                <input type="text" class="form-control" id="emailInput" value="{{ Request::get('title') }}" name="title">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="phoneInput" class="form-label">Category</label>
                                <input type="text" class="form-control" id="phoneInput" value="{{ Request::get('category') }}" name="category">
                            </div>
                        </div>
                        <div class="col-md-1-5 flex-fill" style="flex: 0 0 12.5%;!important">
                            <div class="form-group">
                                <label for="addressInput" class="form-label">Publish</label>
                                <select name="is_publish" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ (Request::get('is_publish') == 1) ? 'selected': '' }} value="1">Yes</option>
                                    <option {{ (Request::get('is_publish') == 100) ? 'selected': '' }} value="100">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1-5 flex-fill" style="flex: 0 0 12.5%;!important">
                          <div class="form-group">
                              <label for="addressInput" class="form-label">Status</label>
                              <select name="status" class="form-control">
                                <option value="">Select</option>
                                <option {{ (Request::get('status') == 1) ? 'selected': '' }} value="1">Active</option>
                                <option {{ (Request::get('status') == 100) ? 'selected': '' }}  value="100">Inactive</option>
                            </select>
                            </div>
                      </div>

                        
                    </div>
                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="phoneInput" class="form-label">Start Date</label>
                                <input type="date" class="form-control" value="{{ Request::get('start_date') }}" name="start_date">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="phoneInput" class="form-label">End Date</label>
                                <input type="date" class="form-control" value="{{ Request::get('end_date') }}" name="end_date">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phoneInput" class="form-label d-block">&nbsp;</label>
                                <button type="submit" class="btn btn-info text-white">Search</button>
                                <a href="{{ route('blog') }}" class="btn btn-secondary text-white">Reset</a>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <hr><hr>
            
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    @if(Auth::user()->role == 'admin')
                    <th scope="col">User</th>
                    @endif
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                        <th scope="row">{{ $value->id}}</th>
                        @if(Auth::user()->role == 'admin')
                        <td>{{ $value->user_name}}</td>
                        @endif
                        <td>{{ $value->category_name}}</td>
                        <td>{{ Str::words($value->title, 10, '...')}}</td>
                        <td><img width="50" src="{{ $value->getImage() }}" alt="{{ $value->title}}"></td>
                        <td>{{ !empty($value->status) ? 'Active': 'Deactive' }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))  }}</td>
                        <td>
                            <a href="{{ route('edit-blog',$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('delete-blog',$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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