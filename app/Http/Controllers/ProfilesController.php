<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index( $user)
    {
        $user = User::query()->findOrFail($user);
        $posts = DB::table('posts')->latest()->paginate(1);
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts'. $user->id,
            now()->addSeconds(30),
            function () use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember(
            'count.followers' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember(
            'count.following' . $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->following->count();
            });

        return view(
            'profiles/index',compact('user', 'follows', 'postCount', 'followersCount','followingCount','posts')
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
                'title' => 'required',
                'description' => 'required',
                'url' => 'url',
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
        $users = User::where('gender','male')->latest()->paginate(1);
        return view('/profiles/show',compact('users'));
    }
}
