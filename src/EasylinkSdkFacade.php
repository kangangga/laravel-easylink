<?php

namespace Kangangga\EasylinkSdk;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kangangga\EasylinkSdk\Skeleton\SkeletonClass
 */
class EasylinkSdkFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-easylink';
    }
}
