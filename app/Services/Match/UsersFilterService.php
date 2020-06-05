<?php

namespace App\Services\Match;

use App\User;

class UsersFilterService
{
    public function filterUser(UsersFilterRequest $request):?User
    {
        $ageSettings = $request->getUser()->profile;

        return $request->getUser()
            ->withoutAuthUser()
            ->filterAffections()
            ->withinAge($ageSettings->min_age,$ageSettings->max_age)
            ->oppositGender()
            ->inRandomOrder()
            ->first();
    }

    public function getFullMatch(UsersFilterRequest $request):?User
    {
//        return $request->getUser()
    }
}
