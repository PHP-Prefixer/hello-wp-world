<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PPP\Symfony\Component\Translation\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use PPP\Symfony\Component\DependencyInjection\Argument\ServiceClosureArgument;
use PPP\Symfony\Component\DependencyInjection\ContainerBuilder;
use PPP\Symfony\Component\DependencyInjection\Definition;
use PPP\Symfony\Component\DependencyInjection\Reference;
use PPP\Symfony\Component\DependencyInjection\ServiceLocator;
use PPP\Symfony\Component\Translation\DependencyInjection\TranslatorPathsPass;
use PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures\ControllerArguments;
use PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures\ServiceArguments;
use PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures\ServiceMethodCalls;
use PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures\ServiceProperties;
use PPP\Symfony\Component\Translation\Tests\DependencyInjection\fixtures\ServiceSubscriber;

class TranslationPathsPassTest extends TestCase
{
    public function testProcess()
    {
        $container = new ContainerBuilder();
        $container->register('translator');
        $debugCommand = $container->register('console.command.translation_debug')
            ->setArguments([null, null, null, null, null, [], []])
        ;
        $updateCommand = $container->register('console.command.translation_update')
            ->setArguments([null, null, null, null, null, null, [], []])
        ;
        $container->register(ControllerArguments::class, ControllerArguments::class)
            ->setTags(['controller.service_arguments'])
        ;
        $container->register(ServiceArguments::class, ServiceArguments::class)
            ->setArguments([new Reference('translator')])
        ;
        $container->register(ServiceProperties::class, ServiceProperties::class)
            ->setProperties([new Reference('translator')])
        ;
        $container->register(ServiceMethodCalls::class, ServiceMethodCalls::class)
            ->setMethodCalls([['setTranslator', [new Reference('translator')]]])
        ;
        $container->register('service_rc')
            ->setArguments([new Definition(), new Reference(ServiceMethodCalls::class)])
        ;
        $serviceLocator1 = $container->register('.service_locator.foo', ServiceLocator::class)
            ->setArguments([new ServiceClosureArgument(new Reference('translator'))])
        ;
        $serviceLocator2 = (new Definition(ServiceLocator::class))
            ->setArguments([ServiceSubscriber::class, new Reference('service_container')])
            ->setFactory([$serviceLocator1, 'withContext'])
        ;
        $container->register('service_subscriber', ServiceSubscriber::class)
            ->setArguments([$serviceLocator2])
        ;
        $container->register('.service_locator.bar', ServiceLocator::class)
            ->setArguments([[
                ControllerArguments::class.'::index' => new ServiceClosureArgument(new Reference('.service_locator.foo')),
                ControllerArguments::class.'::__invoke' => new ServiceClosureArgument(new Reference('.service_locator.foo')),
                ControllerArguments::class => new ServiceClosureArgument(new Reference('.service_locator.foo')),
            ]])
        ;
        $container->register('argument_resolver.service')
            ->setArguments([new Reference('.service_locator.bar')])
        ;

        $pass = new TranslatorPathsPass();
        $pass->process($container);

        $expectedPaths = [
            $container->getReflectionClass(ServiceArguments::class)->getFileName(),
            $container->getReflectionClass(ServiceProperties::class)->getFileName(),
            $container->getReflectionClass(ServiceMethodCalls::class)->getFileName(),
            $container->getReflectionClass(ControllerArguments::class)->getFileName(),
            $container->getReflectionClass(ServiceSubscriber::class)->getFileName(),
        ];

        $this->assertSame($expectedPaths, $debugCommand->getArgument(6));
        $this->assertSame($expectedPaths, $updateCommand->getArgument(7));
    }
}
