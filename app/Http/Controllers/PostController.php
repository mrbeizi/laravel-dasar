<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('private.post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'       => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        Post::create([
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'slug'          => \Str::slug($request->title),
            'category_id'   => $request->category_id,
            'image'         => 'default-image',
            'description'   => $request->description,
        ]);
    }
}
