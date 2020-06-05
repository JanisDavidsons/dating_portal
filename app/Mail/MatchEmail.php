<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchEmail extends Mailable
{
    use Queueable, SerializesModels;


    private User $user;
    private User $matchedUser;

    public function __construct(User $user, User $matchedUser)
    {
        $this->user = $user;
        $this->matchedUser = $matchedUser;
    }

    public function build()
    {
        return $this->markdown(
            'emails.affections-email',
            [
                'user' => $this->user,
                'matchedUser' => $this->matchedUser
            ]
        );
    }
}
