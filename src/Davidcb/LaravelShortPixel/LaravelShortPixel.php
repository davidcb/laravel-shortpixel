<?php

namespace Davidcb\LaravelShortPixel;

use ShortPixel;

class LaravelShortPixel {

    protected $file;

    protected $customizeableConfigs = [
        'convertto',
        'keep_exif'
    ];

    public function __construct()
    {
        ShortPixel\setKey(config('shortpixel.api_key'));

        foreach($this->customizeableConfigs as $config) {
            if($value = config('shortpixel.' . $config)) {
                ShortPixel\ShortPixel::setOptions(array($config => $value));
            }
        }
    }

    public function fromUrls($url, $path = null, $filename = null, $level = null, $width = null, $height = null, $max = false)
    {
        if (!$path) {
            $path = config('shortpixel.default_path');
        }

        $this->file = ShortPixel\fromUrls($url);
        return $this->save($path, $filename, $level, $width, $height, $max);
    }

    public function fromFiles($url, $path = null, $level = null, $width = null, $height = null, $max = false)
    {
        if (!$path) {
            $path = config('shortpixel.default_path');
        }

        if (is_array($url)) {
            $this->file = ShortPixel\fromFiles($url);
        } else {
            $this->file = ShortPixel\fromFiles($url);
        }

        return $this->save($path, null, $level, $width, $height, $max);
    }

    public function fromFolder($folder, $path = null, $level = null, $width = null, $height = null, $max = false)
    {
        \ShortPixel\ShortPixel::setOptions(array("persist_type" => "text"));

        if (!$path) {
            $path = config('shortpixel.default_path');
        }

        $this->file = ShortPixel\fromFolder($folder)->wait(300);
        return $this->save($path, null, $level, $width, $height, $max);
    }

    private function optimize($level = null)
    {
        if (!$level) {
            $level = config('shortpixel.compression_level');
        }

        return $this->file->optimize($level);
    }

    private function resize($width, $height, $max = false)
    {
        return $this->file->resize($width, $height, $max);
    }

    private function save($path, $filename = null, $level = null, $width = null, $height = null, $max = false)
    {
        $this->optimize($level);

        if ($width && $height) {
            $this->resize($width, $height, $max);
        }

        return $this->file->toFiles($path, $filename);
    }

}