<?php

namespace Jpereira\Pexels;

interface PexelsInterface
{

    /** 
     * This request allows you to search the Pexels API for photos of any topic you are interested in. For example, you could enter a generic term, such as nature, tigers or people, or you could type in something more specific, such as a group of people working.
     * @param string $query The search query. Ocean, Tigers, Pears, etc
     * @param int $page The page number you are requesting. Default: 1
     * @param int $perPage The number of results you are requesting per page. Default: 15 Max: 80
     * @param string $orientation Desired photo orientation. The current supported orientations are: landscape, portrait or square.
     * @param string $size Minimum photo size. The current supported sizes are: large(24MP), medium(12MP) or small(4MP).
     * @param string $color Desired photo color. Supported colors: red, orange, yellow, green, turquoise, blue, violet, pink, brown, black, gray, white or any hexidecimal color code (eg. #ffffff).
     * @param string $locale The locale of the search you are performing. The current supported locales are: 'en-US' 'pt-BR' 'es-ES' 'ca-ES' 'de-DE' 'it-IT' 'fr-FR' 'sv-SE' 'id-ID' 'pl-PL' 'ja-JP' 'zh-TW' 'zh-CN' 'ko-KR' 'th-TH' 'nl-NL' 'hu-HU' 'vi-VN' 'cs-CZ' 'da-DK' 'fi-FI' 'uk-UA' 'el-GR' 'ro-RO' 'nb-NO' 'sk-SK' 'tr-TR' 'ru-RU'.
     * @return mixed returns an array with pagination data and an array of photos
     */
    public function image_search($query, $page = 1, $perPage = 15, $orientation=null, $size=null, $color=null, $locale=null);

    /** 
     * This query allows you to receive real-time photos selected by the Pexels team. 
     * They add one photo per hour (at least!) to their lists so that your selection of trending photos is always changing.
     * @param int $page The page number you are requesting. Default: 1
     * @param int $perPage The number of results you are requesting per page. Default: 15 Max: 80
     * @return array returns an array with pagination data and an array of photos
     */
    public function image_curated($page = 1, $perPage = 15);

    /** 
     * Search for a specific Photo with its identifier.
     * @param number $id The id of the photo you are requesting.     
     * @return \Jpereira\Pexels\Models\Photo Returns a Photo object
     */
    public function image_detail($id);

    /** 
     * Obtain a random image via query string.
     * @param string $query The search query. Ocean, Tigers, Pears, etc
     * @param string $size Minimum photo size. The current supported sizes are: large2x, large, medium, small, tiny, portrait or landscape.
     * @return string Returns url photo
     */
    public function getRandomImage($query, $size="large");

    /** 
     * This query allows you to search the Pexels API for videos on any topic you are interested in. For example, you could enter a generic term, such as nature, tigers or people, or you could type something more specific, such as a group of people working.
     * @param string $query The search query. Ocean, Tigers, Pears, etc
     * @param int $page The page number you are requesting. Default: 1
     * @param int $perPage The number of results you are requesting per page. Default: 15 Max: 80
     * @param string|null $orientation Desired video orientation. The current supported orientations are: landscape, portrait or square.
     * @param string|null $size Minimum video size. The current supported sizes are: large(4K), medium(Full HD) or small(HD).
     * @param string|null $locale The locale of the search you are performing. The current supported locales are: 'en-US' 'pt-BR' 'es-ES' 'ca-ES' 'de-DE' 'it-IT' 'fr-FR' 'sv-SE' 'id-ID' 'pl-PL' 'ja-JP' 'zh-TW' 'zh-CN' 'ko-KR' 'th-TH' 'nl-NL' 'hu-HU' 'vi-VN' 'cs-CZ' 'da-DK' 'fi-FI' 'uk-UA' 'el-GR' 'ro-RO' 'nb-NO' 'sk-SK' 'tr-TR' 'ru-RU'.
     * @return array returns an array with pagination data and an array of videos
     */
    public function video_search($query, $page = 1, $perPage = 15, $orientation=null, $size=null, $locale=null);

    /** 
     * This endpoint allows you to receive the most popular Pexels videos at any given moment.
     * @param int $page The page number you are requesting. Default: 1
     * @param int $perPage The number of results you are requesting per page. Default: 15 Max: 80
     * @return array returns an array with pagination data and an array of videos
     */
    public function popular_videos($page = 1, $perPage = 15);

    /** 
     * Search for a specific Video with its identifier.
     * @param number $id The id of the photo you are requesting.
     * @return \Jpereira\Pexels\Models\Video Returns a Video object
     */
    public function video_detail($id);

    /** 
     * Obtain a random video via query string.
     * @param string $query The search query. Ocean, Tigers, Pears, etc
     * @param string|null $orientation Desired video orientation. The current supported orientations are: landscape, portrait or square.
     * @param string|null $size Minimum video size. The current supported sizes are: large(4K), medium(Full HD) or small(HD).
     * @return string Returns a url video
     */
    public function getRandomVideo($query, $orientation ="landscape", $size="small");

}