<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SkyClub</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full">
    <x-navbar></x-navbar>

    {{-- <main class="min-h-full px-26 my-10">
        @yield('content')
    </main> --}}
    <main class="min-h-full px-4 sm:px-6 md:px-10 lg:px-18 xl:px-26">
        @yield('content')
    </main>

    <x-bottom></x-bottom>
    <script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>
</body>
@yield('script')
</html>
