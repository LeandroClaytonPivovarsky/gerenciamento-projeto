<?php

namespace App\Policies;

use App\Facade\Permissions;


class ProjectPolicy
{

    public function hasFullPermission()
    {
        return Permissions::isAuthorized('admin.projects');
    }


    public function hasListProjectsVinculatedPermission()
    {
        return Permissions::isAuthorized('clients.projects.visualize');
    }
}
