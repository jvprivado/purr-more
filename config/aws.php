<?php

return [
    's3_purr_image_folder' => 'images/',
    's3_purr_video_folder' => 'media-files/',
    's3_products_folder' => 'products/',
    's3_blogs_folder' => 'blogs/',
    's3_banners_folder' => 'banner/',
    's3_url_lifetime' => '+60 minutes',
    's3_bucket' => env('AWS_BUCKET'),
    's3_default_region' => env('AWS_DEFAULT_REGION'),
];