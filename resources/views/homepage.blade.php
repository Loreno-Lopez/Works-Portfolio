<x-main>
    <x-slot:title>Presto.it</x-slot:title>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active img-gradient-custom">
                            <img src="{{ Storage::url("public/images/media/carosello-immagine-1.png") }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item img-gradient-custom">
                            <img src="{{ Storage::url("public/images/media/carosello-immagine-2.png") }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <div class="carousel-item img-gradient-custom">
                            <img src="{{ Storage::url("public/images/media/carosello-immagine-3.png") }}" class="d-block w-100 img-fluid" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span style="color:#FF9F1C" class="fs-1 bi bi-arrow-left-circle-fill" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span style="color:#FF9F1C" class="fs-1 bi bi-arrow-right-circle-fill" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ Storage::url("public/images/media/carosello-immagine-1.png") }}" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ Storage::url("public/images/media/carosello-immagine-2.png") }}" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ Storage::url("public/images/media/carosello-immagine-3.png") }}" class="d-block w-100 img-fluid" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->

    <div class="container">
        <div class="row align-items-center">
            @if(session()->has('success'))
            <div class="alert alert-success mt-4 text-center fs-4">
                {{ session('success') }}
            </div>
            @endif

            <!-- icone delle categorie -->
            <div class="row m-auto d-flex justify-content-between pb-2 mt-5">

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/1" class="text-light">
                        <i class="bi bi-car-front-fill fs-2 ">
                            <p class="text-hidden fw-semibold">{{ __('ui.Veichles')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/2" class="text-light">
                        <i class="bi bi-pc-display fs-2">
                            <p class="text-hidden fw-semibold">{{ __('ui.Electronics')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/3" class="text-light">
                        <i class="bi bi-house-door-fill fs-2">
                            <p class="text-hidden fw-semibold">{{ __('ui.HomeAppliances')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/4" class="text-light">
                        <i class="bi bi-book-half fs-2">
                            <p class="text-hidden fw-semibold">{{ __('ui.Books')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/5" class="text-light">
                        <i class="bi bi-joystick fs-2">
                            <p class="text-hidden fw-semibold">{{ __('ui.Games')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/6" class="text-light">
                        <i class="fa-solid fa-person-running fs-2">
                            <p class="text-hidden fw-semibold mt-3 p-icon">{{ __('ui.Sport')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/7" class="text-light">
                        <i class="fa-solid fa-sign-hanging fs-2">
                            <p class="text-hidden fw-semibold mt-3 p-icon">{{ __('ui.RealEstate')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/8" class="text-light">
                        <i class="bi bi-phone-fill fs-2">
                            <p class="text-hidden fw-semibold">{{ __('ui.Phones')}}</p>
                        </i>
                    </a>
                </div>

                <div class="mx-2 mb-3 category-icons hvr-float-shadow text-center icon-hidden">
                    <a href="http://127.0.0.1:8000/category/9" class="text-light">
                        <i class="fa-solid fa-couch fs-2">
                            <p class="text-hidden fw-semibold mt-3 p-icon">{{ __('ui.Furniture')}}</p>
                        </i>
                    </a>
                </div>
            </div>


            <div class="col-12 text-center">
                <h1 class="mt-4">{{ __('ui.allAnnouncements')}}</h1>

                @auth
                <h3 class="d-inline">{{ __('ui.Welcome')}} @auth <h3 class="d-inline" style="color: #00ac96">{{$user = Auth::user()->name ?? ''}}</h3> @endauth</h3>
                <div class="mt-3">
                    <a class="btn-custom-orange fs-4" href="{{route('announcement.create')}}"><i class="bi bi-plus-circle me-3"></i></i>{{ __('ui.addann')}}</a>
                </div>
                @endauth

            </div>
            @foreach($announcements as $announcement)
            <x-card :title="$announcement->title" :category="$announcement->category->name" :description="$announcement->body" :price="$announcement->price" :id="$announcement->id" :announcement="$announcement" />
            @endforeach
        </div>
    </div>
</x-main>