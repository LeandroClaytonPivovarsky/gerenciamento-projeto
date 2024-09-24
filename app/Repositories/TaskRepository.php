<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskRepository extends Repository
{
    public function __construct() {
        parent::__construct(new Task());
    }

    public function returnAllByProjects($projectId, $paginate)
    {
        $data = $this->model::where('project_id', '=', $projectId)
                            ->get();

        if ($paginate->use) {
            return $data->paginate($paginate->rows);
        }
        return $data;
    }
}
