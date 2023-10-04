<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function reject()
    {
        $announcements_to_reject = Announcement::where('is_accepted', false)->latest()->take(6)->get();
        return view('revisor.reject', compact('announcements_to_reject'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Announcement successfully accepted');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Announcement not accepted');
    }

    public function moveRejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(null);
        return redirect()->back()->with('message', 'Announcement move');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@example.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('success', 'You have applied to become a reviewer');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ['email' => $user->email]);
        return redirect('/')->with('success', 'The user is revisor now');
    }
}
