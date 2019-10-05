<?php

namespace phplite\Exceptions;

class whoops{
    /**
     * whoops constructor.
     */
    private function __construct(){}

    /**
     * Handle WHOOPS Error.
     *
     * @return void
     */
    public static function handle(){
        $whoops = new \Whoops\Run;
        $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
}