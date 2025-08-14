<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('doctor', function () {
            return "<?php if(auth()->check() && auth()->user()->role == 1): ?>";
        });

        Blade::directive('enddoctor', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('patient', function () {
            return "<?php if(auth()->check() && auth()->user()->role == 0): ?>";
        });

        Blade::directive('endpatient', function () {
            return "<?php endif; ?>";
        });
    }
}
