<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run():void
    {
        $users = factory(User::class,50)->make();

        foreach ($users as $user){
            $user->save();
            $profile = $this->generateProfile($user);
            $profile->save();
        }
    }

    private function generateProfile(User $user):Profile
    {
        /** @var Profile $profile */
        $profile = factory(Profile::class)->make();
        $profile->user()->associate($user);
        return $profile;
    }
}
