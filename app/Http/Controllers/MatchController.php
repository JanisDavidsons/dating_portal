<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MatchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
    }

    public function like(User $user)
    {
        return auth()->user()->affections()->attach($user->profile, ['match_type' => 'like']);
    }

    public function dislike(User $user)
    {
        return auth()->user()->dislikes()->attach($user->profile, ['match_type' => 'dislike']);
    }
}





