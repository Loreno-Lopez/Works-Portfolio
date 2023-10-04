<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function setLanguage($lang)
    {
        
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
