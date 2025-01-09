<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    use AuthorizesRequests;

    private TaskRepository $repository;

    public function __construct() {
        $repository = new TaskRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index($idProject)
    {

        $this->authorize("HasFullPermission", Task::class);
        return $this->repository->returnAllByProjects(
            $idProject,
        ["use" => true, $this->repository->getRows()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objProject = (new ProjectRepository)->findById($request->project_id);
        $objUser = (new UserRepository)->findById($request->user_id);

        if (isset($objProject) && isset($objUser)) {
            $obj = new Task();
            $obj->title = $request->title;
            $obj->description = $request->description;
            $obj->status = $request->status;
            $obj->start_date = $request->start_date;
            $obj->end_date = $request->end_date;
            $obj->project()->associate($objProject);
            $obj->user()->associate($objUser);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->repository->findById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);

        if (isset($obj)) {
            $objProject = (new ProjectRepository)->findById($id);
            $objUser = (new UserRepository)->findById($id);

            if (isset($objProject) && isset($objUser)) {
                $obj->title = $request->title;
                $obj->description = $request->description;
                $obj->status = $request->status;
                $obj->start_date = $request->start_date;
                $obj->end_date = $request->end_date;
                $obj->user()->associate($objUser);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obj = $this->repository->findById($id);

        if (isset($obj)) {
            $this->repository->delete($obj);
        }
    }
}
