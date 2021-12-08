<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

/**
 * Thanks to https://github.com/flaushi for his suggestion:
 * https://github.com/doctrine/dbal/issues/2873#issuecomment-534956358
 */
namespace PPP\Carbon\Doctrine;

use Doctrine\DBAL\Types\VarDateTimeType;

class DateTimeType extends VarDateTimeType implements CarbonDoctrineType
{
    use CarbonTypeConverter;
}
