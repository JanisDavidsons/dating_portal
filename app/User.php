<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'age',
        'gender',
        'email',
        'userName',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

//        static::created(
//            function ($user) {
//                dd($user);
//                $user->profile()->create(
//                    [
//                        'username' => $user->userName
//                    ]
//                );
//                Mail::to($user->email)->send(new NewUserWelcomeMail());
//            }
//        );
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class)->orderBy('created_at', 'DESC');
    }

    public function likes()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function scopeWithoutAuthUser($query)
    {
        $query->where('id', '!=', auth()->id());
    }
}
