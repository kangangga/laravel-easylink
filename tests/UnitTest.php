<?php

namespace Kangangga\EasylinkSdk\Tests;

use Illuminate\Support\Str;

class UnitTest extends TestCase
{

    /** @test */
    public function it_check_string()
    {
        $val = intval('123123A');
        $this->assertEquals(123123, $val);
    }

    /** @test */
    public function it_check_provider()
    {
        $provider = $this->app->resolveProvider(\Kangangga\EasylinkSdk\EasylinkSdkServiceProvider::class);
        $this->assertInstanceOf(\Kangangga\EasylinkSdk\EasylinkSdkServiceProvider::class, $provider);
    }
}
