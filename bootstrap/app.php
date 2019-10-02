<?php
use phplite\Bootstrap\App;

/**
 * Here we will run our APP.
 * and we will add some definitions to be used later in project.
 */

 class Application
 {
     
    /**
    * Application Constructor (Private)
    * so it can't be called outside.
    */
    private function __construct() {}

    /**
     * Run the application.
     * &&
     * Setting app definitions.
     * 
     * @return void
     */
    public static function run()
    {
        # define Root path.
        define('ROOT', realpath(__DIR__.'/..'));

        # define Directory Separator (DS).
        define('DS', DIRECTORY_SEPARATOR);
        
        # Run the App.
        App::run();
    }
 }
 