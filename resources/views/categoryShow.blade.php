<x-main>
<x-slot:title>{{$category->name}}</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Explore Category: {{$category->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($category->announcements as $announcement)
                    @if($announcement->is_accepted)
                    <x-card :title="$announcement->title" :category="$announcement->category->name" :description="$announcement->body" :price="$announcement->price" :id="$announcement->id" :announcement="$announcement" />
                    @endif
                    @empty
                    <div class="col-12">
                        <h1 class="mt-4">Announcements not found in this category</h1>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-main>