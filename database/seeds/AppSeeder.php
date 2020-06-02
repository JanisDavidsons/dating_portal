<?php

use App\Picture;
use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run(): void
    {
        $users = factory(User::class, 10)->make();

        foreach ($users as $user) {
            $user->save();
            $profile = $this->generateProfile($user);
            $profile->save();
            $this->generatePictures($user, random_int(1, 10));
        }
    }

    private function generateProfile(User $user): Profile
    {
        /** @var Profile $profile */
        $profile = factory(Profile::class)->make();
        $profile->user()->associate($user);
        return $profile;
    }

    private function generatePictures(User $user, int $amount = 1)
    {
        /** @var Picture $picture */
        $pictures = factory(Picture::class, $amount)->make();

        foreach ($pictures as $picture){
            $picture->user()->associate($user);
            $picture->save();
        }
    }
}


