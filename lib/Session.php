<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 13.03.2018
 * Time: 20:24
 */

namespace lib;


class Session
{
    public function set($name, $val)
    {
        $_SESSION[$name] = $val;
    }

    public function get($name, $remove = false)
    {
        $val = @$_SESSION[$name];
        if ($remove) {
            unset($_SESSION[$name]);
        }

        return $val;
    }

    private static $instance;

    private function __construct() {}

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}