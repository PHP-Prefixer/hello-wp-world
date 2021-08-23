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

namespace PPP\Symfony\Component\Translation\Tests\Exception;

use PHPUnit\Framework\TestCase;
use PPP\Symfony\Bridge\PhpUnit\ClassExistsMock;
use PPP\Symfony\Component\Translation\Bridge\Crowdin\CrowdinProviderFactory;
use PPP\Symfony\Component\Translation\Bridge\Loco\LocoProviderFactory;
use PPP\Symfony\Component\Translation\Bridge\Lokalise\LokaliseProviderFactory;
use PPP\Symfony\Component\Translation\Exception\UnsupportedSchemeException;
use PPP\Symfony\Component\Translation\Provider\Dsn;

/**
 * @runTestsInSeparateProcesses
 */
final class UnsupportedSchemeExceptionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        ClassExistsMock::register(__CLASS__);
        ClassExistsMock::withMockedClasses([
            CrowdinProviderFactory::class => false,
            LocoProviderFactory::class => false,
            LokaliseProviderFactory::class => false,
        ]);
    }

    /**
     * @dataProvider messageWhereSchemeIsPartOfSchemeToPackageMapProvider
     */
    public function testMessageWhereSchemeIsPartOfSchemeToPackageMap(string $scheme, string $package)
    {
        $dsn = new Dsn(sprintf('%s://localhost', $scheme));

        $this->assertSame(
            sprintf('Unable to synchronize translations via "%s" as the provider is not installed; try running "composer require %s".', $scheme, $package),
            (new UnsupportedSchemeException($dsn))->getMessage()
        );
    }

    public function messageWhereSchemeIsPartOfSchemeToPackageMapProvider(): \Generator
    {
        yield ['crowdin', 'symfony/crowdin-translation-provider'];
        yield ['loco', 'symfony/loco-translation-provider'];
        yield ['lokalise', 'symfony/lokalise-translation-provider'];
    }

    /**
     * @dataProvider messageWhereSchemeIsNotPartOfSchemeToPackageMapProvider
     */
    public function testMessageWhereSchemeIsNotPartOfSchemeToPackageMap(string $expected, Dsn $dsn, ?string $name, array $supported)
    {
        $this->assertSame(
            $expected,
            (new UnsupportedSchemeException($dsn, $name, $supported))->getMessage()
        );
    }

    public function messageWhereSchemeIsNotPartOfSchemeToPackageMapProvider(): \Generator
    {
        yield [
            'The "somethingElse" scheme is not supported.',
            new Dsn('somethingElse://localhost'),
            null,
            [],
        ];

        yield [
            'The "somethingElse" scheme is not supported.',
            new Dsn('somethingElse://localhost'),
            'foo',
            [],
        ];

        yield [
            'The "somethingElse" scheme is not supported; supported schemes for translation provider "one" are: "one", "two".',
            new Dsn('somethingElse://localhost'),
            'one',
            ['one', 'two'],
        ];
    }
}
