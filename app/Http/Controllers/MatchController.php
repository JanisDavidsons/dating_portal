<?php

namespace App\Http\Controllers;

use App\Affection;
use App\User;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function affection(User $user, string $type)
    {
        return auth()->user()->affections()->attach($user->id, ['match_type' => $type]);
    }
}




