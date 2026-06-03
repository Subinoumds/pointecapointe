<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        try {
            if (\Schema::hasTable('contents')) {
                $contents = \App\Models\Content::select('key', 'content')->get()->pluck('content', 'key');
                \View::share('contents', $contents);
            } else {
                \View::share('contents', collect());
            }
        } catch (\Exception $e) {
            \View::share('contents', collect());
        }
    }
}
