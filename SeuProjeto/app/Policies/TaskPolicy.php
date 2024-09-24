<?php

namespace App\Policies;

use App\Facade\Permissions;


class TaskPolicy
{
    public function hasFullPermission()
    {
        return Permissions::isAuthorized('admin.tasks');
    }

    public function hasSwitchStatusPermission()
    {
        return Permissions::isAuthorized('worker.tasks.status');
    }

    public function hasVisualizeTaskPermission()
    {
        return Permissions::isAuthorized('client.tasks.visualize');
    }
}
