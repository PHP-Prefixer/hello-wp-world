<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures;

use PPP\Symfony\Contracts\Translation\TranslatorInterface;

class ServiceMethodCalls
{
    public function setTranslator(TranslatorInterface $translator)
    {
    }
}
