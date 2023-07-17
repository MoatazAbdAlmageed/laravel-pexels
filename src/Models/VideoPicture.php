<?php

namespace joaquinpereira\Pexels\Models;

class VideoPicture
{
    public int $id;
    public string $picture;
    public int $nr;
    

    /**
     * VideoPicture constructor
     * @param int $id The id of the video_picture.
     * @param string $picture A link to the preview image.
     * @param int $nr 
     */
    public function __construct($id, $picture, $nr)
    {        
        $this->id = $id;
        
        $this->picture = $picture;
        $this->nr = $nr;
    }

    /**
     * Return VideoFile instance from array
     * @param $array
     * @return VideoPicture
     */
    public static function fromArrayToObject($videoPictureArr)
    {
        return new self(
            $videoPictureArr['id'],
            $videoPictureArr['picture'],
            $videoPictureArr['nr']            
        );
    }
}