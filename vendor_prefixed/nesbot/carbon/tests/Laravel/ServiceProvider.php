<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */
declare(strict_types=1);

namespace Illuminate\Support;

use Illuminate\Events\EventDispatcher;
use Tests\Laravel\App;

class ServiceProvider
{
    /**
     * @var App
     */
    public $app;

    public function __construct($dispatcher = null)
    {
        $this->app = new App();
        $this->app->setEventDispatcher($dispatcher ?: new EventDispatcher());
    }
}
