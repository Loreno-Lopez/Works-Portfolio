<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\AddWatermark;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Mail\NoticeAnnouncement;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $announcement;
    public $temporary_images;
    public $images = [];
    public $image;

    protected $listeners = [
        'edit'
    ];

    protected function rules()
    {
        return [
            'announcement.title' => 'required|min:4|max:45',
            'announcement.body' => 'required|min:10',
            'announcement.price' => 'required|numeric|max:999999',
            'announcement.category_id' => 'required',
            'images.*' => 'image|max:1024',
            'temporary_images.*' => 'image|max:1024',
        ];
    }

    protected $messages = [
        'required' => 'The :attribute is required.',
        'min' => 'The filled :attribute is too short.',
        'max' => 'The filled :attribute is too big.',
        'numeric' => 'The :attribute must be a number.',
        'temporary_images.*.required' => 'Almeno un\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'I file immagini sono troppo pesanti, max 4mb',
        'images.image' => 'L\'Immagine deve essere un\'immagine',
        'images.image' => 'L\'Immagine deve essere max 4mb',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        $this->announcement->user_id = Auth::user()->id;
        $this->announcement->save();
        if (count($this->images)) {
            foreach ($this->images as $image) {
                //$this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);
                
                RemoveFaces::withChain([
                    new AddWatermark($newImage->id),
                    new ResizeImage($newImage->path, 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('success', 'Announcement successfully created! Wait for the approval by an administrator.');
        $this->noticeAnnouncement();
        $this->newAnnouncement();
        $this->emitTo('announcements-list', 'loadAnnouncements');
    }

    public function mount()
    {
        $this->newAnnouncement();
    }

    public function newAnnouncement()
    {
        $this->announcement = new \App\Models\Announcement();
        $this->images = [];
        $this->temporary_images = [];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($user_id)
    {
        $this->announcement = \App\Models\Announcement::find($user_id);
    }

    public function noticeAnnouncement()
    {
        Mail::to('revisor@example.com')->send(new NoticeAnnouncement(Auth::user(), $this->announcement->id));
        Mail::to(Auth::user()->email)->send(new NoticeAnnouncement(Auth::user(), $this->announcement->id));
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
