<?php
namespace F0\LaravelMoodleClient;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelMoodleServiceProvider
 * @package F0\LaravelMoodleClient
 */
class LaravelMoodleClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/laravel-moodle-client.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('laravel-moodle-client.php');
        } else {
            $publishPath = base_path('config/laravel-moodle-client.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/laravel-moodle-client.php';
        $this->mergeConfigFrom($configPath, 'laravel-moodle-client');
    }
}
