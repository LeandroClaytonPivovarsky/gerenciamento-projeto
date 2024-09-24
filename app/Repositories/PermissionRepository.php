<?php

namespace App\Repositories;

use App\Models\Permission;
use Exception;
use Illuminate\Support\Facades\DB;

class PermissionRepository extends Repository
{



    public function __construct() {
        parent::__construct(new Permission());
    }

    public function updateCompositeId($keys, $ids, $table, $values)
    {
        try {
            DB::table($table)->where($this->createRule($keys, $ids))->update($values);
            return true;
        } catch (Exception $e) {
            dd($e);
        }
        return false;
    }

    public function deleteCompositeId($keys, $ids, $table){
        try {
            DB::table($table)->where($this->createRule($keys,$ids))->delete();
            return true;
        } catch (Exception $e) {
            dd($e);
        }
        return false;
    }

    public function findByCompositeIdWith($keys, $ids, $orm) {
        return $this->model::with($orm)->where($this->createRule($keys, $ids))->first();
    }

    public function findByCompositeId($keys, $ids) {
        return $this->model::where($this->createRule($keys, $ids))->first();
    }

    //Function utilized to transform the IDs from string to int
    public function createRule($keys, $ids)
    {
        $arr = array();
        for($i = 0; $i < count($ids); $i++) {
            $arr[$i] = [$keys[$i], $ids[$i]];
        }
        return $arr;
    }

}
