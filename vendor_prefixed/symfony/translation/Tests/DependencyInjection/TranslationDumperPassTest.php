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
use PPP\Symfony\Component\DependencyInjection\ContainerBuilder;
use PPP\Symfony\Component\DependencyInjection\Reference;
use PPP\Symfony\Component\Translation\DependencyInjection\TranslationDumperPass;

class TranslationDumperPassTest extends TestCase
{
    public function testProcess()
    {
        $container = new ContainerBuilder();
        $writerDefinition = $container->register('translation.writer');
        $container->register('foo.id')
            ->addTag('translation.dumper', ['alias' => 'bar.alias']);

        $translationDumperPass = new TranslationDumperPass();
        $translationDumperPass->process($container);

        $this->assertEquals([['addDumper', ['bar.alias', new Reference('foo.id')]]], $writerDefinition->getMethodCalls());
    }

    public function testProcessNoDefinitionFound()
    {
        $container = new ContainerBuilder();

        $definitionsBefore = \count($container->getDefinitions());
        $aliasesBefore = \count($container->getAliases());

        $translationDumperPass = new TranslationDumperPass();
        $translationDumperPass->process($container);

        // the container is untouched (i.e. no new definitions or aliases)
        $this->assertCount($definitionsBefore, $container->getDefinitions());
        $this->assertCount($aliasesBefore, $container->getAliases());
    }
}
