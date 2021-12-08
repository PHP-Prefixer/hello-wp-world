<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace PPP\Carbon\Doctrine;

use PPP\Carbon\CarbonImmutable;
use Doctrine\DBAL\Types\VarDateTimeImmutableType;

class DateTimeImmutableType extends VarDateTimeImmutableType implements CarbonDoctrineType
{
    use CarbonTypeConverter;

    protected function getCarbonClassName(): string
    {
        return CarbonImmutable::class;
    }
}
