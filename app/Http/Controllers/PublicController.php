<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('public.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('public.post.show', compact('post'));
    }

    public function category(Category $category)
    {
        return view('public.category.show', compact('category'));
    }
}
