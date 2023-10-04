<x-main>
    <x-slot:title>Login</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="row content shadow">
                    <div class="col-md-7 mb-4 mb-md-auto text-center">
                        <img class="img-fluid rounded" src="{{ Storage::url("public/images/media/login_image_form.jpg") }}" style="height: 20rem;" alt="Image in login page">
                    </div>
                    <div class="col-md-5 d-flex flex-column justify-content-center">
                        <h3 class="fw-bold mb-3">{{ __('ui.sign')}}</h3>
                        <form method="POST" accept="/login">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control bg-transparent" type="email" name="email" id="email" placeholder="Email">
                                <label for="email">Email</label>
                                @error('email')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control bg-transparent" id="password" name="password" placeholder="password">
                                <label for="password">Password</label>
                                @error('password')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group form-check my-2 mb-3">
                                <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                                <label class="form-check-label" for="checkbox">{{ __('ui.reme')}}</label>
                            </div>

                            <!-- <div class="form-floating mb-2">
                                <a href="{{ route('google-auth') }}" class="text-custom-orange fw-bold"><i class="fa-brands fa-google"></i> Login with Google</a>
                            </div> -->

                            <div class="form-floating mb-4">
                                <a href="{{ route('google-auth') }}" class="text-custom-orange fw-bold">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                        </div>
                                        <p class="btn-text"><b>Sign in with google</b></p>
                                    </div>     
                                </a>
                            </div>

                            <button class="btn-custom-greenwater">{{ __('ui.signBtn')}}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-main>