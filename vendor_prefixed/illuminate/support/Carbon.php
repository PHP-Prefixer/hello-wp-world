<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Illuminate\Support;

use PPP\Carbon\Carbon as BaseCarbon;
use PPP\Carbon\CarbonImmutable as BaseCarbonImmutable;

class Carbon extends BaseCarbon
{
    /**
     * {@inheritdoc}
     */
    public static function setTestNow($testNow = null)
    {
        BaseCarbon::setTestNow($testNow);
        BaseCarbonImmutable::setTestNow($testNow);
    }
}
