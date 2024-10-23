<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full">
    <x-navbar></x-navbar>
    <div class=" text-center mt-17.5">
        <p class="mb-4 font-semibold">Aritcle</p>
        <h1 class="mb-4 font-bold text-56">Kumpulan Artikel</h1>
        <p class="">Artikel mengenai kegiatan dan event yang berlangsung pada Sky Club</p>
    </div>
    <div class="py-20 px-16 grid gap-8 lg:grid-cols-3 md:grid-cols-2">
        @for ($x = 0; $x < 12; $x++)
            <div class="border rounded-2xl" style="width: 416px">
                <img src="{{ Storage::url('images/blog-image.svg') }}" alt="">
                <div class=" flex-col p-6 space-y-6">
                    <div class="max-w-sm space-y-2">
                        <p class=" text-sm font-semibold">Pertandingan</p>
                        <h4 class=" text-2xl font-bold">Persija vs Areama FC</h4>
                        <p class="text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>
                    </div>
                    <div class="flex space-x-4">
                        <img class=" rounded-full" src="{{ Storage::url('images/profile.svg') }}" alt="">
                        <div>
                            <p class=" font-semibold">Jamal Sigh</p>
                            <p>11 Jan 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <x-bottom></x-bottom>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
