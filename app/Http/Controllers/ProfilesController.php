<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\Facades\Image;

class  ProfilesController extends Controller
{
    public function index($user)
    {
        $user = auth()->user();
        $likedUsers = auth()->user()->fullMatch()->get();
        $imagesCount = $user->pictures->count();

        return view(
            'profiles/index',
            compact('user', 'imagesCount', 'likedUsers')
        );
    }

    public function edit(User $user)
    {
        return view('profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate(
            [
                'username' => 'required',
                'description' => '',
                'url' => '',
                'image' => 'image'
            ]
        );

        if (request('image')) {
            $imagePath = request()->file('image')->store('pictures');
            auth()->user()->pictures()->create(['location' => $imagePath]);
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 800);
            $image->save();
        }

        return redirect()->back()->with('success', 'new picture added!');;
    }
}





