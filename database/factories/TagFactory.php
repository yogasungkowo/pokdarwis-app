<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/TagFactory.php

    public function definition(): array
    {
        $name = $this->faker->colorName() . ' ' . $this->faker->randomNumber(4, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name), 
            'description' => $this->faker->sentence(),
            'created_by' => 1,
        ];
    }
}
