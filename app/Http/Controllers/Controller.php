<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Checks if a session exists for the current user.
     *
     * @return \Illuminate\Http\Response
     */
    public function userIsAuthenticated()
    {
        if( session('userId') !== null && !empty(session('userId')))
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * Checks if the current user is an admin in the current session.
     *
     * @return \Illuminate\Http\Response
     */
    public function userIsAdmin()
    {
        if( session('userIsAdmin') !== null && !empty(session('userIsAdmin')))
        {
            return true;
        } else
        {
            return false;
        }
    }

}
