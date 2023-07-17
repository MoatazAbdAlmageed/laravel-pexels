<?php

namespace Jpereira\Pexels\Services;

use Jpereira\Pexels\Enums\ModelTypes;
use Jpereira\Pexels\Models\Video;

class VideoClientService extends ClientHttpService
{
    
    public function search($query, $page = 1, $perPage = 15, $orientation=null, $size=null, $locale=null)
    {
        $uri = 'search?query='.$query.'&page='.$page.'&per_page='.$perPage;
        
        if(!is_null($orientation))
            $uri .= '&orientation='.$orientation;
        if(!is_null($size))
            $uri .= '&size='.$size;
        if(!is_null($locale))
            $uri .= '&locale='.$locale;
            
        $response = $this->client($uri, ModelTypes::VIDEO);
        
        return $this->getData($response);
    }
    
    public function popular_videos($page = 1, $perPage = 15)
    {
        $uri = 'popular?page='.$page.'&per_page='.$perPage;
        $response = $this->client($uri, ModelTypes::VIDEO);

        return $this->getData($response);
    }
    
    public function detail($id)
    {
        $uri = 'videos/'.$id;
        $response = $this->client($uri, ModelTypes::VIDEO);        
        return Video::fromArrayToObject($response);
    }

    public function getRandomVideo($query, $orientation=null, $size=null)
    {
        $uri = "search?query={$query}&page=1&per_page=1";
        $response = $this->client($uri, ModelTypes::VIDEO);
        $total_results = $response['total_results'];

        $r_uri = 'search?page='.rand(1,$total_results).'&per_page=1&query='.$query;
        $r_video = $this->client($r_uri, ModelTypes::VIDEO);
        if(count($r_video['videos']) > 0)
        {
            $video = Video::fromArrayToObject($r_video['videos'][0]);
            if(count($video->video_files) > 0)
                return $video->video_files[0]->link;
        }
        return "";
    }


    private function getData($response){
        return [
            'total_results' => $response['total_results'],
            'page' => $response['page'],
            'per_page' => $response['per_page'],
            'videos' => array_map(function ($video){
                return Video::fromArrayToObject($video);
            }, $response['videos'])
        ];
    }
    
}
