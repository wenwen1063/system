<?php

namespace App\Common\Util;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ArrayUtil
{
    const COND_AND  = 0x01;
    const COND_OR   = 0x02;

    public static function pick($array, $key, $defValue = '', $type = TYPE_NULL, $maxValue = 0)
    {
        // default
        $value = $defValue;

        // in array
        if (is_array($array) && count($array) > 0 && array_key_exists($key, $array))
            $value = $array[$key];

        switch ($type) {
            case TYPE_INT:
                {
                    $value = StringUtil::toInt($value);

                    if ($maxValue > 0 && $value > $maxValue)
                        $value = $maxValue;

                    break;
                }
            case TYPE_FLOAT:
                {
                    $value = StringUtil::toFloat($value);

                    if ($maxValue > 0 && $value > $maxValue)
                        $value = $maxValue;

                    break;
                }
            case TYPE_BOOL:
                {
                    $value = StringUtil::toBool($value);
                    break;
                }
            case TYPE_STR:
                {
                    $value = StringUtil::toStr($value);
                    break;
                }
        }

        return $value;
    }

    public static function pickArray($srcArray, $keys)
    {
        $destArray = [];

        foreach ($keys as $key) {
            if (array_key_exists($key, $srcArray))
                $destArray[$key] = $srcArray[$key];
        }

        return $destArray;
    }

    public static function merges($refArray, $destArray, $keys)
    {
        if (!is_array($refArray))
            return $destArray;

        if (!is_array($destArray))
            $destArray = [];

        foreach ($keys as $key) {
            if (array_key_exists($key, $refArray)) {

                $value = $refArray[$key];

                if (!is_null($value) && ($value != ''))
                    $destArray[$key] = $value;
            }
        }

        return $destArray;
    }

    public static function pickArrayFromModel(Model &$srcModel, $keys)
    {
        $srcArray = $srcModel->getAttributes();
        $destArray = [];

        foreach ($keys as $key) {
            if (array_key_exists($key, $srcArray))
                $destArray[$key] = $srcArray[$key];
        }

        return $destArray;
    }

    public static function makeArrayFromModel($destArray, Model &$refModel, $keys)
    {
        return self::setArrayFromModel($destArray, $refModel ,$keys);
    }

    public static function setArrayFromModel(&$destArray, Model &$refModel, $keys)
    {
        $srcArray = $refModel->getAttributes();

        foreach ($keys as $key) {
            if (array_key_exists($key, $srcArray))
                $destArray[$key] = $srcArray[$key];
        }

        return $destArray;
    }

