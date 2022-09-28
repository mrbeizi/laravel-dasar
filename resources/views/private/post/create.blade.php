@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Create New Post</div>
            <div class="card-body">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="1">Laravel</option>
                            <option value="2">CSS</option>
                            <option value="3">HTML</option>
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input name="image" type="file" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror"></textarea>
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