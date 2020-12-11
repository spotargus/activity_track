<?php


namespace ElfR\ActivityTrack;


use Illuminate\Support\ServiceProvider;

/**
 * Class ActivityTrackingServiceProvider
 *
 * @package Microfin\ActivityTracking
 */
class ActivityTrackingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/activity-track.php' => config_path('activity-track.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/activity-track.php',
            'activity-track'
        );

        parent::register();
    }

}