    public static function setModelFromArray(Model &$destModel, $refArray, $keys, $defValue = null)
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $refArray))
                $destModel->setAttribute($key, $refArray[$key]);
            else {
                if (!is_null($defValue))
                    $destModel->setAttribute($key, $defValue);
            }
        }
    }

    public static function copyBetweenModel(Model $refModel, Model $destModel, $keys, $defValue = null)
    {
        foreach ($keys as $key) {

            $value = $refModel->getAttribute($key);

            if (isset($value))
                $destModel->setAttribute($key, $value);
            else {
                if (!is_null($defValue))
                    $destModel->setAttribute($key, $defValue);
            }
        }
    }

    public static function picksInnerKeyValues($srcArray, $key, $values)
    {
        $destArray = [];

        // put values
        foreach ($srcArray as $element) {
            foreach ($values as $value) {
                if ($element[$key] == $value) {
                    array_push($destArray, $element);
                    break;
                }
            }
        }

        return $destArray;
    }

    public static function pickInnerKeyValue($srcArray, $key, $value, $destKey = '')
    {
        $destArray = [];

        // get element
        foreach ($srcArray as $element) {
            if ($element[$key] == $value) {
                $destArray = $element;
                break;
            }
        }

        if (strlen($destKey) > 1)
            return array_key_exists($destKey, $destArray) ? $destArray[$destKey] : '';

        return $destArray;
    }

    public static function countElementArray($array)
    {
        $count = 0;
        foreach ($array as $element) {

            if (!is_array($element))
                continue;

            $elementCount = count($element);

            if ($elementCount < 1)
                continue;

            // check if equal
            if ($count > 0 && $elementCount != $count)
                return -1;
            else
                $count = $elementCount;
        }

        return $count;
    }

    public static function setDefault(&$destArray, $keys, $values)
    {
        if (!is_array($destArray))
            $destArray = [];

        for ($i=0; $i<count($keys); $i++) {

            $key = $keys[$i];
            $value = $values[$i];

            if (!array_key_exists($key, $destArray) || is_null($destArray[$key]))
                $destArray[$key] = $value;
        }

        return $destArray;
    }

    /**
     * Set multiple key & value in the array.
     *
     * @param $array
     * @param $keys
     * @param $values
     */
    public static function set(&$array, $keys, $values): void
    {
        if (!isset($array) || !is_array($array))
            $array = [];

        for ($i=0; $i<count($keys); $i++) {

            $key = $keys[$i];
            $value = $values[$i];

            $array[$key] = $value;
        }
    }

    /**
     * Set multiple key & value in the model.
     *
     * @param Model $model
     * @param $keys
     * @param $values
     */
    public static function setModel(Model &$model, $keys, $values): void
    {
        if (is_null($model))
            return;

        for ($i=0; $i<count($keys); $i++) {

            $key = $keys[$i];
            $value = $values[$i];

            $model->setAttribute($key, $value);
        }
    }

    public static function make($srcArray, $refArray, $unsetKeys = [])
    {
        if (!is_array($srcArray))
            $srcArray = [];

        // copy
        $destArray = $srcArray;

        foreach ($refArray as $key => $value)
            $destArray[$key] = $value;

        if (count($unsetKeys) > 0)
            ArrayUtil::unset($destArray, $unsetKeys);

        return $destArray;
    }

    public static function unset(&$array, $keys)
    {
        Arr::forget($array, $keys);
    }

    public static function fillModel(Model &$model, $keys, $fillValue)
    {
        foreach ($keys as $key)
            $model->setAttribute($key, $fillValue);
    }

    public static function merge(...$vars)
    {
        $array = [];
        foreach ($vars as $var) {

            if (is_int($var) || is_float($var) || is_string($var) || is_bool($var))
                array_push($array, $vars);

            if (is_array($var) && count($var) > 0)
                $array = array_merge($array, $var);
        }
        return $array;
    }

    public static function push(&$array, $var)
    {
        array_push($array, $var);
    }

    public static function pull(&$array, $key)
    {
        Arr::pull($array, $key);
        return array_values($array);
    }

    public static function removeValue($array, $value)
    {
        $key = array_search($value, $array);

        // found
        if ($key != false)
            array_splice($array , $key, 1);

        return $array;
    }

    public static function replace($destArray, $refArray, $exceptKeys = [])
    {
        $globalKeys = ['create_id', 'create_by', 'create_at', 'modify_by'];
        $exceptKeys = array_merge($exceptKeys, $globalKeys);

        foreach ($refArray as $key => $value) {

            // ignore (hidden) elements
            if (in_array($key, $exceptKeys))
                continue;

            if (array_key_exists($key, $destArray))
                $destArray[$key] = $value;
        }

        return $destArray;
    }

    public static function diff($srcArray, $refArray, $except = [])
    {
        $diff = [];

        foreach ($refArray as $key => $value) {

            // ignore (hidden) elements
            if (in_array($key, $except))
                continue;

            // ignore same
            if (array_key_exists($key, $srcArray) && $srcArray[$key] == $value)
                continue;

            $diff[$key] = $value;
        }

        return $diff;
    }

    public static function diffModel(Model &$srcModel, Model &$refModel, $diffKeys = [])
    {
        $diff = [];

        foreach ($diffKeys as $key) {

            $srcValue = $srcModel->getAttribute($key);
            $refValue = $refModel->getAttribute($key);

            if ($srcValue == $refValue)
                continue;

            $diff[$key] = $srcValue;
        }

        return $diff;
    }

    public static function isValid($array)
    {
        if (!isset($array))
            return false;

        if (is_null($array))
            return false;

        if (!is_array($array))
            return false;

        if (count($array) < 1)
            return false;

        return true;
    }

    public static function hasKeys($array, $keys = [], $cond = self::COND_AND)
    {
        if (!is_array($array))
            return false;

        if (is_string($keys))
            $keys = [$keys];

        if (!is_array($keys))
            return false;

        foreach ($keys as $key) {
            if (array_key_exists($key, $array)) {
                if ($cond == ArrayUtil::COND_OR)
                    return true;
                else
                    continue;
            }
            else
                return false;
        }

        return true;
    }

    public static function hasKey($array, $key)
    {
        if (!is_array($array))
            return false;

        if (!is_string($key))
            return false;

        if (array_key_exists($key, $array))
            return true;

        return false;
    }

    public static function hasValues($array, $values, $cond = self::COND_AND)
    {
        if (!is_array($array))
            return false;

        if (!is_array($values))
            return false;

        foreach ($values as $value) {
            if (in_array($value, $array)) {
                if ($cond == self::COND_OR)
                    return true;
                else
                    continue;
            }
            else
                return false;
        }

        return true;
    }

    public static function hasValue($array, $value)
    {
        if (!is_array($array))
            return false;

        if (in_array($value, $array))
            return true;

        return false;
    }

    public static function sumsValues($srcArrays, &$destArray, $keys, $decKeys = [], $decDigits = 0)
    {
        if (is_null($destArray))
            $destArray = [];

        foreach ($srcArrays as $srcArray)
            ArrayUtil::sumValues($srcArray, $destArray, $keys);

        // set decimal digits
        if (count($decKeys) > 0 && $decDigits > 0)
            ArrayUtil::setsDecimal($destArray, $decKeys, $decDigits);

        return $destArray;
    }

    public static function sumValues($srcArray, &$destArray, $keys)
    {
        // sum values
        foreach ($keys as $key) {

            // default src value
            if (!array_key_exists($key, $srcArray))
                $srcArray[$key] = 0;

            // default dest value
            if (!array_key_exists($key, $destArray))
                $destArray[$key] = 0;

            // sum value
            $destArray[$key] += $srcArray[$key];
        }

        return $destArray;
    }

    public static function setsDecimal(&$destArray, $decKeys, $decDigits = 2)
    {
        foreach ($decKeys as $key) {
            if (array_key_exists($key, $destArray))
                $destArray[$key] = sprintf("%01.2f", $destArray[$key]);
        }

        return $destArray;
    }

    public static function fillValues($keys, $value)
    {
        $destArray = [];

        foreach ($keys as $key)
            $destArray[$key] = $value;

        return $destArray;
    }

    public static function fillModelValues(Model &$model, $keys, $value)
    {
        foreach ($keys as $key)
            $model->setAttribute($key, $value);

        return $model;
    }

    public static function toJSONObject($json, $toStdClass = true)
    {
        if ($json == '[]' || $json == '{}' || $json == 'null' || strlen($json) == 0) {
            if ($toStdClass)
                $object = new \stdClass();
            else
                $object = [];
        }
        else
            $object = json_decode($json, true);

        return $object;
    }
}
