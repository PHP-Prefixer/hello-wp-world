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

namespace PPP\Symfony\Component\Translation\Tests\Provider;

use PHPUnit\Framework\TestCase;
use PPP\Symfony\Component\Translation\Exception\UnsupportedSchemeException;
use PPP\Symfony\Component\Translation\Provider\Dsn;
use PPP\Symfony\Component\Translation\Provider\NullProvider;
use PPP\Symfony\Component\Translation\Provider\NullProviderFactory;

/**
 * @author Mathieu Santostefano <msantostefano@protonmail.com>
 *
 * @experimental in 5.3
 */
class NullProviderFactoryTest extends TestCase
{
    public function testCreateThrowsUnsupportedSchemeException()
    {
        $this->expectException(UnsupportedSchemeException::class);

        (new NullProviderFactory())->create(new Dsn('foo://localhost'));
    }

    public function testCreate()
    {
        $this->assertInstanceOf(NullProvider::class, (new NullProviderFactory())->create(new Dsn('null://null')));
    }
}
