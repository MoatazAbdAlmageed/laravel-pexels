<?php

namespace Jpereira\Pexels;

use Jpereira\Pexels\Services\PhotoClientService;
use Jpereira\Pexels\Services\VideoClientService;

class Pexels implements PexelsInterface
{

    public $photoClient;
    public $videoClient;

     
    public function __construct()
    {
        $this->photoClient = new PhotoClientService();
        $this->videoClient = new VideoClientService();
    }
    
    public function image_search($query, $page = 1, $perPage = 15, $orientation=null, $size=null, $color=null, $locale=null)
    {
        return $this->photoClient->search($query, $page, $perPage, $orientation, $size, $color, $locale);
    }

    public function image_curated($page = 1, $perPage = 15)
    {
        return $this->photoClient->curated($page, $perPage);
    }

    public function image_detail($id)
    {
        return $this->photoClient->detail($id);
    }

    public function getRandomImage($query, $size="large")
    {
        return $this->photoClient->getRandomImage($query, $size);
    }

    public function video_search($query, $page = 1, $perPage = 15, $orientation=null, $size=null, $locale=null)
    {
        return $this->videoClient->search($query, $page, $perPage, $orientation, $size, $locale);
    }

    public function popular_videos($page = 1, $perPage = 15)
    {
        return $this->videoClient->popular_videos($page, $perPage);
    }

    public function video_detail($id)
    {
        return $this->videoClient->detail($id);
    }

    public function getRandomVideo($query, $orientation ="landscape", $size="small")
    {
        return $this->videoClient->getRandomVideo($query, $orientation, $size);
    }

}