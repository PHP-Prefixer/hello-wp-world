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

namespace PPP\Symfony\Component\Translation\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use PPP\Symfony\Component\Translation\LoggingTranslator;
use PPP\Symfony\Component\Translation\Translator;

class LoggingTranslatorTest extends TestCase
{
    public function testTransWithNoTranslationIsLogged()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->exactly(1))
            ->method('warning')
            ->with('Translation not found.')
        ;

        $translator = new Translator('ar');
        $loggableTranslator = new LoggingTranslator($translator, $logger);
        $loggableTranslator->trans('bar');
    }
}
