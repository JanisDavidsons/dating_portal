<?php

namespace App\Http\Controllers;

use App\Affection;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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




