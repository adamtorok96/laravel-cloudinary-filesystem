<?php

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

        Storage::extend('cloudinary', function ($app, $config) {
            $client = new CloudinaryClient($config['cloudinary']);

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