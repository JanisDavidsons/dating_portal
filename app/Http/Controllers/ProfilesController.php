<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class  ProfilesController extends Controller
{
    public function index($user)
    {
        $user = auth()->user();

        $likedUsers = auth()->user()->likedUsers()->get();

        $pictures = DB::table('pictures')->where(
            [
                ['user_id', '=', $user->id]
            ]
        )->latest()->paginate(3);


        $imagesCount = $user->pictures->count();

        return view(
            'profiles/index',
            compact('user','imagesCount', 'pictures', 'likedUsers')
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
}





