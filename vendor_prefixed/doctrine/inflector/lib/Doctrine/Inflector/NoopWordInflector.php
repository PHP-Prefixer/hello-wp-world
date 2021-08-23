<?php /* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace PPP\Doctrine\Inflector;

class NoopWordInflector implements WordInflector
{
    public function inflect(string $word) : string
    {
        return $word;
    }
}
