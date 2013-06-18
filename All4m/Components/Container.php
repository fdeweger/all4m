<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 12:16 AM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components;


/**
 * Class Container
 * @package All4m\Components
 */
class Container
{
    private static $pimple;

    public static function set(\Pimple $pimple)
    {
        self::$pimple = $pimple;
    }

    public static function get($key)
    {
        return self::$pimple[$key];
    }

    public static function getContainer()
    {
        return self::$pimple;
    }
}