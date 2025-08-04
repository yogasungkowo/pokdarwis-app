<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Generator as FakerGenerator;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FakerGenerator::class, function () {
            $faker = \Faker\Factory::create('id_ID'); // Menggunakan lokal Indonesia
            $faker->addProvider(new FakerPicsumImagesProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::defaultView('vendor.pagination.custom');
        
        // Share categories with navbar component
        \Illuminate\Support\Facades\View::composer('components.navbar', function ($view) {
            $view->with('categories', \App\Models\Category::withCount('posts')->get());
        });
    }
}
