<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Asset versioning directive
        Blade::directive('version', function ($path) {
            return "<?php echo config('assets.version') ? asset({$path}) . '?v=' . config('assets.version') : asset({$path}); ?>";
        });
    }
}
