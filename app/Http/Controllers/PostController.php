<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['user', 'categories', 'tags'])->firstOrFail();
        
        // Increment view count
        $post->incrementViews();

        // Get latest posts excluding current post
        $recentPosts = Post::where('id', '!=', $post->id)
            ->with(['user', 'categories'])
            ->latest()
            ->take(5)
            ->get();

        // Get related posts based on categories
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->whereHas('categories', function ($query) use ($post) {
                $query->whereIn('categories.id', $post->categories->pluck('id'));
            })
            ->with(['user', 'categories'])
            ->inRandomOrder()
            ->take(3)
            ->get();
        
        // Return All Tags To Be Displayed in the  Single Post Page
        $tags = Tag::all();

        // dd($tags); // Debugging line to check tags
        
        return view('pages.posts.index', compact('post', 'recentPosts', 'relatedPosts', 'tags'));
    }
}
