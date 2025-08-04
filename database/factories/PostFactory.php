<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage; // <-- Pastikan ini ada
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(5, 10));

        return [
            'title' => $title,
            'content' => $this->faker->paragraphs(5, true),
            'slug' => Str::slug($title) . '-' . uniqid(),

            'image' => $this->faker->imageUrl(1200, 800),

            'views' => $this->faker->numberBetween(100, 50000),
            'is_published' => $this->faker->boolean(90),
            'user_id' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $post->categories()->attach($categories);

            $tags = Tag::inRandomOrder()->take(rand(2, 5))->pluck('id');
            $post->tags()->attach($tags);
        });
    }
}