<?php

namespace joaquinpereira\Pexels\Models;

use Illuminate\Support\Arr;

class PhotoSize
{
    public ?string $original;
    public ?string $large2x;
    public ?string $large;
    public ?string $medium;
    public ?string $small;
    public ?string $tiny;
    public ?string $portrait;
    public ?string $landscape;

    /**
     * PhotoSrc construct
     * @param string|null $original The image without any size changes. It will be the same as the width and height attributes.
     * @param string|null $large2x The image resized W 940px X H 650px DPR 2.
     * @param string|null $large The image resized to W 940px X H 650px DPR 1.
     * @param string|null $medium The image scaled proportionally so that it's new height is 350px
     * @param string|null $small The image scaled proportionally so that it's new height is 130px.
     * @param string|null $tiny The image cropped to W 280px X H 200px.
     * @param string|null $portrait The image cropped to W 800px X H 1200px
     * @param string|null $landscape The image cropped to W 1200px X H 627px.
     */
    public function __construct(
        ?string $original,
        ?string $large2x,
        ?string $large,
        ?string $medium,
        ?string $small,
        ?string $tiny,
        ?string $portrait,
        ?string $landscape
    ) {
        $this->original = $original;
        $this->large2x = $large2x;
        $this->large = $large;
        $this->medium = $medium;
        $this->small = $small;
        $this->tiny = $tiny;
        $this->portrait = $portrait;
        $this->landscape = $landscape;
    }

    /**
     * Return PhotoSize instance from array
     * @param $array
     * @return PhotoSize
     */
    public static function fromArray($array){
        return new self(
            Arr::get($array,'original'),
            Arr::get($array,'large2x'),
            Arr::get($array,'large'),
            Arr::get($array,'medium'),
            Arr::get($array,'small'),
            Arr::get($array,'tiny'),
            Arr::get($array,'portrait'),
            Arr::get($array,'landscape'),
        );
    }
}
