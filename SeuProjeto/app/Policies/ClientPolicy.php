<?php

namespace App\Policies;

use App\Facade\Permissions;

class ClientPolicy
{

    public function hasFullPermission()
    {
        return Permissions::isAuthorized('admin.clients');
    }

}
