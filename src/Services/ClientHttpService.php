<?php

namespace Jpereira\Pexels\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Jpereira\Pexels\Enums\ModelTypes;
use Exception;


class ClientHttpService
{
    public function client($query, $type) 
    {
        $response = Http::withHeaders(['Authorization' => Config::get('pexels.api_key')])
            ->baseUrl($this->getUrl($type))
            ->get($query);

        if($response->ok()){
            return $response->json();
        }else{
            $this->checkResponse($response);
        }        
        $response->handlerStats();

        $response->status();

        return null;
    }

    private function checkResponse($response) : void
    {
        if ($response->unauthorized()) {
            throw new Exception("Unauthorized. Verify your pexels api key is correct", $response->status());
        }
        
        if (!$response->ok()) {
            throw new Exception("A problem occurred in the request - Code:  ".$response->status()." Reason: ".$response->reason() , $response->status());;
        }
        
    }

    private function getUrl($type) : string
    {
        if(ModelTypes::PHOTO === $type)
            return Config::get('pexels.url_image');
        else
            return Config::get('pexels.url_video');
    }
    
}