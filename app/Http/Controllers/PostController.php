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
            'image'       => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('thumbnail', $file_name);

        Post::create([
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'slug'          => \Str::slug($request->title),
            'category_id'   => $request->category_id,
            'image'         => $image,
            'description'   => $request->description,
        ]);

        return redirect()->route('post.create');
    }
}
