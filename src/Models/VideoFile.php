<?php

namespace joaquinpereira\Pexels\Models;

class VideoFile 
{
    public int $id;
    public string $quality;
    public string $file_type;
    public int $width;
    public int $height;
    public float $fps;
    public string $link;
    
    /**
     * VideoFile constructor
     * @param int $id The id of the video_file.
     * @param string $quality The video quality of the video_file.
     * @param string $file_type The video format of the video_file.
     * @param int $width The width of the video_file in pixels.
     * @param int $height The height of the video_file in pixels.
     * @param float $fps The number of frames per second of the video_file.
     * @param string $link A link to where the video_file is hosted.
     */
    public function __construct($id, $quality, $file_type, $width, $height, $fps, $link)
    {
        
        $this->id = $id;
        $this->quality = $quality;
        $this->file_type = $file_type;
        $this->width = $width;
        $this->height = $height;
        $this->fps = $fps;
        $this->link = $link;
    }

    /**
     * Return VideoFile instance from array
     * @param $array
     * @return VideoFile
     */
    public static function fromArrayToObject($videoFileArr)
    {
        return new self(
            $videoFileArr['id'],
            $videoFileArr['quality'],
            $videoFileArr['file_type'],
            $videoFileArr['width'],
            $videoFileArr['height'],
            is_null($videoFileArr['fps']) ? 0 : $videoFileArr['fps'],
            $videoFileArr['link'],
        );
    }
}