<?php /* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

declare(strict_types=1);

namespace PPP\Doctrine\Inflector;

use PPP\Doctrine\Inflector\Rules\Ruleset;

interface LanguageInflectorFactory
{
    /**
     * Applies custom rules for singularisation
     *
     * @param bool $reset If true, will unset default inflections for all new rules
     *
     * @return $this
     */
    public function withSingularRules(?Ruleset $singularRules, bool $reset = false) : self;

    /**
     * Applies custom rules for pluralisation
     *
     * @param bool $reset If true, will unset default inflections for all new rules
     *
     * @return $this
     */
    public function withPluralRules(?Ruleset $pluralRules, bool $reset = false) : self;

    /**
     * Builds the inflector instance with all applicable rules
     */
    public function build() : Inflector;
}
