<?php

namespace App\Events;

use App\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MatchEvent
{
    use Dispatchable, SerializesModels;

    private User $authUser;
    private User $user;

    public function __construct(User $authUser, User $user)
    {
        $this->authUser = $authUser;
        $this->user = $user;
    }

    public function getAuthUser(): User
    {
        return $this->authUser;
    }

    public function getUser(): User
    {
        return $this->user;
    }


}
