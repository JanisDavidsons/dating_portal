<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'gender',
        'email',
        'userName',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            Mail::to($user->email)->send(new NewUserWelcomeMail($user));
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class)->orderBy('created_at', 'DESC');
    }

    public function affections()
    {
        return $this->hasMany(Affection::class);
    }

//    public function fullMatch()
//    {
//        return $this->hasMany(Affection::class,'affection_to', 'id')
//            ->where('affection_type','=','like');
//    }

    public function scopeWithoutAuthUser($query)
    {
        $query->where('id', '!=', $this->id);
    }

    public function scopeOppositGender($query)
    {
        $query->where('gender', '!=', auth()->user()->gender);
    }

    public function scopeFilterAffections($query)
    {
        $affections = $this->affections()->pluck('affection_to');
        $query->whereNotIn('id', $affections->all());
    }

    public function scopeWithinAge($query, int $minAge, int $maxAge)
    {
        $query->whereHas(
            'profile',
            function ($query) use ($minAge, $maxAge) {
                $query->whereBetween('age', [$minAge, $maxAge]);
            }
        );
    }

    public function scopeLikedUsers($query)
    {
        $likedUsers = $this->affections()
            ->where('affection_type','=','like')
            ->pluck('affection_to');

        $query->whereIn('id', $likedUsers->all());
    }

    public function scopeDisLikedUsers($query)
    {
        $likedUsers = $this->affections()
            ->where('affection_type','!=','like')
            ->pluck('affection_to');

        $query->whereIn('id', $likedUsers->all());
    }

    public function match(User $user):void
    {
        $this->affections()
            ->where('affection_to','=', $user->id)
            ->update(['affection_type' => 'match']);
    }

    public function scopeFullMatch($query)
    {
        $likedUsers = $this->affections()
            ->where('affection_type','=','match')
            ->pluck('affection_to');

        $query->whereIn('id', $likedUsers->all());
    }


}









