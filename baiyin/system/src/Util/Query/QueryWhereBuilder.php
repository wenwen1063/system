<?php

namespace App\Common\Util\Query;


use App\Common\Util\ArrayUtil;
use App\Common\Util\StringUtil;

class QueryWhereBuilder
{
    protected $where;
    protected $whereIn;
    protected $whereRaw;

    // input var
    protected $tableName;
    protected $inputArray;
    protected $inputKeys;
    protected $tableNames;
    protected $whereKeys;
    protected $valueTypes;
    protected $minValues;

    /**
     * Create a new query where builder instance.
     *
     * @return void
     */
    public function __construct()
    {
        // query
        $this->where    = [];
        $this->whereIn  = [];
        $this->whereRaw = [];

        // input params
        $this->tableName    = '';
        $this->inputArray   = [];
        $this->inputKeys    = [];
        $this->tableNames   = [];
        $this->whereKeys    = [];
        $this->valueTypes   = [];
        $this->minValues    = [];
    }

    /**
     * @param $tableName
     * @return $this
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * @param $inputArray array
     * @return $this
     */
    public function setInputArray($inputArray)
    {
        $this->inputArray = $inputArray;

        return $this;
    }

    /**
     * @param $where
     * @return $this
     */
    public function setWhere($where)
    {
        $this->where = $where;

        return $this;
    }

    /**
     * Begin from the input array.
     *
     * @param $inputArray array
     * @return $this
     */
    public static function input($inputArray)
    {
        return (new static)->setInputArray($inputArray);
    }

    /**
     * @param $tableName
     * @return QueryWhereBuilder
     */
    public function table($tableName)
    {
        return $this->setTableName($tableName);
    }

    /**
     * @param $where
     * @return QueryWhereBuilder
     */
    public function where($where)
    {
        return $this->setWhere($where);
    }

    /**
     * Pick param value of each key.
     *
     * @param array $inputKeys
     * @param array $valueTypes
     * @param array $tableNames
     * @param array $whereKeys
     * @param array $minValues
     * @return $this
     */
    public function keys($inputKeys, $valueTypes, $tableNames, $whereKeys, $minValues)
    {
        foreach ($inputKeys as $index => $inputKey) {

            // value of each key
            $valueType  = count($valueTypes) > $index ? $valueTypes[$index] : TYPE_STR;
            $tableName  = count($tableNames) > $index ? $tableNames[$index] : '';
            $whereKey   = count($whereKeys) > $index ? $whereKeys[$index] : '';
            $minValue   = count($minValues) > $index ? $minValues[$index] : 0;

            // pick key
            $this->key($inputKey, $valueType, $tableName, $whereKey, $minValue);
        }

        return $this;
    }

    /**
     * Pick param value of the key.
     *
     * @param string $inputKey
     * @param int $valueType
     * @param string $tableName
     * @param string $whereKey
     * @param int $minValue
     * @return QueryWhereBuilder $this
     */
    public function key($inputKey, $valueType = TYPE_INT, $tableName = '', $whereKey = '', $minValue = 0)
    {
        if (!ArrayUtil::hasKey($this->inputArray, $inputKey))
            return $this;

        // member var
        $inputArray = $this->inputArray;
        $where = $this->where;

        // set table name
        if (strlen($tableName) < 1 && strlen($this->tableName) > 0)
            $tableName = $this->tableName;

        // set key
        $key = $inputKey;
        if (strlen($whereKey) > 0)
            $key = $whereKey;
        if (strlen($tableName) > 0)
            $key = sprintf("%s.%s", $tableName, $key);

        // get value
        $inputValue = $inputArray[$inputKey];

        switch ($valueType) {
            case TYPE_INT:
                {
                    $value = StringUtil::toInt($inputValue);

                    if ($value <= $minValue)
                        return $this;

                    $where[$key] = $value;

                    break;
                }
            case TYPE_BOOL:
                {
                    $value = StringUtil::toBool($inputValue);

                    $where[$key] = $value;

                    break;
                }
            case TYPE_STR:
                {
                    $value = StringUtil::toStr($inputValue);

                    if (strlen($value) < 1)
                        return $this;

                    array_push($where, [$key, 'LIKE', "%$value%"]);

                    break;
                }
            case TYPE_DATE:
                {
                    $value = StringUtil::toStr($inputValue);

                    if (strlen($value) < 8)
                        return $this;

                    $where[$key] = $value;

                    break;
                }
        }

        return $this->setWhere($where);
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->where;
    }
}