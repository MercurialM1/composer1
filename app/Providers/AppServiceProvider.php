<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Slide;

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

        View::composer('components.nonUnique.movebanner', function ($view) {
            $slides = Slide::where('is_active', true)
                ->orderBy('order')
                ->get();
            $view->with('slides', $slides);
        });
    }
}
