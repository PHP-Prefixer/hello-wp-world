<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Illuminate\Support\Traits;

trait Tappable
{
    /**
     * Call the given Closure with this instance then return the instance.
     *
     * @param  callable|null  $callback
     * @return mixed
     */
    public function tap($callback = null)
    {
        return PPP_tap($this, $callback);
    }
}
