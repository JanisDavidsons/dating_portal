<?php

namespace App\Http\Controllers;

use App\Affection;
use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function affection(int $userId, string $type)
    {
        Affection::create(
            [
                'user_id' => auth()->id(),
                'affection_to' => $userId,
                'affection_type' => $type
            ]
        );
    }

    public function show()
    {
        $ageSettings = auth()->user()->profile;
//        dd($authUserProfile);
        $user = auth()->user()
            ->withoutAuthUser()
            ->filterAffections()
            ->withinAge($ageSettings->min_age,$ageSettings->max_age)
            ->oppositGender()
            ->inRandomOrder()
            ->first();
        return view('/profiles/show', compact('user'));
    }
}











