<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::query()->findOrFail($user);
        $pictures = DB::table('pictures')->where(
            [
                ['user_id', '=', $user->id]
            ]
        )->latest()->paginate(3);
        $likes = auth()->user() ? auth()->user()->likes->contains($user->id) : false;

        $imagesCount = $user->pictures->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->likes->count();

        return view(
            'profiles/index',
            compact('user', 'likes', 'imagesCount', 'followersCount', 'followingCount', 'pictures')
        );
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate(
            [
                'username' => 'required',
                'description' => 'required',
                'url' => '',
                'image' => ''
            ]
        );

        if (request('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(
            array_merge(
                $data,
                $imageArray ?? []
            )
        );
        return redirect("/profile/{$user->id}");
    }

    public function show()
    {
        $users = User::where(
            [
                ['gender', '!=', Auth::user()->gender],
                ['id', '!=', Auth::id()]
            ]
        )->latest()->paginate(1);

        return view('/profiles/show', compact('users'));
    }
}
