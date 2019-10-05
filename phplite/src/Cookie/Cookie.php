<?php

namespace phplite\Cookie;

class Cookie{

    /**
     * Cookie constructor.
     */
    private function __construct(){}

    /**
     * Set new Cookie.
     *
     * @param $key
     * @param $value
     *
     * @return string $value
     */
    public static function set($key, $value) {
        $expired = time() + (1 * 365 * 24 * 60 * 60);
        setcookie($key, $value, $expired, '/', '', false, true);
        return $value;
    }

    /**
     * Check that cookie has the $key.
     *
     * @param $key
     * @return bool
     */
    public static function has($key){
        return isset($_COOKIE[$key]);
    }

    /**
     * Get cookie by given key.
     *
     * @param $key
     * @return mixed|null
     */
    public static function get($key){
        return static::has($key) ? $_COOKIE[$key] : null;
    }

    /**
     * Remove cookie by given key.
     *
     * @param $key
     */
    public static function remove($key){
        unset($_COOKIE[$key]);
        setcookie($key, null, '-1', '/');
    }

    /**
     * Return all cookies.
     *
     * @return mixed
     */
    public static function all(){
        return $_COOKIE;
    }

    /**
     * Destroy all cookies at once.
     */
    public static function destroy(){
        foreach (static::all() as $key => $value){
            static::remove($key);
        }
    }
}