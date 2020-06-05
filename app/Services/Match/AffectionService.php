<?php


namespace App\Services\Match;


use App\Affection;

class AffectionService
{
    public function makeAffection (AffectionRequest $request):void
    {
        Affection::create(
            [
                'user_id' => auth()->id(),
                'affection_to' => $request->user()->id,
                'affection_type' => $request->AffectionType()
            ]
        );
    }
}
