<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Category;

class AnnouncementController extends Controller
{
    public function createAnnouncement()
    {
        return view('announcement.create');
    }

    public function indexAnnouncements()
    {
        $title = 'Announcements';
        $announcements = Announcement::where('is_accepted', true)->latest()->paginate(6);
        return view('announcement.index', compact('announcements', 'title'));
    }

    public function showAnnouncements(Announcement $announcement)
    {
        if($announcement->is_accepted)
        {
            $category = $announcement->category->id;
            return view('announcement.show', compact('announcement', 'category'));
        }
        elseif(auth()->guest())
        {
            return abort(403);
        }
        elseif(auth()->user()->is_revisor)
        {
            $category = $announcement->category->id;
            return view('announcement.show', compact('announcement', 'category'));
        }
        elseif($announcement->user_id == auth()->user()->id){
            $category = $announcement->category->id;
            return view('announcement.show', compact('announcement', 'category'));
        }
        else{
            return abort(403);
        }

    }


    // SISTEMA RICERCA CON TNTSEARCH (user story 10)
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)
        ->paginate(6);

        return view('announcement.index', compact('announcements'));
    }


    // SISTEMA RICERCA OLD (BY BIAGIO)
    public function announcementsSearch(Request $request)
    {

        $searchTerm = $request->search;

        // Rimuovi gli spazi dal termine di ricerca
        $searchTermWithoutSpaces = str_replace(' ', '', $searchTerm);

        // Esegui la ricerca considerando il termine senza spazi
        $announcements = Announcement::where('title', 'LIKE', "%$searchTermWithoutSpaces%")
            ->orWhereHas('category', function ($query) use ($searchTermWithoutSpaces) {
                $query->where('name', 'LIKE', "%$searchTermWithoutSpaces%");
            })
            ->paginate(6);

        $title = 'Announcements';
        return view('announcement.index', compact('title', 'announcements'));
    }
}