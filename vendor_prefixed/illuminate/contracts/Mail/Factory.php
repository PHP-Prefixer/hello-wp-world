<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Illuminate\Contracts\Mail;

interface Factory
{
    /**
     * Get a mailer instance by name.
     *
     * @param  string|null  $name
     * @return \Illuminate\Mail\Mailer
     */
    public function mailer($name = null);
}
