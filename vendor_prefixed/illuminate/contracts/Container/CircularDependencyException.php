<?php /* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Illuminate\Contracts\Container;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class CircularDependencyException extends Exception implements ContainerExceptionInterface
{
    //
}
