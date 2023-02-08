<?php

namespace App\Repositories;

abstract class CoreRepository
{

    protected $model;
    public function __construct(){
        $this->model = app($this->getModelClass());
    }
    abstract protected function getModelClass();

    protected function startConditions(){
        return clone $this->model;
    }

    public function getId($id){
        return $this->startConditions()->find($id);
    }

    /**
     * @throws \Exception
     */
    public  function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Check ID', 404);
        }
        return $id;
    }

    public function getEditId($id)
    {
        return $this->startConditions()->find($id);
    }
}
