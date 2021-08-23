<?php /* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace PPP\Doctrine\Inflector\Rules\NorwegianBokmal;

use PPP\Doctrine\Inflector\Rules\Patterns;
use PPP\Doctrine\Inflector\Rules\Ruleset;
use PPP\Doctrine\Inflector\Rules\Substitutions;
use PPP\Doctrine\Inflector\Rules\Transformations;

final class Rules
{
    public static function getSingularRuleset() : Ruleset
    {
        return new Ruleset(
            new Transformations(...Inflectible::getSingular()),
            new Patterns(...Uninflected::getSingular()),
            (new Substitutions(...Inflectible::getIrregular()))->getFlippedSubstitutions()
        );
    }

    public static function getPluralRuleset() : Ruleset
    {
        return new Ruleset(
            new Transformations(...Inflectible::getPlural()),
            new Patterns(...Uninflected::getPlural()),
            new Substitutions(...Inflectible::getIrregular())
        );
    }
}
