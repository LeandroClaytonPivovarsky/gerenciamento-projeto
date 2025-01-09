<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use AuthorizesRequests;

    protected $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('hasFullPermission', User::class);
        $data = $this->repository->returnAllWith(
            ['role'],
            (object) ["use" => true, "rows" => $this->repository->getRows()]
        );
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Will return the user view to create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objRole = (new RoleRepository)->findById($request->role_id);

        if (isset($objRole)) {
            $obj = new User();
            $obj->name = mb_strtoupper($request->name, 'UTF-8');
            $obj->email = mb_strtoupper($request->email, 'UTF-8');
            $obj->login = $request->login;
            $obj->password = Hash::make($request->password);
            $obj->role()->associate($objRole);
            $this->repository->save($obj);
            return "<H1> NEW USER REGISTERED SUCESSFULLY</H1>";

        }
        return "CANNOT REGISTER A NEW USER";
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
        //Will return the user view to edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);
        $objRole = (new RoleRepository())->findById($request->role_id);
        
        if(isset($obj) && isset($objRole)) {
            $obj->name = mb_strtoupper($request->nome, 'UTF-8');
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password); 
            $obj->role()->associate($objRole);
            $this->repository->save($obj);
            return "<H1> SUCESS TO UPDATE USER!!</H1>";
        }
        return "<H1>NOT POSSIBLE TO UPDATE THIS USER</H1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nome = (new RoleRepository())->findById($this->repository->findById($id)->role_id)->nome;
        if($this->repository->delete($id))  {
            return redirect()->route('users.role', $nome);
        }
    }

    
    public function getUsersByRole($role) {
        $role = mb_strtoupper($role, 'UTF-8');
        $objRole = (new RoleRepository())->findFirstByColumn("nome", $role);
        $data = $this->repository->findByColumn(
            'role_id', 
            $objRole->id,
            (object) ["use" => true, "rows" => $this->repository->getRows()]
        );
        return $data;
    }
}
