<?php
namespace App\Queries;

use App\User;

class UserDataTable
{
    public function get()
    {
        return User::select('users.*');
    }
}
