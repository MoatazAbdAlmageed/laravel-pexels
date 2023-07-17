<?php

namespace Jpereira\Pexels\Services;

use Jpereira\Pexels\Models\Photo;
use Jpereira\Pexels\Enums\ModelTypes;


class PhotoClientService extends ClientHttpService
{
    
    public function search($query, $page = 1, $perPage = 15, $orientation=null, $size=null, $color=null, $locale=null)
    {
        $uri = "search?query={$query}&page={$page}&per_page={$perPage}";
        
        if(!is_null($orientation))
            $uri .= '&orientation='.$orientation;
        if(!is_null($size))
            $uri .= '&size='.$size;
        if(!is_null($color))
            $uri .= '&color='.$color;
        if(!is_null($locale))
            $uri .= '&locale='.$locale;
            
        $response = $this->client($uri, ModelTypes::PHOTO);
        
        return $this->getData($response);
    }
    
    public function curated($page = 1, $perPage = 15)
    {
        $uri = "curated?page={$page}&per_page={$perPage}";
        $response = $this->client($uri, ModelTypes::PHOTO);

        return $this->getData($response);
    }

    
    public function detail($id)
    {
        $uri = 'photos/'.$id;
        $response = $this->client($uri, ModelTypes::PHOTO);        
        return Photo::fromArray($response);
    }

    public function getRandomImage($query, $size="large")
    {
        $uri = "search?query={$query}&page=1&per_page=1";
        $response = $this->client($uri, ModelTypes::PHOTO);
        $total_results = $response['total_results'];

        $r_uri = 'search?page='.rand(1,$total_results).'&per_page=1&query='.$query;
        $r_photo = $this->client($r_uri, ModelTypes::PHOTO);

        if(count($r_photo['photos']) > 0)
        {
            $photo = Photo::fromArray($r_photo['photos'][0]);
            return $photo->sizes->{$size};
        }
        return "";
    }


    private function getData($response)
    {
        return [
            'total_results' => $response['total_results'],
            'page' => $response['page'],
            'per_page' => $response['per_page'],
            'photos' => array_map(function ($photo){
                return Photo::fromArray($photo);
            }, $response['photos'])
        ];
    }
    
}
