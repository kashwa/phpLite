<?php

namespace phplite\Bootstrap;

use phplite\Cookie\Cookie;
use phplite\Exceptions\whoops;
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
     * @throws \Exception
     */
    public static function run()
    {
        # Register whoops.
        whoops::handle();

        # Start session.
        Session::start();

        echo Server::get('DOCUMENT_ROOT');
        echo "<pre>";
        print_r(Server::path_info("http://localhost:8080/phplite/public/"));
        echo "</pre>";
    }
}
