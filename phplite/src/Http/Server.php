<?php

namespace phplite\Http;

class Server{

    /**
     * Server constructor.
     */
    private function __construct(){}

    /**
     * Check server has $key.
     *
     * @param $key
     * @return bool
     */
    public static function has($key){
        return isset($_SERVER[$key]);
    }

    /**
     * Get Path info for $path.
     *
     * @param $path
     * @return array
     */
    public static function path_info($path){
        return pathinfo($path);
    }

    /**
     * Get value from server by given $key
     *
     * @param string $key
     * @return string $value
     */
    public static function get($key){
        return static::has($key) ? $_SERVER[$key] : null;
    }

    /**
     * Get all Server data.
     *
     * @return array
     */
    public static function all(){
        return $_SERVER;
    }
}