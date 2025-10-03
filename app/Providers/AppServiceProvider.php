<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NavLink;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Évite les erreurs artisan pendant les migrations/installs
        View::composer('*', function ($view) {
            static $links = null;

            if ($links === null) {
                // protégé si la table n’existe pas encore
                if (app()->runningInConsole() && !app()->environment('production')) {
                    // En console (migrations…), ne tente pas une requête si la table n’existe pas
                    $links = Schema::hasTable('nav_links')
                        ? NavLink::query()->where('is_active', true)->orderBy('position')->get()
                        : collect();
                } else {
                    $links = Schema::hasTable('nav_links')
                        ? NavLink::query()->where('is_active', true)->orderBy('position')->get()
                        : collect();
                }
            }

            $view->with('navLinks', $links);
        });
    }
}
