# laravel-pexels

This is a package made for laravel, that connects to the pexels api and gets images or videos.

## Requirements

- PHP >= 7.2
- Account at https://www.pexels.com/ and obtain the api key

## Installation

```bash
composer require joaquinpereira/laravel-pexels
```

## Configuration

You must publish the config/pexel.php configuration file with the following command:

```bash
php artisan vendor:publish --provider="joaquinpereira\Pexels\Providers\PexelsServiceProvider" --tag="config"
```

In the .env file of the project you must add the following key PEXELS_API_KEY and place the value of your key provided by the pexels site

```bash
PEXELS_API_KEY="YOUR_PEXELS_API_KEY"
```

##
Examples of use:

```php
use joaquinpereira\Pexels\Facades\Pexels;

Route::get('/pexels', function () {
	
	//Images
    dump(Pexels::image_search('modern apartment'));
    dump(Pexels::image_search('modern apartment',20, 25));
    dump(Pexels::image_curated());
    dump(Pexels::image_curated(3,15));
    dump(Pexels::image_detail(17579690));
    dump(Pexels::getRandomImage('beach','landscape'));

	//videos
    dump(Pexels::video_search('android robot'));
    dump(Pexels::video_search('android robot', 3, 15));
    dump(Pexels::popular_videos());
    dump(Pexels::popular_videos(5,20));    
    dump(Pexels::getRandomVideo('dogs'));
    dump(Pexels::video_detail(15570408));
});
```