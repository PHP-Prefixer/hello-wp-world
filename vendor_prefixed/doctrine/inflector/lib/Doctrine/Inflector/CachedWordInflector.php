<?php /* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace PPP\Doctrine\Inflector;

class CachedWordInflector implements WordInflector
{
    /** @var WordInflector */
    private $wordInflector;

    /** @var string[] */
    private $cache = [];

    public function __construct(WordInflector $wordInflector)
    {
        $this->wordInflector = $wordInflector;
    }

    public function inflect(string $word) : string
    {
        return $this->cache[$word] ?? $this->cache[$word] = $this->wordInflector->inflect($word);
    }
}
