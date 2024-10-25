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
    <div class="min-h-full px-16 space-y-20 mb-10">
        <div class="mt-17.5">
            <p class="font-semibold text-base mb-4">Sparing</p>
            <h1 class="font-bold text-5xl mb-6">Daftar Sparing</h1>
            <p class="text-lg">Berikut adalah list data sparing yang tersedia saat ini.</p>
        </div>
        <div class="grid gap-x-2.5 gap-y-8 grid-cols-2">
            @for ($x = 0; $x < 12; $x++)
            <div class="p-8 rounded-lg border border-gray-500">
                <div class="mb-8">
                    <div class="flex space-x-4 items-center mb-4">
                        <img class=" rounded-full" src="{{ Storage::url('images/profile.svg') }}" alt="">
                        <p class="font-semibold text-2xl">Real Madrid</p>
                    </div>
                    <p class="mb-6 text-lg">Nyari lawan yang keras boss!!</p>
                    <div class="flex justify-between text-lg">
                        <div class="flex space-x-3">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                              </svg>
                            <p>Jl. Jenderal Sudirman No. 45</p>
                        </div>
                        <div class="flex space-x-3">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                              </svg>
                            <p>13.00 -15.00</p>
                        </div>

                        <div class="flex space-x-3">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                              </svg>
                            <p>22 Sep 2024</p>
                        </div>
                    </div>
                </div>
                <a href="/" class=" bg-red-600 rounded-lg px-6 py-3 font-semibold text-white text-base">Ayo Sparing</a>
            </div>
            @endfor
        </div>
    </div>

    <x-bottom></x-bottom>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
