<?php

namespace joaquinpereira\Pexels\Models;

use Illuminate\Support\Arr;

/**
 * The Video resource is a JSON formatted version of a Pexels video. The video API endpoints respond to video data that is in this format.
 */
class Video
{
    public int $id;
    public int  $width;
    public int $height;
    public string $url;
    public string $image;
    public int $duration;
    public User $user;
    public array $video_files;
    public array $video_pictures;   


    /**
     * Video constructor
     * @param int $id The id of the video.
     * @param int $width The real width of the video in pixels.
     * @param int $height The real height of the video in pixels.
     * @param string $url The Pexels URL where the video is located.
     * @param string $image URL to a screenshot of the video.
     * @param int $duration The duration of the video in seconds.
     * @param User $user The videographer who shot the video.
     * @param VideoFile[] $video_files An array of different sized versions of the video.
     * @param VideoPicture[] $video_pictures An array of preview pictures of the video.
     */
    public function __construct($id, $width, $height, $url, $image, $duration, $user, $video_files, $video_pictures)
    {        
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
        $this->url = $url;
        $this->image = $image;
        $this->duration = $duration;
        $this->user = $user;
        $this->video_files = $video_files;
        $this->video_pictures = $video_pictures;
    }

    /**
     * Return Video instance from array
     * @param $array
     * @return Video
     */
    public static function fromArrayToObject($arrayVideo)
    {
        return new self(
            $arrayVideo['id'],
            $arrayVideo['width'],
            $arrayVideo['height'],
            $arrayVideo['url'],
            $arrayVideo['image'],
            $arrayVideo['duration'],
            User::fromArrayToObject($arrayVideo['user']),
            
            array_map(function ($VideoFile){
                return VideoFile::fromArrayToObject($VideoFile);
            }, $arrayVideo['video_files']),

            array_map(function ($VideoPicture){
                return VideoPicture::fromArrayToObject($VideoPicture);
            }, $arrayVideo['video_pictures'])            
        );
    }
}
