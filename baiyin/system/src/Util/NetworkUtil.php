<?php

namespace App\Common\Util;


use Illuminate\Support\Facades\Log;

class NetworkUtil
{


    public static function curl($url, $method = 'GET', $options = [])
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $options); //模拟的header头
        curl_setopt($curl, CURLOPT_ENCODING, "gzip");
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);     // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($curl);
        if(curl_error($curl)){
            dd(curl_error($curl));
        }
        return $output;
    }

    /**
     * 带token远程调用
     * @param $url
     * @param string $method
     * @param array $options
     * @return bool|string
     */
    public static function curlWithToken($url, $method = 'GET', $options = [])
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (ArrayUtil::hasKey($options, 'expire_at'))
            curl_setopt($curl, CURLOPT_TIMEOUT, $options['expire_at']);//设置过期时间
        unset($options['expire_at']);
        if (ArrayUtil::hasKey($options, 'token')) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer ' . $options['token'], 'content-type: application/json'));//接口headers
            unset($options['token']);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //绕过ssl验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_ENCODING, "gzip");
        if ($method == "POST") {
            curl_setopt($curl, CURLOPT_POST, 1);

            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options, JSON_UNESCAPED_UNICODE));//data为body体
        }
        $output = curl_exec($curl);

        return $output;
    }

    /**
     *  传入数组进行HTTP POST请求
     * @param $url
     * @param array $post_data
     * @param string $header
     * @param int $timeout
     * @return bool|string
     * @author : 屈靖文
     * @date : 2021/1/20
     * @time : 17:28
     */
    public static  function curlPost($url, $post_data = array(),  $header = "" ,$timeout = 5) {
        $header = empty($header) ? [] : $header;
        $post_data=json_encode($post_data,true);
        Log::info('url',[$url,$header,$post_data]);
        $ch = curl_init();    // 启动一个CURL会话
        curl_setopt($ch, CURLOPT_URL, $url);     // 要访问的地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // 对认证证书来源的检查   // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        //curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($ch, CURLOPT_POST, true); // 发送一个常规的Post请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);     // Post提交的数据包
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);     // 设置超时限制防止死循环
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        //curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容`
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     // 获取的信息以文件流的形式返回
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); //模拟的header头
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public static function curlGet($url, $method = 'GET', $options = [])
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $options); //模拟的header头
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //绕过ssl验证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_ENCODING, "gzip");
        $output = curl_exec($curl);
        curl_close($curl);
        if ($output == false) {
            Log::info('fail_request', [$url,$method,$options]);
        }
        return $output;
    }



    /**
     * get拼接的参数
     * @param $arr array get传参的数组
     * @return string
     * @author : 屈靖文
     * @date : 2021/2/1
     * @time : 14:26
     */
    static function getSplicing($arr) {
        if (empty($arr)) return '';
        $string = '';
        $key_last = key($arr);
        foreach ($arr as $key => $value){
            if(!empty($value)){
                $string = $key . '=' . trim($value);
                if($key_last != $key){
                    $string = $string . '&';
                }
            }
        }
        return $string;
    }

    static function combineURL($baseURL,$keysArr) {
        $combined = $baseURL."?";
        $valueArr = array();

        foreach($keysArr as $key => $val){
            $valueArr[] = "$key=$val";
        }

        $keyStr = implode("&",$valueArr);
        $combined .= ($keyStr);

        return $combined;
    }

    public static function filePost($url, $options = array(), $header = "", $timeout = 5)
    {
        $header = empty($header) ? [] : $header;
        $ch = curl_init();    // 启动一个CURL会话
        curl_setopt($ch, CURLOPT_URL, $url);     // 要访问的地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // 对认证证书来源的检查   // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_POST, true); // 发送一个常规的Post请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $options);     // Post提交的数据包
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);     // 设置超时限制防止死循环
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        //curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容`
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     // 获取的信息以文件流的形式返回
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); //模拟的header头
        $result = curl_exec($ch);
        curl_close($ch);
        if ($result == false) {
            Log::info('fail_request', [$url,$options,$header]);
        }

        return $result;
    }

    /**
     * @param $url
     * @param $data
     * @param string $method
     * @param string $type
     * @param array $headers
     * @return bool|string
     */
   public static function curlDelete($url,$data,$headers=[])
    {
            $ch = curl_init();
            // 请求头，可以传数组
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);         // 执行后不直接打印出来
            curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

            curl_setopt($ch, CURLOPT_TIMEOUT, 10);  // 最大执行时间
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);  // 最大执行时间
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 不从证书中检查SSL加密算法是否存在
            $output = curl_exec($ch); //执行并获取HTML文档内容
            curl_close($ch); //释放curl句柄
            return $output;
    }

}
