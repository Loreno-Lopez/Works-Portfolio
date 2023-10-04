<x-slot:title>Add User</x-slot:title>
<div class=" container bg-light p-4 rounded">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="row g-3">
        <div class="col-12">
            @if($user->id)
            <h2 class="fa">{{ __('ui.EditUser')}} <i class="fa-solid fa-user"></i></h2>
            @else
            <h2 class="fa">{{ __('ui.AddUser')}} <i class="fa-solid fa-user"></i></h2>
            @endif
        </div>
        <div class="col-12">
            <button class="btn-custom-orange fa" wire:click="newUser">{{ __('ui.NewUser')}}</button>
        </div>
        <form wire:submit.prevent="store">
            <div class="col-12">
                <label for="name">{{ __('ui.Name')}}</label>
                <input type="text" class="form-control" wire:model.lazy="user.name">
                @error('user.name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" wire:model.lazy="user.email">
                @error('user.email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" wire:model.lazy="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="role">{{ __('ui.Is_Admin')}}</label>
                <select wire:model.defer="user.is_admin" class="form-control">
                    <option value="1" selected>{{ __('ui.admin')}}</option>
                    <option value="0">{{ __('ui.user')}}</option>
                </select>
            </div>
            <div class="col-12">
                <label for="role">{{ __('ui.Is_Revisor')}}</label>
                <select wire:model.defer="user.is_revisor" class="form-control">
                    <option value="1" selected>{{ __('ui.Yes')}}</option>
                    <option value="0">{{ __('ui.No')}}</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-custom-orange-sm mt-3"><i class="fa-solid fa-plus"> {{ __('ui.Save')}} </i></button>
            </div>
        </form>
    </div>
</div>