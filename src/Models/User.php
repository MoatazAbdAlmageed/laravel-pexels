<?php

namespace joaquinpereira\Pexels\Models;

/**
 * The videographer who shot the video.
 */
class User 
{
    public int $id;
    public string $name;
    public string $url;

    /**
     * @param int $id The id of the videographer.
     * @param string $name The name of the videographer.
     * @param string $url The URL of the videographer's Pexels profile.
     */
    public function __construct($id, $name, $url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Return Video instance from array
     * @param $array
     * @return User
     */
    public static function fromArrayToObject($userArr)
    {
        return new self(
            $userArr['id'],
            $userArr['name'],
            $userArr['url']
        );
    }
}