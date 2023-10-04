<footer class="footer">
    <ul class="footer__nav">
        <li class="nav__item">
            <h2 class="nav__title fw-bold">{{ __('ui.About-Us1')}}</h2>

            <ul class="nav__ul">
                <li>
                    <a class="text_link_color" href="{{ route('aboutUs') }}">Presto.it Team</a>
                </li>
            </ul>
        </li>


        <li class="nav__item">
            <h2 class="nav__title fw-bold">{{ __('ui.categ')}}</h2>
            <ul class="list-unstyled row text-light">
                @foreach($categories as $index => $category)
                @if ($index % 5 === 0)
                </div>
                <div class=" col-2 me-auto">
                    @endif
                    <li class="col-2 me-auto text-nowrap">
                        <a class="text-light text_link_color" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a>
                    </li>
                    @endforeach
            </ul>
        </li>

        </div>

        <li class="nav__item">
            <h2 class="nav__title fw-bold">{{ __('ui.Legal1')}}</h2>

            <ul class="nav__ul">
                <li>
                    <a class="text_link_color" href="{{ route('privacypolicy') }}">{{ __('ui.privacy1')}}</a>
                </li>

                <li>
                    <a class="text_link_color" href="{{ route('termsofuse')}}">{{ __('ui.TermsofUseof1')}}</a> 
                </li>
            </ul>
        </li>
    </ul>



    <div class="footer__addr text-start text-md-center">
        <h2 class="fw-bold">{{ __('ui.contt')}}</h2>
        <address>
            <h6>5534 Somewhere In. The World 22193-10212</h6>
            <a style="letter-spacing: 1px" class="text-uppercase btn-custom-greenwater fa" href="{{route('contacts')}}">{{ __('ui.em')}}</a>
        </address>

    </div>
    <div class="row d-flex aligh-items-center">
        <div class="legal">
            <div class="col-12 col-md-6">
                <p class="m-0">&copy; 2023 Something. All rights reserved.</p>
            </div>
            <div class="col-12 col-md-6">
                <div class="legal__links d-flex justify-content-md-end">
                    <img style="height: 5rem" class="m-2" src="{{ Storage::url("public/images/media/Code_Connexion_logo_W.png") }}" alt="">
                </div>
            </div>
        </div>
    </div>
</footer>