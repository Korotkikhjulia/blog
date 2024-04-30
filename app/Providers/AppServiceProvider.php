<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Category;

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
        view()->composer('admin.layouts.sidebar', function ($view){
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get());
            $view->with('cats', Category::withCount('posts')->orderBy('posts_count', 'desc')->get());
        });
    }
}
