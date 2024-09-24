<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;


class Repository{

    protected $rows = 6;

    protected Model $model;

    protected function __construct(object $model) {
        $this->model = $model;
    }

    

    public function returnAll(object $paginate){
        if ($paginate->use) {
            return $this->model->paginate->rows;
        }
        
        return $this->model->all();
    }

    public function returnAllWith(array $orm, object $paginate)
    {
        if ($paginate->use) {
            return $this->model::with($orm)->paginate($paginate->rows);
        }
        return $this->model::with($orm)->get();
    }

    public function findById($id){
        return $this->model->find($id);
    }

    public function findByIdWith(array $id, $orm){

        return $this->model::with($orm)->find($id);
    }

    
    public function findFirstByColumn($column, $value) {
        return $this->model->where($column, $value)->first();
    }

    
    public function findByColumn($column, $value, object $paginate) {
        if($paginate->use) 
            return $this->model->where($column, $value)->paginate($paginate->rows);

        return $this->model->where($column, $value)->get();
    }

    public function findByColumnWith($column, $value, $orm, object $paginate) {
        if($paginate->use) 
            return $this->model::with($orm)->where($column, $value)->paginate($paginate->rows);
        
        return $this->model::with($orm)->where($column, $value)->get();
    }

    public function save($obj)
    {
        try {
            $this->save($obj);
            return true;
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function saveAndReturnId($obj)
    {
        try {
            $this->save($obj);
            return $obj->id;
        } catch (Exception $e) {
            dd($e);
        }
    }



    public function delete($id)
    {
        $obj = $this->findById($id);
        if(isset($obj)){
            try {
                $obj->delete();
                return true;
            } catch (Exception $e) {
                dd($e);
            }
        }
        return false;
    }

    public function restore($id)
    {
        $obj = $this->findById($id);
        if(isset($obj)){
            try {
                $obj->restore();
                return true;
            } catch (Exception $e) {
                dd($e);
            }
        }
        return false;
    }

    public function getRows()
    {
        return $this->rows;
    }

}