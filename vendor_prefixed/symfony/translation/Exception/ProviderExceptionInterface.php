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

namespace PPP\Symfony\Component\Translation\Exception;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @experimental in 5.3
 */
interface ProviderExceptionInterface extends ExceptionInterface
{
    /*
     * Returns debug info coming from the Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function getDebug(): string;
}
