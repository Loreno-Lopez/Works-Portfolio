<x-slot:title>Add Announcement</x-slot:title>
<div class="col-12 w-75 mx-auto mx-sm-5 m-md-auto">
    <div class="row">
        <div class="col-12">
            @if($announcement->id)
            <h2 style="letter-spacing: 2px" class="ms-3">{{ __('ui.edit')}} <i class="fa-solid fa-newspaper mb-2"></i></h2>
            @else
            <h2 style="letter-spacing: 1px" class="ms-3">{{ __('ui.add')}} <i class="fa-solid fa-newspaper mb-2"></i></h2>
            @endif
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}} <i class="fa-solid fa-check text-success fs-3"></i>
        </div>
        @endif


        <div class="col-12">
            <button class="btn-custom-orange text-light fa ms-3" wire:click="newAnnouncement">{{ __('ui.new')}}</button>
        </div>
        <form wire:submit.prevent="store">
            @csrf

            <div class="m-3 form-floating">
                <input wire:model="announcement.title" type="text" class="form-control bg-transparent" placeholder="title" @error('announcement.title') is-invalid @enderror>
                <label for="title" class="label-control bg-transparent">{{ __('ui.tit')}}</label>
                @error('announcement.title')
                <div class="text-danger fw-bold">{{$message}}</div>
                @enderror
            </div>

            <div class="m-3 form-floating">
                <textarea wire:model="announcement.body" class="form-control bg-transparent" @error('announcement.body') is-invalid @enderror cols="50" id="description" placeholder="description"></textarea>
                <label for="description" class="label-control">{{ __('ui.des')}}</label>
                @error('announcement.body')
                <div class="text-danger fw-bold">{{$message}}
                </div>
                @enderror
            </div>

            <div class="m-3 form-floating">
                <input wire:model="announcement.price" type="number" class="form-control bg-transparent" @error('announcement.price') is-invalid @enderror id="price" placeholder="price">
                <label for="price" class="label-control">{{ __('ui.pri')}}</label>
                @error('announcement.price')
                <div class="text-danger fw-bold">{{$message}}</div>
                @enderror
            </div>

            <div class="m-3 form-floating">
                <select wire:model.defer="announcement.category_id" id="category" class="form-control bg-transparent" required>
                    <option value="" class="bg-transparent">-> {{ __('ui.cat')}} <- @foreach($categories as $category) <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="m-3">
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control bg-transparent @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
                @error('temporary_images.*')
                <p class="text-danger mt-2">{{$message}}</p>
                @enderror
            </div>
            @if(!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview:</p>
                    <div class="row border border-4 border-dark rounded shadow py-4">
                        @foreach($images as $key => $image)
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img class="img-preview shadow-rounded d-block" style="width: 200px; height: 150px;" src="{{$image->temporaryUrl()}}" alt="">
                                </div>
                                <div class="col-md-8 d-flex align-items-center justify-content-end">
                                    <div class="card-body ms-auto">
                                        <button type="button" class="btn btn-danger" wire:click="removeImage({{$key}})">Cancella</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <div class="m-3">
                <button type="submit" class="btn-custom-orange fa">{{ __('ui.sav')}}</button>
            </div>

        </form>
    </div>
</div>