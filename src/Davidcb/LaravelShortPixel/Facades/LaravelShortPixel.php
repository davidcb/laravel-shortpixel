<?php

namespace Davidcb\LaravelShortPixel\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelShortPixel extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-shortpixel';
    }
    
}
