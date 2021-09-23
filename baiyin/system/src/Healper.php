<?php
/**
 * Created by 百映.
 * @author : 屈靖文
 * @date : 2021/5/20
 * @time : 9:47
 */
namespace App\Common;

class Healper{
    /**
     * 16进制解码
     * @param $hex
     * @return string
     * @author : 屈靖文
     * @date : 2021/1/25
     * @time : 14:43
     */
  public  function Hex2String($hex): string
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }
        return $string;
    }

    /**
     * @param $data
     * @param $key
     * @param $order int  SORT_ASC SORT_DESC
     * @author : 屈靖文
     * @date : 2021/8/10
     * @time : 14:42
     */
   public static function twoArrayOrder($data,$key,$order){
        $keyName = array_column($data,$key);
        array_multisort($keyName,$order,$data);
        return $data;
    }
}





