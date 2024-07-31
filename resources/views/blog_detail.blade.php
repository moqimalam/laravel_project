@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
          <h3 class="display-3 font-weight-bold text-white">Blog Detail</h3>
          <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Blog Detail</p>
          </div>
        </div>
      </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8">
            <div class="d-flex flex-column text-left mb-3">
              
              <h1 class="mb-3">{{ $getRecord->title}}</h1>
              <div class="d-flex">
                <p class="mr-3"><i class="fa fa-user text-primary"></i> {{ $getRecord->user_name}}</p>
                <p class="mr-3">
                  <i class="fa fa-folder text-primary"></i> {{ $getRecord->category_name}}
                </p>
                <p class="mr-3"><i class="fa fa-comments text-primary"></i> {{ $getRecord->getCommentCount() }}</p>
              </div>
            </div>
            <div class="mb-5">
              @if(!empty($getRecord->getImage()))
              <img class="img-fluid rounded w-100 mb-4" src="{{ $getRecord->getImage() }}" alt="Image">
              @endif
              
                {!! $getRecord->description !!}
              
            
            </div>
  
            <!-- Related Post -->
            @if(!empty($getRelatedPost->count()))
            <div class="mb-5 mx-n3">
              <h2 class="mb-4 ml-3">Related Post</h2>
              

              <div class="owl-carousel post-carousel position-relative">
                @foreach ($getRelatedPost as $relPost)
                <div
                  class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3"
                >
                  <img
                    class="img-fluid"
                    src="{{ $relPost->getImage() }}"
                    style="width: 80px; height: 80px"
                  />
                  <div class="pl-3">
                    <a class="text-decoration-none;" href="{{ url($relPost->slug)  }}">
                    <h5 class="">{{ $relPost->title }}</h5>
                    </a>
                    <div class="d-flex">
                      <small class="mr-3"><i class="fa fa-user text-primary"></i> {{ $relPost->user_name }}</small>
                      <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $relPost->category_name }}</small>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
            </div>
            @endif
            <!-- Comment List -->
            <div class="mb-5">
              @if(!empty($getRecord->getComment) && $getRecord->getComment->count() > 0)
              <h2 class="mb-4">{{ $getRecord->getComment->count() }} Comments</h2>
              @endif
              @foreach($getRecord->getComment as $comment)
              <div class="media mb-4">
                <div class="media-body">
                  <h6>
                    {{ $comment->user->name}} <small><i>{{ date('d M Y', strtotime($comment->created_at))}} at {{ date('h:i A', strtotime($comment->created_at))}}</i></small>
                  </h6>
                  <p>
                    {{ $comment->comment}}
                  </p>
                  <button class="btn btn-sm btn-light replyOnly" id="{{ $comment->id }}">Reply</button>
                  @foreach($comment->getReply as $reply)
                  <div class="media mb-4 ml-5">
                    <div class="media-body">
                      <h6>
                        {{ $reply->user->name}} <small><i>{{ date('d M Y', strtotime($reply->created_at))}} at {{ date('h:i A', strtotime($reply->created_at))}}</i></small>
                      </h6>
                      <p>
                        {{ $reply->comment}}
                      </p>
                      <button class="btn btn-sm btn-light replyOnly" id="{{ $comment->id }}">Reply</button>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              
              <div class="bg-light ml-3 p-3 showReply{{ $comment->id }}" style="display:none">
                <h2 class="mb-2">Reply a comment</h2>
                <form method="post" action="{{ route('home-comment-reply-section')}}">
                  @csrf
                  <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                  <div class="form-group">
                    <label for="message">Comment *</label>
                    <textarea name="comment" cols="30" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="form-group mb-0">
                    <input type="submit" value="Leave a Reply" class="btn btn-primary px-3">
                  </div>
                </form>
              </div>

              @endforeach
              
            </div>
  
            <!-- Comment Form -->
            <div class="bg-light p-5">
              <h2 class="mb-4">Leave a comment</h2>
              <form method="post" action="{{ route('home-comment-section')}}">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $getRecord->id}}">
                <div class="form-group">
                  <label for="message">Comment *</label>
                  <textarea name="comment" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group mb-0">
                  <input type="submit" value="Leave Comment" class="btn btn-primary px-3">
                </div>
              </form>
            </div>
          </div>
  
          <div class="col-lg-4 mt-5 mt-lg-0">
            <!-- Author Bio -->
            <!-- <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
              <img src="img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px">
              <h3 class="text-secondary mb-3">John Doe</h3>
              <p class="text-white m-0">
                Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                ipsum ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr
                ea sit.
              </p>
            </div> -->
  
            <!-- Search Form -->
            <div class="mb-5">
              <form action="{{ url('blog') }}" method="get">
                <div class="input-group">
                  <input name="q" type="text" required class="form-control form-control-lg" placeholder="Keyword">
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
  
            <!-- Category List -->
            <div class="mb-5">
              <h2 class="mb-4">Categories</h2>
              <ul class="list-group list-group-flush">
                @foreach($getCategory as $cats)
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  <a href="{{ url('category/'.$cats->slug) }}">{{ $cats->name }}</a>
                  <span class="badge badge-primary badge-pill">{{ $cats->totalBlog() }}</span>
                </li>
                @endforeach
              </ul>
            </div>
  
           
            <!-- Recent Post -->
            <div class="mb-5">
              <h2 class="mb-4">Recent Post</h2>
              @foreach($getRecentPost as $rpost)
              <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                @if(!empty($rpost->getImage()))
                <img class="img-fluid pl-2" style="width:80px; height:57px;object-fit: cover" src="{{ $rpost-> getImage() }}" style="width: 80px; height: 80px">
                @endif
                <div class="p-2">
                    <a class="text-decoration-none; text-dark" href="{{ url($rpost->slug)  }}">
                  <h5 class="text-decoration-none; p-2">{{ $rpost->title }}</h5>
                    </a>
                  <div class="d-flex">
                    <small class="mr-3"><i class="fa fa-user text-primary"></i> {{ $rpost->user_name }}</small>
                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $rpost->category_name }}</small>
                    
                  </div>
                </div>
              </div>
              @endforeach
            </div>
  
           
  
            <!-- Tag Cloud -->
            @if(!empty($getRecord->getTag->count()))
            <div class="mb-5">
              <h2 class="mb-4">Tag Cloud</h2>
              <div class="d-flex flex-wrap m-n1">
                @foreach($getRecord->getTag as $tag)
                <a href="{{ url('blog?q='.$tag->name) }}" class="btn btn-outline-primary m-1">{{ $tag->name }}</a>
                @endforeach
              </div>
            </div>
            @endif
            
  
            
          </div>
        </div>
      </div>
    <!-- About End -->

    
@endsection
@section('scripts')
        <script>
          $('.replyOnly').click(function(){
            var id = $(this).attr('id');
            $('.showReply'+id).toggle();
          });
        </script>
@endsection

    
