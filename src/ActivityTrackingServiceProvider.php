<?php


namespace ElfR\ActivityTrack;


use ElfR\ActivityTrack\Traits\EventMap;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

/**
 * Class ActivityTrackingServiceProvider
 *
 * @package Microfin\ActivityTracking
 */
class ActivityTrackingServiceProvider extends ServiceProvider
{
    use EventMap;

    public function boot()
    {
        $this->registerEvents();

        $this->publishConfig();

        $this->publishMigrations();

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
     * Register the Horizon job events.
     *
     * @return void
     */
    protected function registerEvents()
    {
        $events = $this->app->make(Dispatcher::class);

        foreach ($this->events as $event => $listeners) {
            foreach ($listeners as $listener) {
                $events->listen($event, $listener);
            }
        }
    }

    /**
     *
     */
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/activity-track.php' => config_path('activity-track.php'),
        ]);
    }

    /**
     *
     */
    protected function publishMigrations()
    {
        $filesystem = app(Filesystem::class);

        $this->publishes([
            __DIR__.'/../database/migrations/create_activity_tracks_table.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');
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