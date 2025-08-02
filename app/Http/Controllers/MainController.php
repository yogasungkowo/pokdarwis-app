<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['user', 'categories'])->get();
        $popularPosts = Post::orderBy('views', 'desc')
                           ->with(['user', 'categories'])
                           ->take(1)
                           ->get();
        return view('pages.main.index', compact('posts', 'popularPosts'));
    }
}

