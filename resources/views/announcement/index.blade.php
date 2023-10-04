<x-main>
    <x-slot:title>{{$title ?? ''}}</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-4 mb-3">{{ __('ui.Announcements')}}</h1>
            </div>
            <div class="col-md-6 text-center mx-auto">
                <form action="{{ route('search.announcements') }}" method="GET" class="form-controller">
                    @csrf
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="d-flex">
                                <input name="searched" type="search" placeholder="{{ __('ui.search')}}" id="search" name="search" class="form-control-searchbar">
                                <!-- <input type="text" placeholder="Search for title or category" id="search" name="search" class="form-control"> -->
                                <button type="submit" class="btn-custom-orange ms-2 ps-3 pe-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            @forelse($announcements as $announcement)
            <x-card :title="$announcement->title" :category="$announcement->category->name" :description="$announcement->body" :price="$announcement->price" :id="$announcement->id" :announcement="$announcement" />
            @empty
            <div class="col-12">
                <h1 class="mt-4">Announcements not found for your search</h1>
            </div>
            @endforelse
            {{$announcements->links()}}
        </div>
    </div>
</x-main>