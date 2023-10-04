<x-main>
    <x-slot:title>Register</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row content shadow">
                    <div class="col-md-7 m-md-auto text-center">
                        <img class="img-fluid rounded" src="{{ Storage::url("public/images/media/registe_image_form.jpg") }}" style="height: 20rem;" alt="Image in login page">
                    </div>
                    <div class="col-md-5 d-flex flex-column justify-content-center">
                        <h3 class="fw-bold mb-3"> {{ __('ui.reg')}}</h3>
                        <form method="POST" accept="/register">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" type="name" name="name" id="name" placeholder="name" />
                                <label for="name">{{ __('ui.nam')}}</label>
                                @error('name')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="email" name="email" id="email" placeholder="email" />
                                <label for="email">Email</label>
                                @error('email')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="password" id="password" name="password" placeholder="password" />
                                <label for="password">Password</label>
                                @error('password')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" />
                                <label for="password_confirmation">{{ __('ui.conf')}}</label>
                                @error('password_confirmation')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group form-check my-3 ms-2">
                                <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                                <label class="form-check-label" for="checkbox">{{ __('ui.reme')}}</label>
                            </div>
                            <button class="btn-custom-greenwater">{{ __('ui.regBtn')}}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-main>