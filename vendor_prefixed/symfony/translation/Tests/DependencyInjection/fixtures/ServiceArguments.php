<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures;

use PPP\Symfony\Contracts\Translation\TranslatorInterface;

class ServiceArguments
{
    public function __construct(TranslatorInterface $translator)
    {
    }
}
