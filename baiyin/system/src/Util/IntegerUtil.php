<?php

namespace App\Common\Util;


use Illuminate\Support\Collection;

class IntegerUtil
{
    public static function isValid($var, $minValue = null, $maxValue = null)
    {
        if (!is_int($var))
            return false;

        if (is_int($minValue) && $var < $minValue)
            return false;

        if (is_int($maxValue) && $var > $maxValue)
            return false;

        return true;
    }

    public static function convertObjectsToWanYuan(Collection &$objects, $columns)
    {
        foreach ($objects as $object)
            IntegerUtil::convertObjectToWanYuan($object, $columns);
    }

    public static function convertObjectToWanYuan(&$object, $columns)
    {
        foreach ($columns as $column) {
            if (!is_null($object->$column))
                $object->$column = IntegerUtil::convertToWanYuan($object->$column);
        }
    }

    public static function convertToWanYuan($number)
    {
        $wanYuan = round($number / 10000, 2);
        return sprintf("%01.2f", $wanYuan);
    }
}