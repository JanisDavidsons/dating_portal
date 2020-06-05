<?php


namespace App\Services\Match;


use App\User;

class UsersFilterRequest
{
    private User $user;

    public function  __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
