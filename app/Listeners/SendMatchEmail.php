<?php

namespace App\Listeners;

use App\Events\MatchEvent;
use App\Mail\MatchEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMatchEmail implements ShouldQueue
{
    public function handle(MatchEvent $event)
    {
        Log::info($event->getAuthUser().' has a affections with '. $event->getUser());

         $event->getAuthUser()->match($event->getUser());
         $event->getUser()->match($event->getAuthUser());

        Mail::to($event->getAuthUser()->email)->send(new MatchEmail($event->getAuthUser(), $event->getUser()));
        Mail::to($event->getUser()->email)->send(new MatchEmail($event->getUser(), $event->getAuthUser()));
    }
}








