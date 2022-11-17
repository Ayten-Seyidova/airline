<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function photo()
    {
        $photos = PhotoGallery::orderBy('id', 'desc')->paginate(12);
        return view('front.pages.photo', compact('photos'));
    }
}
