<?php

namespace App\Http\Controllers;

use App\Services\Match\AffectionRequest;
use App\Services\Match\AffectionService;
use App\Services\Match\UserFiterRequest;
use App\Services\Match\UsersFilterRequest;
use App\Services\Match\UsersFilterService;

class MatchController extends Controller
{
    private AffectionService $service;
    private UsersFilterService $filterService;

    public function __construct(AffectionService $service, UsersFilterService $filterService)
    {
        $this->middleware('auth');

        $this->service = $service;
        $this->filterService = $filterService;
    }

    public function affection(int $userId, string $type)
    {
        $this->service->makeAffection(
            new AffectionRequest($userId, $type)
        );
    }

    public function show()
    {
        $user = $this->filterService->filterUser(
            new UsersFilterRequest(auth()->user())
        );
        return view('/profiles/show', compact('user'));
    }
}











