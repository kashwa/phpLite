<?php

namespace phplite\Bootstrap;

use phplite\Exceptions\whoops;

class App {

    /**
     * Private Constructor
     *
     * @return  void
     */
    private function __construct() {}

    /**
     * Run the application.
     *
     * @return void [type]  [return description]
     * @throws \Exception
     */
    public static function run()
    {
        whoops::handle();
        throw new \Exception("Continue from here, installing WHOOPS!");
    }
}
