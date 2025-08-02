<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // Add to user menu
            Filament::registerUserMenuItems([
                'back-to-site' => MenuItem::make()
                    ->label('Back to Website')
                    ->url('/')
                    ->icon('heroicon-o-home')
                    ->openUrlInNewTab(),
            ]);

            // Add to navigation bar
            Filament::registerNavigationItems([
                NavigationItem::make()
                    ->label('View Website')
                    ->icon('heroicon-o-globe-alt')
                    ->url('/')
                    ->openUrlInNewTab()
                    ->sort(100),
            ]);
        });
    }
}
