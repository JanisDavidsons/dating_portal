<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function filterAge($minAge,$maxAge)
    {
        return DB::table('profiles')
            ->where('id','=', auth()->id())
            ->update(['min_age' => $minAge, 'max_age' =>$maxAge]);
    }
}
