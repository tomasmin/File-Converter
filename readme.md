# Audio/Video Converter

Demonstrational application built using Laravel and FFmpeg frameworks. Conversion capabilities are limited as the app was built for learning purposes only.

## Getting Started


### Prerequisites

The machine should have PHP installed.

### Installing

To get the project running

```
composer install
php artisan key:generate
```

For conversions to work download FFmpeg build from https://ffmpeg.zeranoe.com/builds/ and place it in the same directory as specified in AudioController.php and VideoController.php

```
'ffmpeg.binaries'  => 'C:/ffmpeg/bin/ffmpeg.exe',
'ffprobe.binaries' => 'C:/ffmpeg/bin/ffprobe.exe',
```

## Built With

* [Laravel](https://laravel.com/docs/6.0) - The web framework used
* [FFmpeg](https://ffmpeg.org/) - Multimedia framework
