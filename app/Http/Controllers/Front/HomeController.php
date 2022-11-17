<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PhotoGallery;
use App\Models\Post;
use App\Models\Useful;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $news = Post::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        $photos = PhotoGallery::orderBy('id', 'desc')->get();
        $categories = Category::all();
        $links = Useful::where('status', 1)->orderBy('id', 'desc')->get();

        return view('front.pages.home', compact('news', 'photos', 'categories', 'links'));
    }
}
