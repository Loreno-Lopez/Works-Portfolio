<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class navbar extends Component
{
    public $nav;
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if($user=Auth::user())
        {
            $this->nav =
            [
                // route('home') => 'Home',
                // route('announcements.index') => 'Announcements',
                // route('announcement.create') => 'Add Announcement',
                // route('contacts') => 'Contacts',
            ];
        }
        else
        {
            $this->nav =
            [
                // route('home') => 'Home',
                // route('announcements.index') => 'Announcements',
                // route('contacts') => 'Contacts',
            ];
        }

        return view('components.navbar');
    }
}
