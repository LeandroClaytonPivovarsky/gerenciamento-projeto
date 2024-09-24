<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Repositories\ClientRepository;
use App\Repositories\ProjectRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    protected $repository;

    public function __construct() {
        $this->repository = new ProjectRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repository->returnAll((object) ["use" => false]);
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
        $objClient = (new ClientRepository())->findById($request->client_id);

        if(isset($objClient)){

            $obj = new Project();
            $obj->title = $request->title;
            $obj->description = $request->description;
            $obj->start_date = $request->start_date;
            $obj->end_date = $request->end_date;
            $obj->client()->associate($objClient);
            $this->repository->save($obj);
            return "<h1>salvo com sucesso</h1>";
            
        }

        return "<H1>NÃO FOI POSSÍVEL SALVAR!!</H1>";

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);
        if (isset($obj)) {
            $obj->title = $request->title;
            $obj->text = $request->description;
            $obj->end_date = $request->end_date;
            $this->repository->save($obj);
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
