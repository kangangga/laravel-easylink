<?php

namespace Kangangga\EasylinkSdk;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Kangangga\EasylinkSdk\EasylinkSdk
 */
class EasylinkSdkFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-easylink';
    }
}
