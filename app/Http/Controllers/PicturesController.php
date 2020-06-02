<?php

namespace App\Http\Controllers;

use App\Picture;
use Intervention\Image\Facades\Image;

class PicturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pictures/create');
    }

    public function store()
    {
        $data = \request()->validate(
            [
                'caption' => 'required',
                'image' => ['required', 'image']
            ]
        );

        $imagePath = request()->file('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        auth()->user()->images()->create(
            [
                'caption' => $data['caption'],
                'image' => $imagePath
            ]
        );
        return redirect('/profile/' . auth()->id());
    }

    public function show(Picture $gallery)
    {
        return view('/pictures/show', compact('gallery'));
    }
}











