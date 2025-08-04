<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        // Hapus ->unique() dari sini juga
        $name = $this->faker->word();

        return [
            'name' => ucfirst($name),
            // Jamin keunikan dengan menambahkan ID unik pada slug
            'slug' => Str::slug($name) . '-' . uniqid(),
        ];
    }
}