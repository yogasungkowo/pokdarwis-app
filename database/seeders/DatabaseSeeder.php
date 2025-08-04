<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Prayoga Sungkowo',
            'email' => 'prayogasungkowo12@gmail.com',
            'password' => bcrypt('Brimob12!'),
        ]);

        echo "Seeding Categories...\n";
        Category::factory(15)->create();

        echo "Seeding Tags...\n";
        Tag::factory(30)->create(); 
        
        echo "Seeding Post...\n";
        Post::factory(50)->create();
        
    }
}
