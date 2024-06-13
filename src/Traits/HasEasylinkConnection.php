<?php

namespace Kangangga\EasylinkSdk\Traits;

trait HasEasylinkConnection
{
    public function getConnectionName()
    {
        return config('easylink', 'fingerspot');
    }
}
