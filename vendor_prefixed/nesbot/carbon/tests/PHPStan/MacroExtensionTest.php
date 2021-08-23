<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace Tests\PHPStan;

use PPP\Carbon\Carbon;
use PPP\Carbon\CarbonInterface;
use PPP\Carbon\CarbonInterval;
use PPP\Carbon\PHPStan\MacroScanner;
use Tests\AbstractTestCase;

class MacroExtensionTest extends AbstractTestCase
{
    public function testHasMacro()
    {
        $scanner = new MacroScanner();

        $this->assertFalse($scanner->hasMethod(Carbon::class, 'foo'));

        Carbon::macro('foo', function () {
        });

        $this->assertTrue($scanner->hasMethod(Carbon::class, 'foo'));
        $this->assertFalse($scanner->hasMethod(CarbonInterval::class, 'foo'));
        $this->assertFalse($scanner->hasMethod(CarbonInterface::class, 'foo'));
    }

    public function testGetMacro()
    {
        $scanner = new MacroScanner();
        Carbon::macro('foo', function (): CarbonInterval {
        });

        $this->assertSame(
            CarbonInterval::class,
            $scanner->getMethod(Carbon::class, 'foo')->getReturnType()->getName()
        );
    }
}
