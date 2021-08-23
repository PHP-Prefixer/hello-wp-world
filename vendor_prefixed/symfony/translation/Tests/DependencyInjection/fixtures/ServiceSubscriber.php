<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures;

use Psr\Container\ContainerInterface;
use PPP\Symfony\Contracts\Service\ServiceSubscriberInterface;
use PPP\Symfony\Contracts\Translation\TranslatorInterface;

class ServiceSubscriber implements ServiceSubscriberInterface
{
    public function __construct(ContainerInterface $container)
    {
    }

    public static function getSubscribedServices(): array
    {
        return ['translator' => TranslatorInterface::class];
    }
}
