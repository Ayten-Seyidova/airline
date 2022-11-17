<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function staticPage($slug)
    {
        $category = Menu::where('type', 'static')->where('slug', $slug)->get();
        $static = StaticPage::where('category_id', $category[0]->id)->get();

        return view('front.pages.static', compact('static', 'category'));
    }
}
