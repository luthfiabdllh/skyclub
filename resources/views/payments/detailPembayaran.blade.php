<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="h-full">
    <x-navbar></x-navbar>
    @php
        $harga_total = $booking_cart['total'];
        $voucher = $booking_cart['voucher'];
        $list_schedules = $booking_cart['list_schedules'];
    @endphp
    <div class="min-h-full px-16 my-12">
        <div class=" grid grid-cols-2 gap-10">
            <div>
                <h2 class=" font-bold text-3xl mb-4">Detail Pembayaran</h2>
                <h4 class=" font-bold text-2xl mb-5">Lapangan Mini Soccer SKY CLUB</h4>
                <div class="flex items-center mb-4">
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    <p class=" font-bold text-2xl">4.9</p>
                    <span class="w-1.5 h-1.5 mx-1.5 bg-black rounded-full dark:bg-gray-400"></span>
                    <p class=" font-bold text-2xl">Lokasi</p>
                </div>
                <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
                <h4 class=" font-bold text-2xl">Lapangan Mini Soccer SKY CLUB</h4>
                <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
                <div class="space-y-1">
                    @foreach ($list_schedules as $schedule)
                        <div>
                            <div class="flex items-center">
                                <span class="w-1.5 h-1.5 mx-1.5 bg-black rounded-full dark:bg-gray-400"></span>
                                <p>{{ $schedule['date'] }}</p>
                            </div>
                            <div
                                class="flex items-center justify-between border-s-8 border-red-600 bg-white p-2.5 font-bold text-base rounded-xl">
                                <p>{{ str_pad($schedule['session'] - 1, 2, '0', STR_PAD_LEFT) . ':00 - ' . str_pad($schedule['session'], 2, '0', STR_PAD_LEFT) . ':00' }}
                                </p>
                                {{-- <p>{{ $schedule['session'] < 9 ? '0'.$schedule['session']+1.":00" : $schedule['session']+1.":00" }}</p> --}}
                                <p>{{ 'Rp. ' . $schedule['price'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
                <div class="flex justify-between mb-4">
                    <h5 class=" font-bold text-2xl">Metode Pembayaran</h5>
                    {{-- <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                    </svg> --}}
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </div>
                <div class="flex justify-between shadow bg-white rounded-lg items-center p-2.5 text-base">
                    <div class="flex items-center space-x-2">
                        <img src="{{ Storage::url('images/Transfer_bank.svg') }}" alt="">
                        <p>Transfer Bank</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input id="default-radio-1" type="radio" value="" name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ms-2 font-medium text-gray-900 dark:text-gray-300 ">Rp.
                            {{ $harga_total }}</label>
                    </div>
                </div>

            </div>
            <div class=" space-y-4">
                <button
                    class="w-full py-3 border-2 border-red-600 text-center text-base rounded-xl font-bold text-red-600 flex items-center justify-center">
                    <img src="{{ Storage::url('images/icon_voucher.svg') }}" alt="Voucher Icon" class="w-5 h-5 mr-2">
                    Gunakan Voucher
                </button>
                <div class="border border-gray-600 p-5 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <img class="rounded-xl h-[100px]" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                        <div>
                            <h3 class="font-bold text-2xl">Lapangan Mini Soccer SKY CLUB</h3>
                            <div class="flex items-center mb-4">
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <p class=" font-bold text-2xl mx-1.5">4.9</p>
                                <p class=" font-semibold text-2xl">(120 Reviews)</p>
                            </div>
                        </div>
                    </div>
                    <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
                    <h3 class=" text-2xl font-bold mb-4">Detail Harga</h3>
                    <div class=" text-base space-y-1">
                        <div class="flex items-center justify-between">
                            <p>Biaya Sewa</p>
                            <p>Rp. {{ $harga_total }}</p>
                        </div>
                        {{-- <div class="flex items-center justify-between">
                            <p>Biaya Tambahan</p>
                            <p>Rp. 0</p>
                        </div> --}}
                        <div class="flex items-center justify-between">
                            <p>Potongan Voucher</p>
                            <p>Rp. {{ $voucher }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p>Biaya Transaksi</p>
                            <p>Rp. 0</p>
                        </div>
                    </div>
                    <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
                    <div class="flex items-center justify-between">
                        <p class=" font-bold text-2xl">Total</p>
                        <p class=" font-bold">Rp. {{ $harga_total - $voucher }}</p>
                    </div>
                </div>

                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <button
                        class="w-full py-3 border-2 bg-red-600 text-center text-2xl rounded-xl font-bold text-white flex items-center justify-center">
                        <img src="{{ Storage::url('images/icon_shield.svg') }}" alt="Voucher Icon" class="mr-2">
                        Bayar
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
