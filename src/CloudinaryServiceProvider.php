<?php

namespace AdamTorok96\LaravelCloudinaryFileSystem;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

use Enl\Flysystem\Cloudinary\ApiFacade as CloudinaryClient;
use Enl\Flysystem\Cloudinary\CloudinaryAdapter;

use League\Flysystem\Filesystem;

class CloudinaryServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('cloudinary.php'),
        ]);

        Storage::extend('cloudinary', function ($app) {
            $client = new CloudinaryClient($app['config']['cloudinary']);

            return new Filesystem(new CloudinaryAdapter($client));
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'cloudinary'
        );
    }
}