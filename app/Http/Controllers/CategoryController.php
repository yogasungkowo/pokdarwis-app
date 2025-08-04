<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Get admin user for author widget
        $user = User::all()->first();

        // Get all categories with post count
        $categories = Category::withCount('posts')
            ->get();

        // Get paginated posts for each category
        foreach ($categories as $category) {
            $category->paginatedPosts = Post::whereHas('categories', function($query) use ($category) {
                    $query->where('categories.id', $category->id);
                })
                ->with(['user', 'categories', 'tags'])
                ->latest()
                ->paginate(6)
                ->withPath(route('category.show', $category->slug))
                ->withQueryString();
        }

        $popularPosts = Post::orderBy('views', 'desc')
            ->with(['user', 'categories'])
            ->take(5)
            ->get();

        $tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(15)
            ->get();

        return view('pages.category.index', compact('categories', 'popularPosts', 'tags', 'user'));

        $popularPosts = Post::orderBy('views', 'desc')
            ->with(['user', 'categories'])
            ->take(5)
            ->get();

        $tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(15)
            ->get();

        return view('pages.category.index', compact('categories', 'popularPosts', 'tags'));

        $popularPosts = Post::orderBy('views', 'desc')
            ->with(['user', 'categories'])
            ->take(5)
            ->get();

        $tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(15)
            ->get();

        return view('pages.category.index', compact('categories', 'popularPosts', 'tags', 'user'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->withCount('posts')
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

        return view('pages.category.show', compact('category', 'categories', 'popularPosts', 'tags'));
    }
}
