<?php

namespace F0\LaravelMoodleClient\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelMoodleClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravelmoodleclient';
    }
}
