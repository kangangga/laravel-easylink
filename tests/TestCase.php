<?php

namespace Kangangga\EasylinkSdk\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \Kangangga\EasylinkSdk\EasylinkSdkServiceProvider::class,
        ];
    }

    protected function getLaravelVersion()
    {
        return (float) app()->version();
    }
}
