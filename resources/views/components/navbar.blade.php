<nav class="navbar navbar-expand-md navbar-custom sticky-top">
    <div class="container-fluid">

        <!-- Contenuto della navbar mobile -->
        <div class="d-flex justify-content-between align-items-center">
            <button class="navbar-toggler d-block d-sm-block d-md-none border-0 custom-navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars border-0 fs-1" style="color: #ffffff;"></i>
            </button>


            <a href="/" class="p-0 text-center">
                <img class="w-50 p-0 d-md-none mx-auto" src="{{ Storage::url("public/images/media/Presto_it_logo.png") }}" alt="Home.">
            </a>

            @auth
            <ul class="navbar-nav text-center ms-lg-auto d-md-none">
                <li class="nav-item">
                    <a href="{{ auth()->user()->email }}" class="nav-link text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="bi bi-person-circle fs-1 text-white"></i>
                    </a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav text-center ms-lg-auto d-md-none">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fa-solid fa-right-to-bracket fs-1 text-white"></i>
                    </a>
                </li>
            </ul>
            @endauth
        </div>

        <!-- Contenuto della navbar desktop -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav text-center">
                <!-- logo presto.it -->
                <a class="me-2" href="/">
                    <img style="height: 4rem" src="{{ Storage::url("public/images/media/Presto_it_logo.png") }}" alt="Home.">
                </a>

                <!-- annunci -->
                @auth
                <div class="dropdown my-auto mx-1" id="custom-dropdown annunci-dropdown">
                    <a class="btn-custom-greenwater dropdown-toggle" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-tags" id="icon"></i> {{ __('ui.annun')}}
                    </a>

                    <ul class="dropdown-menu container-fluid" aria-labelledby="dropdownMenuLink">
                        <a class="text-custom-hover dropdown-item text-dark" aria-current="page" href="/announcements"><i class="fa-solid fa-tag"></i> {{ __('ui.annun')}}</a>
                        <a class="text-custom-hover dropdown-item text-dark" aria-current="page" href="{{route('announcement.create')}}"><i class="fa-solid fa-user-tag"></i> {{ __('ui.addanon')}}</a>
                    </ul>
                </div>
                @else
                <a class="nav-link m-auto mx-1 text-nowrap text-light position-relative navbar-hover-link log-custom" aria-current="page" href="/announcements"><i class="fa-solid fa-tags " id="icon"></i> {{ __('ui.annun')}}</a>
                @endauth

                <!-- categorie -->
                <div class="dropdown my-auto mx-1 collapse navbar-collapse" id="navbarNavAltMarkup">
                    <a class="btn-custom-greenwater dropdown-toggle" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-list " id="icon"></i> {{ __('ui.categ')}}
                    </a>

                    <ul class="dropdown-menu container-fluid" aria-labelledby="dropdownMenuLink">
                        @foreach($categories as $category)
                        <li><a href="{{route('categoryShow', compact('category'))}}" class="text-custom-hover dropdown-item">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- dropdown amministrazione -->
                @auth
                @if(auth()->user()->is_revisor)
                <div class="dropdown my-auto mx-1">
                    <a class="btn-custom-greenwater dropdown-toggle" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-gear " id="icon-spin"></i> {{ __('ui.Administration')}}
                    </a>

                    <ul class="dropdown-menu container-fluid" aria-labelledby="dropdownMenuLink">

                        <a class="text-custom-hover dropdown-item text-dark position-relative" aria-current="page" href="{{route('revisor.index')}}"><i class="fa-solid fa-screwdriver-wrench"></i> {{ __('ui.revi')}}
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{App\Models\Announcement::toBeRevisionedCount()}}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                        <a class="text-custom-hover dropdown-item text-dark position-relative" aria-current="page" href="{{route('revisor.reject')}}">
                            <i class="fa-solid fa-trash text-danger"></i> {{ __('ui.reje')}}
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{App\Models\Announcement::toBeRevisionedRejectCount()}}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                        @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.index') }}" class="text-custom-hover dropdown-item text-dark"><i class="fa-solid fa-user-plus"></i> {{ __('ui.Addusers')}}</a>
                        @endif

                    </ul>
                </div>
                @endif
                @endauth

                <!-- contatti -->
                <a class="nav-link m-auto mx-1 text-nowrap text-light position-relative navbar-hover-link log-custom" aria-current="page" href="/contacts"><i class="fa-sharp fa-solid fa-users " id="icon"></i> {{ __('ui.cont')}}</a>
            </div>

            <!-- utente o login/registrati -->
            <div class="ms-auto">
                @auth
                <div class="dropdown my-auto mx-1 collapse navbar-collapse" id="navbarNavAltMarkup">
                    <a class="btn-custom-greenwater dropdown-toggle" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                        <!-- {{ auth()->user()->email }} --> <i class="fa-solid fa-circle-user fs-4 text-white" id="icon"></i>
                    </a>

                    <ul class="dropdown-menu container-fluid" aria-labelledby="dropdownMenuLink">
                        <a class="text-custom-hover dropdown-item" href=""><i class="fa-solid fa-user"></i> {{ auth()->user()->email }}</a>
                        <!-- <a class="text-custom-hover dropdown-item" href="">{{ __('ui.Cart')}}</a> -->
                        <form class="text-custom-hover dropdown-item text-start" action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="text-custom-hover dropdown-item text-start ps-0"> <i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                        </form>
                    </ul>
                </div>
                @else
                <ul class="navbar-nav collapse navbar-collapse log-custom" id="navbarNavAltMarkup">
                    <li><a class="nav-link navbar-hover-link text-nowrap text-light" href="/login"><i class="fa-sharp fa-solid fa-user" id="icon"></i> Login</a></li>
                    <li><a class="nav-link navbar-hover-link text-nowrap text-light" href="/register"><i class="fa-solid fa-user-plus" id="icon"></i> Register</a></li>
                </ul>
                @endauth


            </div>
            <!-- lingue -->
            <div class="dropdown my-auto mx-1 px-3" id="bandiera-dropdown">
                <a class="btn-custom-greenwater dropdown-toggle" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-language fs-4" id="icon"></i>
                </a>

                <ul class="dropdown-menu container-fluid" aria-labelledby="dropdownMenuLink">
                    <div class="row">
                        <li class="nav-link navbar-hover-link my-auto col-3 ms-4">
                            <x-locale lang="it" nation="it" />
                        </li>

                        <li class="nav-link navbar-hover-link my-auto col-3">
                            <x-locale lang="en" nation="gb" />
                        </li>

                        <li class="nav-link navbar-hover-link my-auto col-3">
                            <x-locale lang="es" nation="es" />
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Offcanvas per la modalità mobile -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="navbarOffcanvas" aria-labelledby="navbarOffcanvasLabel">
    <div class="offcanvas-header d-flex justify-content-between border-bottom border-5">
        <a href="/" class="offcanvas-title" id="navbarOffcanvasLabel">
            <img style="height: 4rem" src="{{ Storage::url("public/images/media/Presto_it_logo.png") }}" alt="Home.">
        </a>
        <button type="button" class="btn-close text-reset position-absolute top-0 end-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        @auth
        <ul class="navbar-nav text-center ms-lg-auto">
            <a href="" class="text-dark fw-bold">{{ auth()->user()->email }}</a>
        </ul>
        @else
        <ul class="navbar-nav ms-auto">
            <li><a class="nav-link" href="/login"><i class="fa-solid fa-user text-nowrap">Login</i></a></li>
            <li><a class="nav-link" href="/register"><i class="fa text-nowrap">Register</i></a></li>
        </ul>
        @endauth
    </div>
    <!-- Corpo dell'Offcanvas -->
    <div class="offcanvas-body p-0 position-relative">
        @foreach ($nav as $navlink => $navname)
        <a class="text-custom-hover dropdown-item p-3" href="{{ $navlink }}">{{ $navname }}</a>
        @endforeach
        <a class="text-custom-hover dropdown-item p-3" aria-current="page" href="/announcements">{{ __('ui.annun')}}</a>
        @auth
        <a class="text-custom-hover dropdown-item p-3" aria-current="page" href="{{route('announcement.create')}}">{{ __('ui.addanon')}}</a>
        @if(auth()->user()->is_revisor)
        <a class="text-custom-hover dropdown-item p-3 position-relative" aria-current="page" href="{{route('revisor.index')}}">{{ __('ui.revi')}}
            <span class="position-absolute start-50 badge rounded-pill bg-danger">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">unread messages</span>
            </span>
        </a>
        <a class="text-custom-hover dropdown-item p-3 position-relative" aria-current="page" href="{{route('revisor.reject')}}">
            <i class="fa-solid fa-trash text-danger"></i> {{ __('ui.reje')}}
            <span class="position-absolute start-50 badge rounded-pill bg-danger">
                {{App\Models\Announcement::toBeRevisionedRejectCount()}}
                <span class="visually-hidden">unread messages</span>
            </span>
        </a>
        @endif
        @endauth
        <a href="" class="text-custom-hover dropdown-item p-3 position-relative" data-bs-toggle="modal" data-bs-target="#languageModal">{{ __('ui.Change')}}</a>
        <div class="accordion border-0 bg-white" id="categoryAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="categoryHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
                        <span class="fw-bold m-0 fs-3">{{ __('ui.categ')}}</span>
                    </button>
                </h2>
                <div id="categoryCollapse" class="accordion-collapse collapse show" aria-labelledby="categoryHeading">
                    <div class="accordion-body p-0">
                        <ul class="navbar-nav">
                            @foreach($categories as $category)
                            <li><a href="{{route('categoryShow', compact('category'))}}" class="text-custom-hover dropdown-item p-3">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>