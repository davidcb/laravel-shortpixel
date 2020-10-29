<?php

return [

    'api_key' => env('SHORT_PIXEL_API_KEY', null),

    'default_path' => storage_path(),

    'compression_level' => 1, // 0 - loseless, 1 - lossy, 2 - glossy

    "convertto" => "", // if '+webp' then also the WebP version will be generated

    "keep_exif" => 0, // 1 - EXIF is preserved, 0 - EXIF is removed

];
