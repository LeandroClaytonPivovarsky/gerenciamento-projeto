<?php

namespace App\Facade;

use App\Repositories\PermissionRepository;

class Permissions 
{
    public static function loadPermissions($user_role)
    {
        $arr_permissions = Array();
        $permissionsData = (new PermissionRepository())->
                        findByColumnWith('role_id', $user_role, ['resource'], (object) ['paginate' => false]);
        foreach($permissionsData as $permission){
            $arr_permissions[$permission->resource->name] = (boolean) $permission->permission;
        }

    }

    public static function isAuthorized($resource)
    {
        $permissions = session('user_permissions');
        return array_key_exists($resource, $permissions);
    }

    public static function teste()
    {
        return "<h1>PermissionsFacade-Running</h1>";
    }
}
