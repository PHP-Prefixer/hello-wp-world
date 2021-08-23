<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Carbon;

class Cli
{
    public static $lastParameters = [];

    public function __invoke(...$parameters)
    {
        static::$lastParameters = $parameters;

        return true;
    }
}
