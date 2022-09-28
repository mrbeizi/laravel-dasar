@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="d-flex justify-content-between align-item-center">
            <a href="{{route('post.create')}}" class="btn btn-primary mb-2">Add New Post</a>
        </div>
        <div class="card">
            <div class="card-body">
                @forelse($posts as $post)
                <div class="d-flex justify-content-between align-item-center my-2">
                    <div class="d-flex align-item-center">
                        <img width="125px" height="75px" src="{{asset('storage/'.$post->image)}}" alt="default" style="object-fit: cover;">
                        <div class="ml-3">
                            <p>{{$post->title}}</p>
                            <p class="text-muted">{{$post->created_at}} &middot; {{$post->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{route('post.edit', $post->slug)}}" class="btn btn-success">Edit</a>
                        <form action="{{route('post.destroy', $post->slug)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to remove this data?')">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                    <div class="alert alert-danger mt-3 text-center" role="alert">You don't have any posts.</div>
                @endforelse
            </div>
        </div>
    </div>

@endsection