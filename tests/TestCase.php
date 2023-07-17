<?php

namespace joaquinpereira\Pexels\Tests;

use joaquinpereira\Pexels\Providers\PexelsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

class TestCase extends BaseTestCase
{
    public function setUp() : void
    {        
        parent::setUp();       
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('pexels.api_key', '');
    }

    protected function getPackageProviders($app)
    {
        return [
            PexelsServiceProvider::class
        ];
    }

}

