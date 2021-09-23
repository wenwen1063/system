<?php

namespace App\Common\Base\Object;


trait Singletonable
{
    protected static $instance = null;

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }
}