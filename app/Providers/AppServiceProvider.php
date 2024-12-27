<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/'; // Page d'accueil après connexion
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
         // Partager les données avec toutes les vues
         view()->share('articles', Article::all());
    }
}