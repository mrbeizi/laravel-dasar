@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Edit Post - {{ $post->title}}</div>
            <div class="card-body">
                <form action="{{route('post.update', $post->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input name="image" type="file" id="image" class="form-control @error('image') is-invalid @enderror" value="{{$post->image}}">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{$post->description}}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection