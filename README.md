# Laravel-Shortpixel
Laravel 5+ wrapper for ShortPixel API

- [Laravel-Shortpixel on Packagist](https://packagist.org/packages/davidcb/laravel-shortpixel)
- [Laravel-Shortpixel on GitHub](https://github.com/davidcb/laravel-shortpixel)


## Installation

Install via Composer:
```
composer require davidcb/laravel-shortpixel
```

If you're using Laravel >= 5.5, you can skip this as this package will be auto-discovered.
Add the service provider to `config/app.php`
```php
Davidcb\LaravelShortPixel\LaravelShortPixelServiceProvider::class,
```

You can register the facade in the `aliases` array in the `config/app.php` file
```php
'LaravelShortPixel' => Davidcb\LaravelShortPixel\Facades\Esendex::class,
```

Publish the config file
```
$ php artisan vendor:publish --provider="Davidcb\LaravelShortPixel\LaravelShortPixelServiceProvider"
```

Set your API key on your .env file
```
SHORT_PIXEL_API_KEY=secret
```

## Usage

You can find all the methods in the original [short-pixel-optimizer/shortpixel-php package](https://github.com/short-pixel-optimizer/shortpixel-php).

Examples:
```php
// From URL
$result = LaravelShortPixel::fromUrls('https://your.site/img/unoptimized.png', '/path/to/save/to'[, 'filename.png', $compression_level = 1, $width = 200, $height = 200, $maxDimension = true]);
```

```php
// From file
$result = LaravelShortPixel::fromFiles('/path/to/your/local/unoptimized.png', '/path/to/save/to'[, $compression_level = 1, $width = 200, $height = 200, $maxDimension = true]);
```

```php
// From files
$result = LaravelShortPixel::fromFiles(array('/path/to/your/local/unoptimized.png', '/path/to/your/local/unoptimized2.png'), '/path/to/save/to'[, $compression_level = 1, $width = 200, $height = 200, $maxDimension = true]);
```

```php
// From folder
$result = LaravelShortPixel::fromFolder('/path/to/your/local/folder', '/path/to/save/to'[, $compression_level = 1, $width = 200, $height = 200, $maxDimension = true]);
```

The compression_level, width, height and maxDimension are optional. Compression levels are 0 - loseless, 1 - lossy, 2- glossy. Default compression level for your images is set on the configuration file (lossy is set as default).
