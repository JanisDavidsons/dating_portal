<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    public function store()
    {
        $data = \request()->validate(
            [
                'caption' => 'required',
                'image' => ['required', 'image']
            ]
        );

        $imagePath = request()->file('image')->store('pictures');
        auth()->user()->pictures()->create(
            [
                'caption' => $data['caption'],
                'location' => $imagePath
            ]
        );
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        return redirect('/profile/' . auth()->id());
    }

    public function show(Picture $picture)
    {
        return view('/pictures/show', compact('picture'));
    }

    public function userPictures (User $user)
    {
       //$pictures =  $user->pictures()->get();
        $users = User::WithoutAuthUser()->get();

       return view('pictures.show', compact('users', 'user'));
    }
}











