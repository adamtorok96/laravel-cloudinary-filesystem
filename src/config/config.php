<?php

return [
    /**
     * Cloudinary cloud name
     */
    'cloud_name' => env('CLOUDINARY_CLOUD'),

    /**
     * Api key
     */
    'api_key' => env('CLOUDINARY_API_KEY'),

    /**
     * Api secret
     */
    'api_secret' => env('CLOUDINARY_API_SECRET'),

    /**
     * Set this to true if you want to overwrite existing files using $filesystem->write();
     */
    'overwrite' => env('CLOUDINARY_OVERWRITE', true)
];