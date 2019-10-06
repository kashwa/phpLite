<?php


namespace phplite\Http;


class Request{

    /**
     * Base URL.
     *
     * @var $base_url;
     */
    private static $base_url;

    /**
     * URL.
     *
     * @var $url;
     */
    private static $url;

    /**
     * Full URL.
     *
     * @var $full_url;
     */
    private static $full_url;

    /**
     * Query String.
     *
     * @var $query_string;
     */
    private static $query_string;

    /**
     * Script name.
     *
     * @var $script_name;
     */
    private static $script_name;


    /**
     * Request constructor.
     */
    private function __construct(){}

    /**
     * Handle the request.
     *
     * @return void;
     */
    public static function handle() {
        static::$script_name = str_replace('\\', '', dirname(Server::get('SCRIPT_NAME')));
        static::setBaseUrl();
        static::setUrl();
    }

    /**
     * Set Base URL.
     *
     * @return void
     */
    private static function setBaseUrl(){
        $protocole = Server::get('REQUEST_SCHEME') . '://';
        $host = Server::get('HTTP_HOST');
        $script_name = static::$script_name;

        static::$base_url = $protocole . $host . $script_name;
    }

    /**
     * Set URL.
     *
     * @return void
     */
    private static function setUrl(){
        $request_uri = urldecode(Server::get('REQUEST_URI'));
        $request_uri = rtrim(preg_replace("#^" . static::$script_name. '#', '', $request_uri), '/');

        $query_string = '';
        static::$full_url = $request_uri;
        if (strpos($request_uri, '?') !== false) {
            list($request_uri, $query_string) = explode('?', $request_uri);
        }
        static::$url = $request_uri?:'/';
        static::$query_string = $query_string;
    }

    /**
     * Get Base URL.
     *
     * @return string
     */
    public static function baseUrl(){
        return static::$base_url;
    }

    /**
     * Get URL.
     *
     * @return string
     */
    public static function url(){
        return static::$url;
    }

    /**
     * Get Query String.
     *
     * @return string
     */
    public static function query_string(){
        return static::$query_string;
    }

    /**
     * Get Full URL.
     *
     * @return string
     */
    public static function full_url(){
        return static::$full_url;
    }

    /**
     * Get request method
     *
     * @return string
     */
    public static function method() {
        return Server::get('REQUEST_METHOD');
    }

    /**
     * Get value from get request
     *
     * @param string $key
     * @return string $value
     */
    public static function get($key) {
        return static::value($key, $_GET);
    }
    /**
     * Get value from post request
     *
     * @param string $key
     * @return string $value
     */
    public static function post($key) {
        return static::value($key, $_POST);
    }

    /**
     * Check that the request has the key
     *
     * @param array $type
     * @param string $key
     * @return bool
     */
    public static function has($type, $key) {
        return array_key_exists($key, $type);
    }

    /**
     * get the value from the request
     *
     * @param string $key
     * @param array $type
     * @return bool
     */
    public static function value($key, array $type = null) {
        $type = isset($type) ? $type : $_REQUEST;
        return static::has($type, $key) ? $type[$key] : null;
    }

    /**
     * Set value for request by the given key
     *
     * @param string $key
     * @param string $value
     * @return string $value
     */
    public static function set($key, $value) {
        $_REQUEST[$key] = $value;
        $_POST[$key] = $value;
        $_GET[$key] = $value;
        return $value;
    }

    /**
     * Get previous request value
     *
     * @return string
     */
    public static function previous() {
        return Server::get('HTTP_REFERER');
    }
    /**
     * Get request all
     *
     * @return array
     */
    public static function all() {
        return $_REQUEST;
    }
}