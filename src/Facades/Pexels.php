<?php

namespace Jpereira\Pexels\Facades;

use Illuminate\Support\Facades\Facade;

class Pexels extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pexels';
    }
}