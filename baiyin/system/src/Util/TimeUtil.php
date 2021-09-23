<?php

namespace App\Common\Util;


use Carbon\Carbon;
use Carbon\CarbonInterface;

class TimeUtil
{
    // time (preset) define
    const TD_EMPTY      = 0;
    const TD_NOW        = 11;
    const TD_TODAY      = 12;
    const TD_YESTERDAY  = 22;
    const TD_TOMORROW   = 32;

    // value type
    const VT_DATE       = 1;
    const VT_TIME       = 2;
    const VT_YEAR       = 11;
    const VT_YEAR_WEEK  = 12;
    const VT_MONTH      = 21;
    const VT_MONTH_WEEK = 22;
    const VT_WEEK       = 31;
    const VT_WEEK_DAY   = 32;
    const VT_DAY        = 41;
    const VT_HOUR       = 51;
    const VT_MINUTE     = 61;
    const VT_SECOND     = 71;

    // time format
    const TF_DATETIME   = 11;
    const TF_DATE       = 12;
    const TF_TIMESTAMP  = 21;

    // time unit
    const TU_DAY        = 1;
    const TU_HOUR       = 2;

    const DEF_TIME = '1980-01-01 00:00:00';

    private static function getTimeByDefine($define)
    {
        switch ($define) {
            case self::TD_NOW:
                $time = Carbon::now();
                break;
            case self::TD_TODAY:
                $time = Carbon::today();
                break;
            case self::TD_YESTERDAY:
                $time = Carbon::yesterday();
                break;
            case self::TD_TOMORROW:
                $time = Carbon::tomorrow();
                break;
            default:
                $time = Carbon::createFromFormat('Y-m-d H:i:s', $define);
                break;
        }

        return $time;
    }

    public static function time($define, $offset = [], $format = self::TF_DATETIME)
    {
        $time = self::getTimeByDefine($define);

        // execute offset
        if (count($offset) > 0) {

            if (ArrayUtil::hasKey($offset, 'year'))
                $time = $time->addYears($offset['year']);
            if (ArrayUtil::hasKey($offset, 'month'))
                $time = $time->addMonths($offset['month']);
            if (ArrayUtil::hasKey($offset, 'week'))
                $time = $time->addWeeks($offset['week']);
            if (ArrayUtil::hasKey($offset, 'day'))
                $time = $time->addDays($offset['day']);
            if (ArrayUtil::hasKey($offset, 'hour'))
                $time = $time->addHours($offset['hour']);
            if (ArrayUtil::hasKey($offset, 'minute'))
                $time = $time->addMinutes($offset['minute']);
            if (ArrayUtil::hasKey($offset, 'second'))
                $time = $time->addSeconds($offset['second']);
        }

        switch ($format) {
            case self::TF_DATETIME:
                return $time->toDateTimeString();
            case self::TF_DATE:
                return $time->toDateString();
            case self::TF_TIMESTAMP:
            default:
                return $time->timestamp;
        }
    }

    public static function diff($first, $second, $unit)
    {
        if ($first == self::DEF_TIME || $second == self::DEF_TIME)
            return 0;

        $firstCarbon = Carbon::createFromFormat('Y-m-d H:i:s', $first);
        $secondCarbon = Carbon::createFromFormat('Y-m-d H:i:s', $second);
        $defTimeCarbon = Carbon::createFromFormat('Y-m-d H:i:s', TimeUtil::DEF_TIME);

        if ($firstCarbon->equalTo($defTimeCarbon) || $secondCarbon->equalTo($defTimeCarbon))
            return 0;
        if ($firstCarbon->equalTo($secondCarbon))
            return 0;

        switch ($unit) {
            case self::TU_DAY:
                return $firstCarbon->diffInDays($secondCarbon, false);
        }

        return 0;
    }

    public static function getValue($define, $valueType)
    {
        $time = self::getTimeByDefine($define);

        switch ($valueType) {
            case self::VT_DATE:
                return $time->toDateString();
            case self::VT_TIME:
                return $time->toTimeString();
            case self::VT_YEAR:
                return $time->year;
            case self::VT_MONTH:
                return $time->month;
            case self::VT_WEEK_DAY:
                return $time->dayOfWeek;
            case self::VT_DAY:
                return $time->day;
            default:
                return 0;
        }
    }
}