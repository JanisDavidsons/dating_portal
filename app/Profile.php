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
    ];

//    public function profileImage(): string
//    {
//        $imagePath = ($this->image) ? $this->image : 'defaultPicture/noImageAvailable.png';
//        return '/storage/' . $imagePath;
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}





