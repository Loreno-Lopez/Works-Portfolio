<!doctype html>
<html lang="en">
@livewireStyles

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? ''}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/747222a0ae.js" crossorigin="anonymous"></script>

</head>

<body>
    <main class="d-flex flex-column min-vh-100 position-relative">
        <div class="sticky-top">
            <x-navbar />
        </div>

        <div>
            <x-navbar_mobile_modal />
        </div>

        <div>
            <x-navbar_mobile_modal_logout />
        </div>

        <div>
            <x-language_modal />
        </div>

        <div>
            {{ $slot }}
        </div>

        <footer class="mt-auto">
            <x-footer />
        </footer>
    </main>
    @livewireScripts
   
</body>

</html>