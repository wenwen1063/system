<?php

namespace App\Common\Util;

class LogVar {

    public static $init;
    public static $logdays = 30;
    public static $objMonolog;
    public static $logindex = 1;
    public static $uid;
    public static $mysql_r_count = 0;
    public static $mysql_cud_count = 0;
    public static $mysql_r_cost = 0;
    public static $mysql_cud_cost = 0;
    public static $mysql_slow_count = 0;
    public static $mysql_slow_cost = 0;
    public static $redis_total_count = 0;
    public static $redis_total_cost = 0;

    public static function setUid($uid) {
        self::$uid = $uid;
    }

    public static function getRequestMethod() {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            return $_SERVER['REQUEST_METHOD'];
        }
        return 'Undefined';
    }

    public static function getURI() {
        if (!isset($_SERVER['REQUEST_URI'])) {
            return false;
        } else {
            $strRequestURI = $_SERVER['REQUEST_URI'];
        }
        return $strRequestURI;
    }

    public static function getClientIp() {
        $uip = '';
        if (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
            $uip = getenv('HTTP_X_FORWARDED_FOR');
            strpos($uip, ',') && list($uip) = explode(',', $uip);
        } else if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
            $uip = getenv('HTTP_CLIENT_IP');
        } else if (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
            $uip = getenv('REMOTE_ADDR');
        } else if (getenv('HTTP_REMOTEIP') && strcasecmp(getenv('HTTP_REMOTEIP'), 'unknown')) {
            $uip = getenv('HTTP_REMOTEIP');
        } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
            $uip = $_SERVER['REMOTE_ADDR'];
        }
        return $uip;
    }

}
