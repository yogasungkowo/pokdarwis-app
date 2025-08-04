<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['user', 'categories'])->get();
        $onePopularPosts = Post::orderBy('views', 'desc')
                           ->with(['user', 'categories'])
                           ->take(1)
                           ->get();
        $popularPosts = Post::orderBy('views', 'desc')
                            ->with(['user', 'categories'])
                            ->get();

        $categoriesWithPosts = Category::with(['posts' => function ($query) {
            $query->with('user')->latest()->take(15);
        }])
        ->orderBy('created_at', 'asc') 
        ->take(3) 
        ->get();
        
        return view('pages.main.index', compact(
            'posts', 
            'onePopularPosts', 
            'popularPosts', 
            'categoriesWithPosts' 
        ));
    }
}