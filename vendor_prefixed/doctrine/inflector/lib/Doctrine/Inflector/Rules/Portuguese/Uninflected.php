<?php /* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace PPP\Doctrine\Inflector\Rules\Portuguese;

use PPP\Doctrine\Inflector\Rules\Pattern;

final class Uninflected
{
    /**
     * @return Pattern[]
     */
    public static function getSingular() : iterable
    {
        yield from self::getDefault();
    }

    /**
     * @return Pattern[]
     */
    public static function getPlural() : iterable
    {
        yield from self::getDefault();
    }

    /**
     * @return Pattern[]
     */
    private static function getDefault() : iterable
    {
        yield new Pattern('tórax');
        yield new Pattern('tênis');
        yield new Pattern('ônibus');
        yield new Pattern('lápis');
        yield new Pattern('fênix');
    }
}
