<x-main>
    <x-slot:title>About-Us</x-slot:title>
    <div class="container">
        <div class=" content shadow">
            <h3 style="color: #FF9F1C" class="mb-3">{{ __('ui.Presto.ithistory')}}</h3>
            <p>
            {{ __('ui.history1')}}<br>
                <br>
                {{ __('ui.history2')}}<br>
                <br>
                {{ __('ui.history3')}}<br>
                <br>
                {{ __('ui.history4')}}<br>
                <br>
                {{ __('ui.history5')}}<br>
                <br>
                {{ __('ui.history6')}}
            </p>
            <h3 style="color: #FF9F1C" class="mt-4 mb-3">{{ __('ui.Presto.itstaffmembers')}}</h3>
            <div class="container-fluid">
                <div class="row">
                    <!-- Card di Antony -->
                    <div class="card mb-3 col-12 col-md-6 mx-auto" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ Storage::url("public/DevPics/Antony_Dev.jpeg") }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 style="color: #00ac96" class="card-title">Antony De Lellis</h5>
                                    <p style="font-size: 0.9rem" class="card-text"> {{ __('ui.antonydev')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card di Biagio -->
                    <div class="card mb-3 col-12 col-md-6 mx-auto" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ Storage::url("public/DevPics/Biagio_Dev.jpeg") }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 style="color: #00ac96" class="card-title">Biagio Trotta</h5>
                                    <p style="font-size: 0.9rem" class="card-text">{{ __('ui.biagiodev')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card di Loreno -->
                    <div class="card mb-3 col-12 col-md-6 mx-auto" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ Storage::url("public/DevPics/Lore_Dev.png") }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 style="color: #00ac96" class="card-title">Cristian Loreno Lopez</h5>
                                    <p style="font-size: 0.9rem" class="card-text">{{ __('ui.lorenodev')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card di Tommaso -->
                    <div class="card mb-3 col-12 col-md-6 mx-auto" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ Storage::url("public/DevPics/Tommaso_Dev.jpeg") }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 style="color: #00ac96" class="card-title">Tommaso Coppolino</h5>
                                    <p style="font-size: 0.9rem" class="card-text">{{ __('ui.tommasodev')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>