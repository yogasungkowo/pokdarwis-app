<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)
            ->with(['posts' => function($query) {
                $query->with(['user', 'categories', 'tags'])
                    ->latest();
            }])
            ->firstOrFail();

        $popularPosts = Post::orderBy('views', 'desc')
            ->with(['user', 'categories'])
            ->take(5)
            ->get();

        $categories = Category::withCount('posts')->get();
        $tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(15)
            ->get();

        return view('pages.tags.show', compact('tag', 'popularPosts', 'categories', 'tags'));
    }
}
