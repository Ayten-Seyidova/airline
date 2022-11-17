<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.pages.dashboard');
    }

    public function staticCategory() {
        $categories = Menu::where('type', 'static')->get();
        return view('admin.pages.static', compact('categories'));
    }

}
