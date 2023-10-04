<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container">
        <div class="row content shadow">
            <div class="col-md-7 mb-4 mb-md-auto text-center">
                <img class="img-fluid rounded" src="{{ Storage::url("public/images/media/contact_image_form.jpg") }}" style="height: 20rem;" alt="Image in login page">
                @auth
                @if(auth()->user()->is_revisor || auth()->user()->is_admin)

                @else
                <div class="d-flex justify-content-center">
                    <a style="letter-spacing: 1px" class="btn-custom-orange mt-3 fa p-2" href="{{route('become.revisor')}}">{{ __('ui.apply')}}</a>
                </div>
                @endif
                @endauth
                @guest
                <div class="d-flex justify-content-center">
                    <a style="letter-spacing: 1px" class="btn-custom-orange mt-3 fa p-2" href="{{route('become.revisor')}}">{{ __('ui.apply')}}</a>
                </div>
                @endguest
            </div>
            <div class="col-md-5 d-flex flex-column justify-content-center">
                <h3 class="fw-bold mb-3 text-center"><i class="fa-regular fa-envelope-open fw-bold"></i> {{ __('ui.Contat')}}</h3>
                <h6 class="text-center">{{ __('ui.work')}}</h6>
                <div class="my-2">
                    @if(session()->has('success'))
                    <div class="alert alert-success m-0">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session()->has('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                    @endif
                </div>
                <form method="POST" action="{{ route('contacts.save') }}">
                    @csrf
                    <div class="form-floating">
                        <input class="form-control bg-transparent" type="text" id="name" name="name" placeholder="name">
                        <label for="name" class="label-control">{{ __('ui.nome')}}</label>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input class="form-control bg-transparent" type="email" id="email" name="email" placeholder="email">
                        <label for="email">Email</label>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control bg-transparent" name="message" id="message" name="message" rows="8" placeholder="message"></textarea>
                        <label for="message">{{ __('ui.mess')}}</label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button style="margin-top: 2.5rem; letter-spacing: 2px" class="btn-custom-greenwater"><i class="fa fa-envelope"> {{ __('ui.submit')}}</i></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-main>