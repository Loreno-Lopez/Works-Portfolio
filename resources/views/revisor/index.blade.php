<x-main>
    <x-slot:title>revisor index</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12 p-5 text-center">
                <h1>
                    <!-- {{$announcement_to_check ? 'Here is the announcement to review' : 'Not found Announcement to review'}} -->
                    @if($announcement_to_check)
                    {{ __('ui.review')}}
                    @else
                    {{ __('ui.toreview')}}
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





    @if($announcement_to_check)
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button style="background-color:#FF9F1C" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @forelse($announcement_to_check->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                            <img style="height:50rem" src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="...">
                        </div>
                        @empty
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/id/1{{$announcement_to_check->id}}/1200/600" class="d-block w-100 img-fluid gradient-custom" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/id/2{{$announcement_to_check->id}}/1200/600" class="d-block w-100 img-fluid gradient-custom" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/id/3{{$announcement_to_check->id}}/1200/600" class="d-block w-100 img-fluid gradient-custom" alt="...">
                        </div>
                        @endforelse
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
            <div class="col-12 text-center mt-4">
                <h3 style="color: #FF9F1C" class="fw-bold card-title mt-2">{{ __('ui.title')}}:</h3>
                <p class="fs-1">{{$announcement_to_check->title}}</p>
                <h3 style="color: #FF9F1C" class="fw-bold mt-3">{{ __('ui.des')}}:</h3>
                <p class="text-wrap fs-4">{{$announcement_to_check->body}}</p>
                <p class="card-text fs-5"><b style="color: #FF9F1C">{{ __('ui.auth')}}:</b> {{$announcement_to_check->user->name}}</p>
                <p class="card-footer fs-5"><b style="color: #FF9F1C">{{ __('ui.data')}}:</b> {{$announcement_to_check->created_at->format("d/m/Y")}}</p>
            </div>
            <div class="col-12">
                <p class="text-center mt-4 fs-1">{{ __('ui.Imagedetails')}} </p>
                @foreach($announcement_to_check->images as $image)
                <div style="border-color: #2EC4B6 !important" class="card border-0 border-bottom border-3 my-5">
                    <img style="height:30rem" src="{{ Storage::url($image->path) }}" class="d-block w-100 img-fluid img-fluid-custom" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 my-2">
                                <h5 class="card-title tc-accent bg-custom-orange text-center">{{ __('ui.Review1')}}</h5>
                                <p class="card-text text-center">{{ __('ui.Adultimages')}}: <span class="{{$image->adult}}"></span></p>
                                <p class="card-text text-center">{{ __('ui.Satire')}}: <span class="{{$image->spoof}}"></span></p>
                                <p class="card-text text-center">{{ __('ui.Medicine')}}: <span class="{{$image->medical}}"></span></p>
                                <p class="card-text text-center">{{ __('ui.Violence')}}: <span class="{{$image->violence}}"></span></p>
                                <p class="card-text text-center">{{ __('ui.WinkingContent')}}: <span class="{{$image->racy}}"></span></p>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <h5 class="card-title tc-accent bg-custom-orange text-center">{{ __('ui.tags')}}</h5>
                                @if ($image->labels)
                                <ul class="d-flex flex-wrap">
                                    @foreach ($image->labels as $label)
                                    <li class="list-unstyled mx-2 text-body-secondary">#{{$label}}</p>
                                        @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-6 mb-5 text-center">
                <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-custom-orange fs-4">{{ __('ui.accep')}}</button>
                </form>
            </div>
            <div class="col-6 mb-5 text-center">
                <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-custom-greenwater fs-4">{{ __('ui.rejec')}}</button>
                </form>
            </div>
        </div>
    </div>
    @endif



</x-main>