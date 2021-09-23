<?php

namespace App\Common\Util;

use Psr\Log\LoggerInterface;
use Illuminate\Support\Facades\Route;

/*
 *
  debug:调试。
  info:信息
  notice:通知，注意
  warning:警告
  error:错误
  critical:危险的
  alert:弹出警告
  emergency:紧急情况，突发事件
 */

class LogUtil implements LoggerInterface {

    public function __construct($app, $config) {
        return;
    }

    public function emergency($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function alert($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function critical($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function error($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function warning($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function notice($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function info($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function debug($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function request($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function response($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function sqlr($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function sqlcud($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function sqlslow($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function redisslow($message = '', $context = array()) {
        return $this->writeLog(__METHOD__, $message, $context);
    }

    public function log($level, $message = '', $context = array()) {
        return $this->writeLog('log::' . $level, $message, $context);
    }

    public function writeLog($method, $message = '', $context = array()) {
        if (!defined('LARAVEL_LOG_ID')) {
            define('LARAVEL_LOG_ID', str_replace('.', '', uniqid('', true)) . mt_rand(10000, 99999));
        }

        $arrLevel = explode('::', $method);
        $lclevel = strtolower($arrLevel[1]);

        $path = storage_path('logs/' . $lclevel . '.' . date('Ymd') . '.log');
        //如果是error的话,要增加trace详情日志
        if ($lclevel == 'error') {
            if (isset($context['exception']) && is_object($context['exception'])) {
                if (method_exists($context['exception'], 'getTrace')) {
                    $trace_string = ' exception_trace[' . json_encode($context['exception']->getTrace()) . ']';
                }
                $path_trace = storage_path('logs/' . $lclevel . '.trace.' . date('Ymd') . '.log');
                $context2 = $context;
                unset($context2['exception']);
                file_put_contents($path_trace, $this->format($trace_string, $lclevel, $context2) . PHP_EOL, 8);
            }
        }
        return file_put_contents($path, $this->format($message, $lclevel, $context) . PHP_EOL, 8);
    }

    /**
     * 格式化日志
     * @param type $log
     * @param type $level
     * @return string
     */
    public static function format($log, $level = 'info', $context = array()) {
        if (!is_string($log)) {
            $log = json_encode($log);
        }
        $ua = '';
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $ua = $_SERVER['HTTP_USER_AGENT'];
        }
        $string = '[' . date('Y-m-d H:i:s') . '] ' . strtoupper($level) . ':';
        //执行完打印
        if ($level == 'response') {
            $total_cost = number_format(microtime(true) - request()->server('REQUEST_TIME_FLOAT'), 6) * 1000;
            $string .= ' total_cost[' . $total_cost . 'ms' . ']';
        }

        $action_name = request()->getPathInfo();
        $route = Route::getRoutes()->match(request());
        if (is_object($route) && method_exists($route, 'getAction')) {
            $arrRouteInfo = $route->getAction();
            if (isset($arrRouteInfo['controller'])) {
                $arrInfo = explode('\\', $arrRouteInfo['controller']);
                //var_dump($arrInfo);die();
                $intCount = count($arrInfo);
                if (!empty($arrInfo[$intCount - 1])) {
                    //TestController@show
                    $last = $arrInfo[$intCount - 1];
                    $arrControllerAction = explode('@', $last);
                    if (empty($arrControllerAction[1])) {
                        $arrControllerAction[1] = '';
                    }
                    $action_name = str_replace('Controller', '', $arrControllerAction[0]) . '/' . $arrControllerAction['1'];
                }
            }
        }


        $string .= ' logmsg[' . $log . ']';
        //如果是request日志，每次请求只打印一条
        if ($level == 'request') {
            $string .= ' path[' . request()->getPathInfo() . '] action_name[' . $action_name . ']'
                . ' params[' . json_encode(request()->input()) . ']'
                . ' header[' . json_encode(request()->header()) . ']';

            $string .= ' uri[' . LogVar::getURI() . ']';
            if (!empty($_SERVER["HTTP_HOST"])) {
                $string .= ' host[' . $_SERVER["HTTP_HOST"] . ']';
            }
            $string .= ' method[' . LogVar::getRequestMethod() . ']';
            $string .= ' ua[' . $ua . ']';
            $string .= ' ip[' . LogVar::getClientIp() . ']';
            if (!empty($_SERVER["SERVER_PORT"])) {
                $string .= ' server_port[' . $_SERVER["SERVER_PORT"] . ']';
            }
            if (!empty($_SERVER["SERVER_ADDR"])) {
                $string .= ' server_addr[' . $_SERVER["SERVER_ADDR"] . ']';
            }
            if (!empty($_SERVER["SERVER_NAME"])) {
                $string .= ' server_name[' . $_SERVER["SERVER_NAME"] . ']';
            }
        }
        if ($level == 'response') {
            $string .= ' path[' . request()->getPathInfo() . '] action_name[' . $action_name . ']';
            $string .= ' mysql_r_count[' . LogVar::$mysql_r_count . ']';
            $string .= ' mysql_r_cost[' . LogVar::$mysql_r_cost . ']';
            $string .= ' mysql_cud_count[' . LogVar::$mysql_cud_count . ']';
            $string .= ' mysql_cud_cost[' . LogVar::$mysql_cud_cost . ']';
            $string .= ' mysql_slow_count[' . LogVar::$mysql_slow_count . ']';
            $string .= ' mysql_slow_cost[' . LogVar::$mysql_slow_cost . ']';
            $string .= ' redis_total_count[' . LogVar::$redis_total_count . ']';
            $string .= ' redis_total_cost[' . LogVar::$redis_total_cost . ']';
            $string .= ' method[' . LogVar::getRequestMethod() . ']';
        }

        //如果有异常
        if (isset($context['exception']) && is_object($context['exception'])) {
            if (method_exists($context['exception'], 'getMessage')) {
                $string .= ' exception_msg[' . $context['exception']->getMessage() . ']';
            }
            if (method_exists($context['exception'], 'getMessage')) {

            }
            if (method_exists($context['exception'], 'getFile')) {
                $string .= ' exception_file[' . $context['exception']->getFile() . ']';
            }
            if (method_exists($context['exception'], 'getLine')) {
                $string .= ' exception_line[' . $context['exception']->getLine() . ']';
            }
        }

        $string .= ' uid[' . LogVar::$uid . '] log_id[' . LARAVEL_LOG_ID . '] log_index[' . LogVar::$logindex . ']'
            . ' context[' . json_encode($context) . ']';

        LogVar::$logindex++;
        return $string;
    }

}
