<?php

namespace joaquinpereira\Pexels\Models;

use Illuminate\Support\Arr;

class Photo
{
    public int $id;
    public int  $width;
    public int $height;
    public string $url;
    public ?string $photographer;
    public ?string $photographerUrl;
    public ?int $photographerId;
    public string $avgColor;
    public PhotoSize $sizes;
    public string $alt;

    /**
     * Photo constructor
     * @param int $id 
     * @param int $width The real width of the photo in pixels.
     * @param int $height The real height of the photo in pixels
     * @param string $url The Pexels URL where the photo is located.
     * @param string|null $photographer The name of the photographer who took the photo.
     * @param string|null $photographerUrl The URL of the photographer's Pexels profile.
     * @param int|null $photographerId The id of the photographer.
     * @param string $avgColor The average color of the photo. Useful for a placeholder while the image loads.
     * @param PhotoSize $sizes An assortment of different image sizes that can be used to display this Photo.
     * @param string $alt Text description of the photo for use in the alt attribute.
     */
    public function __construct(
        int $id,
        int $width,
        int $height,
        string $url,
        ?string $photographer,
        ?string $photographerUrl,
        ?int $photographerId,
        string $avgColor,
        array $sizes,
        string $alt
    ) {
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
        $this->url = $url;
        $this->photographer = $photographer;
        $this->photographerUrl = $photographerUrl;
        $this->photographerId = $photographerId;
        $this->avgColor = $avgColor;
        $this->sizes = PhotoSize::fromArray($sizes);
        $this->alt = $alt;
    }

    /**
     * Return Photo instance from array
     * @param $array
     * @return Photo
     */
    public static function fromArray($array){
        return new self(
            Arr::get($array,'id'),
            Arr::get($array,'width'),
            Arr::get($array,'height'),
            Arr::get($array,'url'),
            Arr::get($array,'photographer'),
            Arr::get($array,'photographer_url'),
            Arr::get($array,'photographer_id'),
            Arr::get($array,'avg_color'),
            Arr::get($array,'src'),
            Arr::get($array,'alt'),
        );
    }
}
