<?php

namespace App\Common\Base\Model;


use Illuminate\Http\Request;

class AbstractModelKeeper
{
    protected $model;
    protected $id;
    protected $majorModel;
    protected $majorId;
    protected $minorModel;
    protected $minorId;
    protected $request;

    public function __construct()
    {
        $this->model        = null;
        $this->id           = 0;
        $this->majorModel   = null;
        $this->majorId      = 0;
        $this->minorModel   = null;
        $this->minorId      = 0;
        $this->request      = null;
    }

    /**
     * Get the data model.
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $model;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getMajorModel()
    {
        return $this->majorModel;
    }

    /**
     * @param $majorModel
     * @return mixed
     */
    public function setMajorModel($majorModel)
    {
        $this->majorModel = $majorModel;

        return $majorModel;
    }

    /**
     * @return int
     */
    public function getMajorId(): int
    {
        return $this->majorId;
    }

    /**
     * @param int $majorId
     */
    public function setMajorId(int $majorId): void
    {
        $this->majorId = $majorId;
    }

    /**
     * @return null
     */
    public function getMinorModel()
    {
        return $this->minorModel;
    }

    /**
     * @param $minorModel
     * @return mixed
     */
    public function setMinorModel($minorModel)
    {
        $this->minorModel = $minorModel;

        return $minorModel;
    }

    /**
     * @return int
     */
    public function getMinorId(): int
    {
        return $this->minorId;
    }

    /**
     * @param int $minorId
     */
    public function setMinorId(int $minorId): void
    {
        $this->minorId = $minorId;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest($request): void
    {
        $this->request = $request;
    }

    /**
     * Set the model and empty the model id.
     *
     * @param $model
     * @return $this
     */
    public function model($model)
    {
        $this->setModel($model);

        // empty id
        $this->setId(0);

        return $this;
    }

    /**
     * Set the model id and empty the model.
     *
     * @param $id
     * @return $this
     */
    public function id($id)
    {
        $this->setId($id);

        // empty model
        $this->setModel(null);

        return $this;
    }

    /**
     * Set the major model and empty the major model id.
     *
     * @param $model
     * @return $this
     */
    public function majorModel($model)
    {
        $this->setMajorModel($model);

        // empty id
        $this->setMajorId(0);

        return $this;
    }

    /**
     * Set the major model id and empty the major model.
     *
     * @param $id
     * @return $this
     */
    public function majorId($id)
    {
        $this->setMajorId($id);

        // empty model
        $this->setMajorModel(null);

        return $this;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function request($request)
    {
        $this->setRequest($request);

        return $this;
    }
}
