<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Announcement;
use App\Models\Category;

class PageController extends Controller
{
    public function homepage()
    {
        $title = 'Homepage';
        // $announcements = Announcement::take(6)->get()->sortByDesc('created_at');
        $announcements = Announcement::where('is_accepted', true)->latest()->take(6)->get();
        /*$announcements = Announcement::orderBy('id', 'DESC')->get();*/

        return view('homepage', compact('title', 'announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }

    public function privacyPolicy()
    {
        return view('privacyPolicy');
    }

    public function termsOfUse()
    {
        return view('termsOfUse');
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }
}
