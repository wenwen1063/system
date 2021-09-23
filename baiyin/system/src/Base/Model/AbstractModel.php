<?php

namespace App\Common\Base\Model;

use App\Common\Util\ArrayUtil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

abstract class AbstractModel extends Model
{
    const CREATED_AT    = 'create_at';
    const UPDATED_AT    = 'modify_at';

    // page
    const DEF_PER_PAGE  = 10;       // default per page

    // status type
    const ST_TEMPLATE = -5; // 仅供项目模板使用，不可展示
    const ST_DELETE = -2;
    const ST_HIDDEN = -1;
    const ST_EMPTY  = 0;
    const ST_NORMAL = 1;

    // constant
    const MIN_ID = 0; // min object id
    const DEF_ID = 0; // default object id

    protected $subsetId;
    protected $objectType;
    protected $saveColumns = [];
    protected $jsonColumns = [];

    public function getSaveColumns()
    {
        return $this->saveColumns;
    }

    public function getJsonColumns()
    {
        return $this->jsonColumns;
    }

    public static function getById($id)
    {
        return self::query()
            ->find($id);
    }

    public static function getByWhere($where)
    {
        return self::query()
            ->where($where)
            ->first();
    }

    public static function getsByWhere($where = [], $columns = [], $orderByRaw = '', $limit = 30)
    {
        $builder = self::query();

        if (count($where) > 0)
            $builder->where($where);

        if (count($columns) > 0)
            $builder->select($columns);

        if (strlen($orderByRaw) > 0)
            $builder->orderByRaw($orderByRaw);

        return $builder
            ->limit($limit)
            ->get();
    }

    public static function getsByWhereRaw($whereRaw = '', $columns = [], $orderByRaw = '', $limit = 30)
    {
        $builder = self::query();

        if (strlen($whereRaw) > 0)
            $builder->whereRaw($whereRaw);

        if (count($columns) > 0)
            $builder->select($columns);

        if (strlen($orderByRaw) > 0)
            $builder->orderByRaw($orderByRaw);

        return $builder
            ->limit($limit)
            ->get();
    }

    public static function getsByWhereIn($column = '', $values = [], $orderByRaw = '', $limit = 30)
    {
        $builder = self::query();

        if (strlen($column) > 0 && count($values) > 0)
            $builder->whereIn($column, $values);

        if (strlen($orderByRaw) > 0)
            $builder->orderByRaw($orderByRaw);

        return $builder
            ->limit($limit)
            ->get();
    }

    public static function countByWhere($where = [])
    {
        $builder = self::query();

        if (count($where) > 0)
            $builder->where($where);

        return $builder
            ->count();
    }

    public static function decodesDataJson(&$models, $toStdClass = true)
    {
        foreach ($models as $model)
            self::decodeDataJson($model, $toStdClass);
    }

    public static function decodeDataJson(&$model, $toStdClass = true)
    {
        if (isset($model->data_json)) {
            $model->data = ArrayUtil::toJSONObject($model->data_json, $toStdClass);
            unset($model->data_json);
        }
    }

    /**
     * Get data array from json format.
     *
     * @return array
     */
    public function getDataJson()
    {
        return json_decode($this->getAttribute('data_json'), true);
    }

    /**
     * Set data in json format.
     *
     * @param $array
     * @param bool $replace
     * @return bool
     */
    public function setDataJson($array, $replace = false)
    {
        $data = $this->getDataJson();

        if (is_null($data))
            $data = [];

        // no different
        $diff = ArrayUtil::diff($data, $array);

        if (count($diff) < 1)
            return false;

        if ($replace) {

            $data = $array;
        }
        else {

            $data = $this->getDataJson();

            foreach ($array as $key => $value)
                $data[$key] = $value;
        }

        $this->setAttribute('data_json', json_encode($data));
        $this->save();

        return true;
    }

    /**
     * Check and set attributes (data columns) in the model.
     *
     * @param $options
     * @param array $columns
     * @return bool
     */
    public function setAttributes($options, $columns = [])
    {
        // $userId = Auth::id();
        $inputs = [];

        if (!is_array($options))
            return false;

        // global (common) columns
        $global = [
            'create_id',
            'create_by',
            'modify_id',
            'modify_by',
        ];

        // except columns
        $except = [
            $this->getKeyName(),
            'create_at',
            'modify_at',
        ];

        foreach ($options as $column => $value) {

            // except column
            if (in_array($column, $except))
                continue;

            // default value
            if (is_null($value))
                $value = '';

            // key in field, or field = [] (accept all field)
            if (in_array($column, $global) || in_array($column, $columns) || count($columns) < 1) {

                // original value
                $origValue = $this->getAttribute($column);

                // same value
                if (!is_null($origValue) && $origValue == $value)
                    continue;

                // set value
                $this->setAttribute($column, $value);
                Arr::set($inputs, $column, $value);
            }
        }

        if (count($inputs) > 0)
            return true;

        return false;
    }

    /**
     * Check and save data columns.
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = [])
    {
        $columns = $this->getSaveColumns();

        if (count($options) > 0 && count($columns) > 0) {

            // set attributes
            $modified = $this->setAttributes($options, $columns);

            // not modified
            if (!$modified)
                return false;
        }

        return parent::save();
    }
};
