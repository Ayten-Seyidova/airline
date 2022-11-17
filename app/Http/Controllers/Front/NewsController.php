<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        $search = \request('search');
        if (isset($search)) {
            $news = Post::where('title_az', 'like', "%$search%")->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        } else {
            $news = Post::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        }

        return view('front.pages.news', compact('news'));
    }

    public function singleNews($slug)
    {
        $news = Post::where('slug', $slug)->get();

        return view('front.pages.single-news', compact('news'));
    }
}
