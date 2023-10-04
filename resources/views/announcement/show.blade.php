<x-main>
    <x-slot:title>Show Announcements</x-slot:title>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 text-lg-end m-auto">
                <a class="text-end btn-custom-orange my-3 d-flex justify-content-center" href="{{ route('announcements.index') }}">
                    <i class="bi bi-skip-backward-circle-fill fs-6"> {{ __('ui.Backtoannouncements')}}</i>
                </a>
            </div>
            
            <div class="col-lg-6">
                <h1 class="m-4 border-bottom border-warning border-4 text-uppercase">{{ $announcement->title }}</h1>
                <div class="col-12 text-center">
                    <a class="btn btn-danger rounded w-25 p-0 fs-5 mb-3" href="{{route('categoryShow', compact('category'))}}">{{ $announcement->category->name }}</a>
                </div>
            </div>
            <div class="col-lg-3 align-items-center mt-2">
                <p class="mt-5 fs-4">Published: {{ $announcement->created_at->format("d/m/Y") }}</p>
                <!-- <p class="fs-4">{{ $announcement->created_at->format("H:i") }}</p> -->
            </div>
        </div>

        <div class="row text-center my-1">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @forelse($announcement->images as $image)
                    <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="..." style="height:700px;">
                        </div>
                    @empty
                        <div class=" carousel-item active">
                        <img src="https://picsum.photos/id/1{{$announcement->id}}/1200/600" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/2{{$announcement->id}}/1200/600" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/3{{$announcement->id}}/1200/600" class="d-block w-100" alt="...">
                    </div>
                    @endforelse
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span style="color:#FF9F1C" class="fs-1 bi bi-arrow-left-circle-fill" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('ui.Previous')}}</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span style="color:#FF9F1C" class="fs-1 bi bi-arrow-right-circle-fill" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('ui.Next')}}</span>
                </button>
            </div>
            <div>
                <p style="text-shadow: 2px 2px 1px grey" class="display-2 fw-semibold text-custom-orange mt-3">{{ number_format($announcement->price, 2, ',', '.') }} €</p>
            </div>
            <!-- <div class="col-12 text-center">
                <a class="btn btn-danger rounded w-25 p-0 fs-4" href="{{route('categoryShow', compact('category'))}}">{{ $announcement->category->name }}</a>
            </div> -->
            <p style="color: #2EC4B6" class="mt-1 fs-1">{{ __('ui.Description')}}</p>
            <p class="fs-5">{{ $announcement->body }}</p>
            <p style="color: #2EC4B6" class="mt-1 fs-6">
                <i class="bi bi-pencil-fill"> {{ __('ui.Writtenby')}}: <b>{{ $announcement->user->name}}</b></i>
            </p>
        </div>
    </div>


</x-main>