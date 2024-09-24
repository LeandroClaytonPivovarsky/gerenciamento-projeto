<?php

namespace App\Policies;

use App\Facade\Permissions;


class UserPolicy
{
    public function hasFullPermission()
    {
        return Permissions::isAuthorized('admin.workers');
    }
}
