<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'username',
        'description',
        'facebook',
        'min_age',
        'max_age',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}





