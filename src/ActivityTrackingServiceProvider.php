<?php


namespace ElfR\ActivityTrack;


use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

/**
 * Class ActivityTrackingServiceProvider
 *
 * @package Microfin\ActivityTracking
 */
class ActivityTrackingServiceProvider extends ServiceProvider
{
    /**
     * @param Filesystem $filesystem
     */
    public function boot(Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__.'/../config/activity-track.php' => config_path('activity-track.php'),
        ]);

        $this->publishes([
            __DIR__.'/../database/migrations/create_activity_tracks_table.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');

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

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_activity_tracks_table.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_activity_tracks_table.php")
            ->first();
    }
}