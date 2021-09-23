<?php

namespace App\Common\Util;

use Overtrue\Pinyin\Pinyin;

class StringUtil
{
    /**
     * Convert the input to bool value.
     *
     * @param $input
     * @return bool
     */
    public static function toBool($input)
    {
        if ($input === 'true')
            return true;
        if ($input === 'false')
            return false;

        return boolval($input);
    }

    /**
     * Convert the input to integer value.
     *
     * @param $input
     * @param $maxValue
     * @param $minValue
     * @return int|null
     */
    public static function toInt($input, $maxValue = null, $minValue = null)
    {
        $value = intval($input);

        // check max & min
        if ($maxValue != null && $value > $maxValue)
            $value = $maxValue;
        if ($minValue != null && $value < $minValue)
            $value = $minValue;

        return $value;
    }

    /**
     * Convert the input to float value.
     *
     * @param $input
     * @param $maxValue
     * @param $minValue
     * @return float|null
     */
    public static function toFloat($input, $maxValue = null, $minValue = null)
    {
        $value = floatval($input);

        // check max & min
        if ($maxValue != null && $value > $maxValue)
            $value = $maxValue;
        if ($minValue != null && $value < $minValue)
            $value = $minValue;

        return $value;
    }

    /**
     * Convert the input to string value.
     *
     * @param $input
     * @return string
     */
    public static function toStr($input)
    {
        return trim(strval($input));
    }

    /**
     * Convert the string to standard json by replace some names & symbols.
     *
     * @param string $string
     * @return mixed|string
     */
    public static function toStandardJSON(string $string)
    {
        $string = str_replace("'", '"', $string);
        $string = str_replace("True", 'true', $string);
        $string = str_replace("False", 'false', $string);
        return $string;
    }

    /**
     * Convert the string to Chinese pinyin in array.
     *
     * @param string $string
     * @param bool $isName
     * @return array
     */
    public static function toPinyinArray(string $string, $isName = false)
    {
        $pinyin = new Pinyin();

        if ($isName) {
            $array = $pinyin->name($string);
        }
        else {
            $array = $pinyin->convert($string);
        }

        return $array;
    }

    /**
     * Get hash of the string.
     *
     * @param string $string
     * @param string $algo
     * @return string
     */
    public static function hash(string $string, $algo = '')
    {
        // get default algo
        if ($algo === '')
            $algo = config("define.HASH_ALGO");

        return hash($algo, $string);
    }

    /**
     * Get random string from numbers, letters and symbols.
     *
     * @param int $length
     * @param bool $md5
     * @return bool|string
     */
    public static function getRandom($length = 32, $md5 = true)
    {
        # Seed random number generator
        # Only needed for PHP versions prior to 4.2
        mt_srand((double)microtime()*1000000);

        # Array of characters, adjust as desired
        $chars = array(
            'Q', '@', '8', 'y', '%', '^', '5', 'Z', '(', 'G', '_', 'O', '`',
            'S', '-', 'N', '<', 'D', '{', '}', '[', ']', 'h', ';', 'W', '.',
            '/', '|', ':', '1', 'E', 'L', '4', '&', '6', '7', '#', '9', 'a',
            'A', 'b', 'B', '~', 'C', 'd', '>', 'e', '2', 'f', 'P', 'g', ')',
            '?', 'H', 'i', 'X', 'U', 'J', 'k', 'r', 'l', '3', 't', 'M', 'n',
            '=', 'o', '+', 'p', 'F', 'q', '!', 'K', 'R', 's', 'c', 'm', 'T',
            'v', 'j', 'u', 'V', 'w', ',', 'x', 'I', '$', 'Y', 'z', '*'
        );

        # Array indice friendly number of chars;
        $numChars = count($chars) - 1;
        $token = '';

        # Create random token at the specified length
        for ($i=0; $i<$length; $i++)
            $token .= $chars[ mt_rand(0, $numChars)];

        # Should token be run through md5
        if ($md5) {

            # Number of 32 char chunks
            $chunks = ceil(strlen($token) / 32);
            $md5token = '';

            # Run each chunk through md5
            for ($i=1; $i<=$chunks; $i++)
                $md5token .= md5(substr($token, $i * 32 - 32, 32));

            # Trim the token
            $token = substr($md5token, 0, $length);
        }

        return $token;
    }

    /**
     * Get file name in the url.
     *
     * @param $url
     * @return mixed
     */
    public static function getURLFileName($url)
    {
        $array = explode("/", $url);
        return array_pop($array);
    }

    /**
     * Get file extension name in the url.
     *
     * @param $url
     * @return mixed
     */
    public static function getURLFileExt($url)
    {
        $array = explode(".", $url);
        return array_pop($array);
    }

    /**
     * @param string $string
     * @param string $separator
     * @return string
     */
    public static function camelize(string $string, $separator = '_')
    {
        $string = $separator. str_replace($separator, " ", strtolower($string));
        return ltrim(str_replace(" ", "", ucwords($string)), $separator );
    }

    /**
     * @param string $string
     * @param string $separator
     * @return string
     */
    public static function uncamelize(string $string, $separator = '_')
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $string));
    }

    /**
     * @param $originStr
     * @param $appendItem
     * @return string
     */
    public static function fomattedAppend($originStr, $appendItem)
    {
        $array = explode(',', $originStr);
        return implode(',', array_push($array, $appendItem));
    }

}