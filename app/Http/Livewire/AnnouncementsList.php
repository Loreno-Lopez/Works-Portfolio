<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class AnnouncementsList extends Component
{
    public $announcements;

    protected $listeners = [
        'loadAnnouncements'
    ];
    public function mount()
    {
        $this->loadAnnouncements();
    }

    public function loadAnnouncements()
    {
        $announcement = \App\Models\Announcement::all();
        if(auth()->user()->is_admin)
        {
           return $this->announcements = Announcement::all();
        }
        $this->announcements = auth()->user()->announcements;
        /* $this->announcements = \App\Models\Announcement::all(); */
    }

    public function editAnnouncement($announcement_id)
    {
        $this->emitTo('create-announcement', 'edit', $announcement_id);
    }

    public function deleteAnnouncement($announcement_id)
    {
        $announcement = \App\Models\Announcement::find($announcement_id);
        $announcement->delete();
        session()->flash('success', 'Announcements successfully delete');
        $this->loadAnnouncements();
    }

    public function render()
    {
        return view('livewire.announcements-list');
    }
}
