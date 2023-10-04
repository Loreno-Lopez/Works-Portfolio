<x-main>
    <x-slot:title>revisor index</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12 p-5 text-center">
                <h1 class="text-danger">
                    <!-- {{$announcements_to_reject ? 'Latest rejected announcements' : 'Not found Announcement to reject'}} -->
                    @if($announcements_to_reject)
                    {{ __('ui.Latestrejected')}}
                    @else
                    {{ __('ui.Notfound')}}
                    @endif
                </h1>
            </div>
            <div class="col-12">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse($announcements_to_reject as $announcement)
            <x-card :title="$announcement->title" :category="$announcement->category->name" :description="$announcement->body" :price="$announcement->price" :id="$announcement->id" :announcement="$announcement" />
            @empty
            <p class="h3 text-center">{{ __('ui.notf')}}</p>
            @endforelse
        </div>
    </div>
</x-main>