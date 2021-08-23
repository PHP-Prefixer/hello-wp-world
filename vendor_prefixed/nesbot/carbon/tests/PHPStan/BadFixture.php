<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace Tests\PHPStan;

use PPP\Carbon\Carbon;

Carbon::macro('foo', function (): string {
    return 'foo';
});

class BadFixture
{
    public function testCarbonMacroCalledStatically(): string
    {
        return Carbon::foo();
    }

    public function testCarbonMacroCalledDynamically(): string
    {
        return Carbon::now()->foo();
    }
}
