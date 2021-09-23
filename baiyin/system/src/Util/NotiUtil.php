<?php

namespace App\Common\Util;

use JPush\Client as JPush;

class NotiUtil
{
    public static function push()
    {
        $client = new JPush();
        // $push = $client->push();
    }

}