<?php

namespace vendor\OtpSystem\Facades;

use Illuminate\Support\Facades\Facade;

class OtpSystemFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'otpsystem';
    }
}
