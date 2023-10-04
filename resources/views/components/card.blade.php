<div class="col-12 col-md-6 col-lg-4 card-hover-effect">
    <div id="main" class="product-card">
        <div class="z-1 badge">{{ $category }}</div>
        <div class="product-tumb">

            @forelse($announcement->images as $image)
            @if($loop->first)
            <a class="z-0 w-100 image-container" href="{{route('announcements.show', $announcement)}}">
                <img class="w-100" src="{{ Storage::url($image->path) }}" alt="" style="height:266px;">
            </a>
            @endif
            @empty
            <a class="z-0 w-100 image-container" href="{{route('announcements.show', $announcement)}}">
                <img class="w-100" src="https://picsum.photos/id/1{{ $id }}/200/140" alt="">
            </a>
            @endforelse

        </div>
        <div class="product-details">
            @php
            $lunghezzaMassimaTitolo = 45;
            $titoloRidotta = mb_strimwidth($title, 0, $lunghezzaMassimaTitolo, "...");
            @endphp
            <h4><a href="{{route('announcements.show', $announcement)}}" style="height: 3rem;">{{ $titoloRidotta }}</a></h4>
            @php
            $lunghezzaMassima = 120;
            $descrizioneRidotta = mb_strimwidth($description, 0, $lunghezzaMassima, "...");
            @endphp

            <p class="text-custom-wrap" style="height: 5rem;">{{ $descrizioneRidotta }}</p>

            <div class="product-bottom-details d-flex align-items-center">
                <div class="d-flex flex-column ps-2">
                    <div class="product-price fs-3 mb-2 text-nowrap">{{ number_format($price, 2, ',', '.') }} &euro;</div>
                    <div class="old-price text-decoration-line-through text-nowrap">{{ number_format($price * 1.30, 2, ',', '.') }} &euro;</div>
                </div>
                <div class="product-links">
                    <a class="btn-custom-greenwater" href="{{route('announcements.show', $announcement)}}">{{ __('ui.read')}}</a>
                </div>
            </div>
            <div class="card-footer m-auto mt-2 border-top border-4">
                <h6 class="text-body-secondary mt-3 text-end">{{$announcement->created_at->diffForHumans()}}</h6>
            </div>
        </div>
    </div>
</div>