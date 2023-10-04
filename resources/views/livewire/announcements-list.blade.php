<div class="col-12 w-75 mx-2 ms-sm-5 m-md-auto">
    <div class="row">
        <div class="col-12 ms-5 m-md-auto">
            <h2 style="letter-spacing: 1px" class="mt-5 mb-3">
                @if(auth()->user()->is_admin)
                {{ __('ui.all')}}
                @else
                {{ __('ui.your')}}:
            </h2>
            @endif
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    </div>
    <table class="table table-sm table-bordered shadow-sm">
        <thead class="table-secondary">
            <th class="text-center"> {{ __('ui.tit')}}</th>
            <th class="text-center">{{ __('ui.cate')}}</th>
            <th class="text-center">{{ __('ui.pri')}}</th>
            <th class="text-center">{{ __('ui.sta')}}</th>

            <th class="text-center">{{ __('ui.act')}}</th>
        </thead>
        <tbody>
            @foreach( $announcements as $announcement )
            <tr class="table-light">
                <td>
                    <a class="text-custom-greenwater fw-bold" href="{{route('announcements.show', $announcement)}}"> {{$announcement->title}}</a>
                </td>
                <td class="text-center">{{ $announcement->category->name }}</td>
                <td class="text-center">
                    <b class="text-custom-orange text-nowrap">{{ number_format($announcement->price, 2, ',', '.') }} €</b>
                </td>
                <td>
                    @if($announcement->is_accepted == true)
                    <p class="text-success text-center fw-bold m-0">{{ __('ui.acc')}}</p>
                    @elseif(is_null($announcement->is_accepted))
                    <p class="text-warning text-center fw-bold m-0">{{ __('ui.rev')}}</p>
                    @else
                    <p class="text-danger text-center fw-bold m-0">{{ __('ui.resp')}}</p>
                    @endif
                </td>

                <td class="d-flex justify-content-around">
                    <button class="btn-custom-greenwater-sm m-1" wire:click="editAnnouncement({{$announcement->id}})"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-sm btn-danger m-1" wire:click="deleteAnnouncement({{$announcement->id}})"><i class="fa-regular fa-trash-can"></i></button>
                    @auth
                    @if(auth()->user()->is_revisor)
                    <form action="{{route('revisor.move_reject_announcement', $announcement)}}" method="POST" class="mt-1 p-0">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-custom-orange-sm"><i class="fa-regular fa-eye"></i></button>
                    </form>
                    @endif
                    @endauth
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>