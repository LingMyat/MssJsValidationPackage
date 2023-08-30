<?php
namespace Lingmyat\MssJsValidation;

use Illuminate\Support\ServiceProvider;
use Lingmyat\MssJsValidation\Services\MssJsValidationContainer;

class MssJsValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind('mssValidation',function(){
            return new MssJsValidationContainer();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/validation.php');
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/mss-js-validation'),
        ], 'mss-js-validation');
    }
}
