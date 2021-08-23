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

use PPP\Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @experimental in 5.3
 */
class ProviderException extends RuntimeException implements ProviderExceptionInterface
{
    private $response;
    private $debug;

    public function __construct(string $message, ResponseInterface $response, int $code = 0, \Exception $previous = null)
    {
        $this->response = $response;
        $this->debug .= $response->getInfo('debug') ?? '';

        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getDebug(): string
    {
        return $this->debug;
    }
}
