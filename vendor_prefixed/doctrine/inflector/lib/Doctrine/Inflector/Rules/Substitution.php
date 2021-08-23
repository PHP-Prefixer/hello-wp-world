<?php /* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace PPP\Doctrine\Inflector\Rules;

final class Substitution
{
    /** @var Word */
    private $from;

    /** @var Word */
    private $to;

    public function __construct(Word $from, Word $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function getFrom() : Word
    {
        return $this->from;
    }

    public function getTo() : Word
    {
        return $this->to;
    }
}
