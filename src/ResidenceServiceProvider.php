<?php

namespace KominfoHSS\Residence;

use Illuminate\Support\ServiceProvider;

/**
 * Class ResidenceServiceProvider
 * @package KominfoHSS\Residence
 */
class ResidenceServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/residence.php', 'residence'
        );

        $this->app->singleton('residence', function () {
            return $this->app->make(Residence::class);
        });
    }

    /**
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/residence.php' => config_path('residence.php'),
            ], 'residence');
        }
    }
}
