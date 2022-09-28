<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id',$user_id)->get();

        return view('private.post.index', compact('posts'));
    }

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

        return redirect()->route('post');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('private.post.edit', compact('post','categories'));
    }

    public function update(Post $post, Request $request)
    {
        $this->validate($request,[
            'title'       => 'required',
            'category_id' => 'required',
            'image'       => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('thumbnail', $file_name);

        $post->update([
            'title'         => $request->title,
            'slug'          => \Str::slug($request->title),
            'category_id'   => $request->category_id,
            'image'         => $image,
            'description'   => $request->description,
        ]);

        return redirect()->route('post');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();

    }
}
