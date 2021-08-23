<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace Tests\Carbon\Fixtures;

trait FooBar
{
    public function super($string)
    {
        return 'super'.$string.' / '.$this->format('l').' / '.($this->isMutable() ? 'mutable' : 'immutable');
    }

    public function me()
    {
        return $this;
    }

    public static function noThis()
    {
        return isset(${'this'});
    }
}
