@extends('layouts.frontend')

@section('custom-style')
  <style>
    .move-vertical-animation{
      transition: 0.2s;
    }
    .move-vertical-animation:hover{
      transform: translateY(-10px);
    }
  </style>
@endsection

@section('content')

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm move-vertical-animation">
            <a href="{{route('post.show', $post->slug)}}">
              <img width="348px" height="225px" src="{{asset('storage/'. $post->image)}}" alt="" style="object-fit: cover;">
            </a>

            <div class="card-body">
              <p class="card-text">{{$post->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{$post->user_id}}</small>
                <small class="text-muted">{{$post->created_at->diffForHumans()}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach        
        
      </div>
    </div>
  </div>

</main>
    
@endsection