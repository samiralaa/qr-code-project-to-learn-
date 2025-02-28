<?php
namespace App\Services\Auth;

use App\Models\User;

class RegisterService
{
    public function createUser($user)
    {
        $user = User::create($user);
        return $user;
    }

    public function allusers()
    {
        return User::all();
    }
}
 