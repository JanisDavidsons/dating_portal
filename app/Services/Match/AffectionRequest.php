<?php

namespace App\Services\Match;

use App\User;

class AffectionRequest
{
    private int $userId;
    private string $affectionType;

    public function __construct(int $userId, string $affectionType)
    {
        $this->userId = $userId;
        $this->affectionType = $affectionType;
    }

    public function user():User
    {
        return User::find($this->userId);
    }

    public function AffectionType():string
    {
        return $this->affectionType;
    }

}
