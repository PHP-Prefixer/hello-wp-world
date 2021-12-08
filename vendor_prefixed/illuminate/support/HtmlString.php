<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

namespace PPP\Illuminate\Support;

use PPP\Illuminate\Contracts\Support\Htmlable;

class HtmlString implements Htmlable
{
    /**
     * The HTML string.
     *
     * @var string
     */
    protected $html;

    /**
     * Create a new HTML string instance.
     *
     * @param  string  $html
     * @return void
     */
    public function __construct($html = '')
    {
        $this->html = $html;
    }

    /**
     * Get the HTML string.
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->html;
    }

    /**
     * Determine if the given HTML string is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->html === '';
    }

    /**
     * Determine if the given HTML string is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return $this->html !== '';
    }

    /**
     * Get the HTML string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }
}
