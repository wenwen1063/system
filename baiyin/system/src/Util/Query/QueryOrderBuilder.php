<?php

namespace App\Common\Util\Query;


use App\Common\Util\ArrayUtil;

class QueryOrderBuilder
{
    protected $tableName;
    protected $acceptKeys;
    protected $orderBys;

    /**
     * Create a new query order builder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tableName    = '';
        $this->acceptKeys   = [];
        $this->orderBys     = [];
    }

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
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
     * @return array
     */
    public function getAcceptKeys(): array
    {
        return $this->acceptKeys;
    }

    /**
     * @param $acceptKeys
     * @return $this
     */
    public function setAcceptKeys($acceptKeys)
    {
        $this->acceptKeys = is_array($acceptKeys) ? $acceptKeys : func_get_args();

        return $this;
    }

    /**
     * @return array
     */
    public function getOrderBys(): array
    {
        return $this->orderBys;
    }

    /**
     * @param $orderBys
     * @return $this
     */
    public function setOrderBys($orderBys)
    {
        $this->orderBys = $orderBys;

        return $this;
    }

    /**
     * Begin from the default order by array.
     *
     * @param $orderBys array
     * @return QueryOrderBuilder
     */
    public static function default($orderBys)
    {
        return (new static)->setOrderBys($orderBys);
    }

    /**
     * @param $acceptKeys
     * @return QueryOrderBuilder
     */
    public function accept($acceptKeys)
    {
        return $this->setAcceptKeys($acceptKeys);
    }

    /**
     * @param $orders
     * @return QueryOrderBuilder
     */
    public function orders($orders)
    {
        $tableName  = $this->getTableName();
        $orderBys   = $this->getOrderBys();
        $acceptKeys = $this->acceptKeys;

        if (!ArrayUtil::isValid($orders))
            return $this;

        foreach ($orders as $order) {

            // field and asc
            $field  = ArrayUtil::pick($order, 'field', '', TYPE_STR);
            $asc    = ArrayUtil::pick($order, 'asc', true, TYPE_BOOL);

            if (in_array($field, $acceptKeys)) {

                if (strlen($tableName) > 0)
                    $field = sprintf("%s.%s", $tableName, $field);

                if ($asc)
                    $orderBy = $field;
                else
                    $orderBy = sprintf("%s DESC", $field);

                array_unshift($orderBys, $orderBy);
            }
        }

        return $this->setOrderBys($orderBys);
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->orderBys;
    }

    /**
     * @return string
     */
    public function getRaw()
    {
        $orderBys = $this->getOrderBys();

        return count($orderBys) > 0 ? implode(', ', $orderBys) : '';
    }
}
