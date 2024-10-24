<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Repositories\ClientRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    protected $repository;

    public function __construct() {
        $this->repository = new ClientRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('');
        $data= $this->repository->returnAll((object) ["use" => false]);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function register()
    {
        return view('client.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objRole = (new RoleRepository())->findFirstByColumn('name', 'CLIENT');
        
        if(isset($objRole) && isset($objProject)){
            //Create new User
            $objUser = new User();
            $objUser->name = mb_strtoupper($request->name, 'UTF-8');
            $objUser->email = mb_strtoupper($request->email, 'UTF-8');
            if (!is_null($request->cpf)) { $objUser->login= $request->cpf; }
            else if (!is_null($request->cnpj)) { $objUser->login = $request->cnpj;}
            else if (is_null($request->cpf) && !is_null($request->cnpj)){
                return "<H1>NENHUM CPF OU CNPJ INSERIDOS!!</H1>";
            }
            $objUser->password = Hash::make($request->password);
            $objUser->role()->assosiate($objRole);
            (new UserRepository())->save($objUser);
            //Create new Client

            $obj = new Client();
            $obj->name = mb_strtoupper($request->name, 'UTF-8');
            if (!is_null($request->cpf)) { $obj->cpf = $request->cpf; }
            else if (!is_null($request->cnpj)) { $obj->cnpj = $request->cnpj;}
            else if (is_null($request->cpf) && !is_null($request->cnpj)){
                return "<H1>NENHUM CPF OU CNPJ INSERIDOS!!</H1>";
            }
            $obj->email = mb_strtoupper($request->email, 'UTF-8');
            $obj->login = $request->login;
            $obj->password = $objUser->password;
            $obj->user()->associate($objUser);
            $this->repository->save($obj);
            return "Object created successfully";
        }

        return "Some error ocurred when creating a new client";


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
            $obj->name = mb_strtoupper($request->name, 'UTF-8');
            if (!is_null($request->cpf)) { $obj->cpf = $request->cpf; }
            else if (!is_null($request->cnpj)) { $obj->cnpj = $request->cnpj;}
            else if (is_null($request->cpf) && !is_null($request->cnpj)){
                return "<H1>NENHUM CPF OU CNPJ INSERIDOS!!</H1>";
            }
            $obj->email = mb_strtoupper($request->email, 'UTF-8');
            $this->repository->save($obj);
            return "Object created successfully";
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
