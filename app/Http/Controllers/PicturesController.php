<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Support\Facades\File;

class PicturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pictures/create');
    }

    public function show()
    {
        return view('/pictures/show');
    }

    public function delete($id)
    {
        $pictureToDelete = Picture::query()->findOrFail($id);
        File::delete($pictureToDelete->getUrl());

        if ($pictureToDelete->delete()) {
            return redirect()->back()->with('success', 'picture deleted!');
        }
        return redirect()->back()->with('error', 'Failed to delete this picture!');
    }


    public function userPictures ()
    {
        $user = User::WithoutAuthUser()->OpositGender()->inRandomOrder()->first();
        return view('pictures.show', compact( 'user'));
    }
}











