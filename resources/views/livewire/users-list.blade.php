<div class="container mt-5 m-lg-auto">
    <div class="row">
        <div class="col-12">
            <h2 class="fa">{{ __('ui.Users')}} <i class="fa-solid fa-users"></i></h2>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    </div>
    <table class="table table-sm table-bordered">
        <thead class="table-secondary">
            <th>{{ __('ui.Name')}}</th>
            <th>Email</th>
            <th>{{ __('ui.Is_Admin')}}</th>
            <th>{{ __('ui.Is_Revisor')}}</th>
            <th></th>
        </thead>
        <tbody>
            @foreach( $users as $user )
            <tr class="table-light">
                <td class="text-custom-greenwater fw-bold"><i class="fa-solid fa-user text-dark"></i> {{ $user->name }}</td>
                <td class="text-custom-orange fw-bold">{{ $user->email }}</td>
                <td>
                    <b>
                        @if($user->is_admin)
                        <p class="text-success">{{ __('ui.Yes')}}</p>
                        @else
                        <p class="text-secondary">{{ __('ui.No')}}</p>
                        @endif
                    </b>
                </td>
                <td>
                    <b>
                        @if($user->is_revisor)
                        <p class="text-success">{{ __('ui.Yes')}}</p>
                        @else
                        <p class="text-secondary">{{ __('ui.No')}}</p>
                        @endif
                    </b>
                </td>
                <td class="">
                <div class="row">    
                    <div class="col-12 col-md-6"><button class="btn-custom-greenwater-sm m-1" wire:click="editUser({{$user->id}})"><i class="fa-solid fa-pen-to-square"></i></button></div>
                    <div class="col-12 col-md-6"><button class="btn btn-sm btn-danger m-1" wire:click="deleteUser({{$user->id}})"><i class="fa-regular fa-trash-can"></i></button></div>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>