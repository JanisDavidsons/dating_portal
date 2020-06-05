<?php

namespace App\Http\Controllers;

use App\Affection;
use App\Services\Match\AffectionRequest;
use App\Services\Match\AffectionService;
use App\User;
use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    /**
     * @var AffectionService
     */
    private AffectionService $service;

    public function __construct(AffectionService $service)
    {
        $this->middleware('auth');

        $this->service = $service;
    }

    public function affection(int $userId, string $type)
    {
        $this->service->makeAffection(
            new AffectionRequest($userId,$type)
        );
    }

    public function show()
    {
        $ageSettings = auth()->user()->profile;
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











