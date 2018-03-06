<?php
namespace lib;

class Registry {

    private static $objects = [];

    public static function get($name)
    {
        if (!array_key_exists($name, self::$objects)) {
            self::$objects[$name] = new $name;
        }

        return self::$objects[$name];
    }

    public static function set($obj, $name = null)
    {
        if (!$name) {
            $name = get_class($obj);
        }

        self::$objects[$name] = $obj;
    }

}
