<?php

use Illuminate\Support\Facades\Facade;

class PermissionsFacade extends Facade 
{
    protected static function getFacadeAccessor()
    {
        return 'permissions';
    }

    
}
