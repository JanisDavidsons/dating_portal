<?php

namespace App\Services\Match;

use App\Affection;
use App\Events\MatchEvent;

class AffectionService
{
    public function makeAffection (AffectionRequest $request):void
    {
        $authUser = auth()->user();

        $hasMatch = $request->user()->affections()
            ->where('affection_type', 'like')
            ->where('affection_to', $authUser->id)
            ->exists();

        if ($hasMatch){
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln("We have a affections");

            event(new MatchEvent($authUser, $request->user()));
        }

        Affection::create(
            [
                'user_id' => auth()->id(),
                'affection_to' => $request->user()->id,
                'affection_type' => $request->AffectionType()
            ]
        );
    }
}
