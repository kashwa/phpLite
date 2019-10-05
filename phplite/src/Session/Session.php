<?php

namespace phplite\Session;

class Session{

    /**
     * Session constructor.
     */
    private function __construct(){}

    /**
     * Start session.
     *
     * @return void
     */
    public static function start(){
        # Start new session if there is no one.
        if (!session_id()) {
            # make session more secure.
            ini_set('session.use_only_cookies', 1);

            # start session
            session_start();
        }
    }

    /**
     * Set new session.
     *
     * @param $key
     * @param $value
     *
     * @return string $value
     */
    public static function set($key, $value){
        $_SESSION[$key] = $value;

        return $value;
    }

    /**
     * Check that session has the $key.
     *
     * @param $key
     * @return bool
     */
    public static function has($key){
        return isset($_SESSION[$key]);
    }

    /**
     * Get session by given key.
     *
     * @param $key
     * @return mixed|null
     */
    public static function get($key){
        return static::has($key) ? $_SESSION[$key] : null;
    }

    /**
     * Remove session by given key.
     *
     * @param $key
     */
    public static function remove($key){
        unset($_SESSION[$key]);
    }

    /**
     * Return all sessions.
     *
     * @return mixed
     */
    public static function all(){
        return $_SESSION;
    }

    /**
     * Destroy all sessions at once.
     */
    public static function destroy(){
        foreach (static::all() as $key => $value){
            static::remove($key);
        }
    }

    /**
     * Get flash session.
     *
     * @param $key
     * @return mixed|null
     */
    public static function flash($key){
        $value = null;
        if (static::has($key)) {
            $value = static::get($key);
            static::remove($key);
        }
        return $value;
    }
}