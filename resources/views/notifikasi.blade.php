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
            <p class="font-semibold text-base mb-4">Notifikasi</p>
            <h1 class="font-bold text-5xl mb-6">Notifikasi</h1>
            <p class="text-lg">Berikut adalah list notifikasi yang tersedia saat ini.</p>
        </div>
        <div class="w-full space-y-2.5">
            @for ($x = 0; $x < 12; $x++)
            <div class="px-4 py-2 rounded-lg shadow flex justify-between items-center text-base">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                    </div>
                    <div class="ml-9 text-sm">
                      <label for="remember" class="text-black dark:text-gray-300 font-medium">Remember me</label>
                    </div>
                </div>
                <span>Pembayaran anda telah berhasil, silahkan cek akun anda untuk detail lebih lanjut</span>
                <span>Jan 11, 2050</span>
            </div>
            @endfor
        </div>
    </div>

    <x-bottom></x-bottom>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
