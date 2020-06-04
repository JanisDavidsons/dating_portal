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
        $user = auth()->user()->withoutAuthUser()->filterAffections()->oppositGender()->inRandomOrder()->first();
        return view('/profiles/show', compact('user'));
    }

//    private function likedUsers()
//    {
//        dd();
//        $user = auth()->user()->withoutAuthUser()->filterAffections()->oppositGender()->inRandomOrder()->get();
//        dd($user);
//        return auth()->user()->likedUsers()->get();
//    }
}











