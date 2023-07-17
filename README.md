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
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```