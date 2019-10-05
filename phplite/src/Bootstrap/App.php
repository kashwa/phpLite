<?php

namespace phplite\Bootstrap;

use phplite\Cookie\Cookie;
use phplite\Exceptions\whoops;
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

        # Testing Cookies.
        //echo Cookie::set('name', 'aabed');
        //Cookie::destroy();
        echo '<pre>';
            print_r(Cookie::all());
        echo '</pre>';
    }
}
