<?php

namespace App\Listeners;

use App\Events\login;
use App\Facade\Permissions;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        Permissions::loadPermissions(Auth::user()->role_id);
    }
    
}
