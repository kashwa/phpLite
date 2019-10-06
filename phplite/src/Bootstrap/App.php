<?php

namespace phplite\Bootstrap;

use Exception;
use phplite\Cookie\Cookie;
use phplite\Exceptions\whoops;
use phplite\Http\Request;
use phplite\Http\Server;
use phplite\Session\Session;

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
     * @throws Exception
     */
    public static function run()
    {
        # Register whoops.
        whoops::handle();

        # Start session.
        Session::start();

        # Handle request.
        Request::handle();

        echo "<pre>";
        print_r(Request::get('asd'));
        echo "</pre>";
    }
}
