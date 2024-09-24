<?php

namespace App\Policies;

use App\Facade\Permissions;

class RolePolicy
{
    public function isAdmin()
    {
        return Permissions::isAuthorized('admin');
    }

    public function isWorker()
    {
        return Permissions::isAuthorized('worker');
    }

    public function isClient()
    {
        return Permissions::isAuthorized('client');
    }
}
