<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="min-h-full">
    <x-navbar></x-navbar>
    @php
        $max_payment = $booking_cart['order_date']->addMinutes(5);
        $diffInSeconds = now()->diffInSeconds($max_payment);
        dd($diffInSeconds);
    @endphp
    <div class="my-10" x-data="countdownTimer({{ $diffInSeconds }})">
        {{-- <div class="my-10" x-data="countdownTimer(5 * 60)"> --}}
        <div class="border bg-white shadow p-5 rounded-xl px-[70px] py-[40px] mx-auto w-[765px] space-y-10">
            <div class="flex flex-col items-center text-center font-bold">
                <p class=" text-2xl ">Selesaikan pembayaran sebelum</p>
                <div
                    class="text-red-600 bg-gray-200 w-fit px-3 py-2 rounded-xl space-x-1 flex items-center text-2xl my-2">
                    <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <p x-text="formattedTime">5:00</p>
                </div>
                <p class=" text-lg">Kirim Bukti Pembayaran Sebelum</p>
                <p class=" text-lg">Rabu, 18 September 2024 18:44</p>
            </div>
            <div class="p-3 border border-gray-500 rounded-lg text-lg">
                <div class="flex justify-between items-center">
                    <p>Transfer Bank</p>
                    <img src="{{ Storage::url('images/Transfer_bank.svg') }}" alt="">
                </div>
                <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
                <div class="flex justify-between items-center">
                    <div class=" space-y-1">
                        <p>Nomor Rekening</p>
                        <p class=" font-bold">45663245</p>
                    </div>
                    <a href="/" class="flex font-semibold">
                        <span>Salin</span>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white ml-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M9 8v3a1 1 0 0 1-1 1H5m11 4h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v1m4 3v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-7.13a1 1 0 0 1 .24-.65L7.7 8.35A1 1 0 0 1 8.46 8H13a1 1 0 0 1 1 1Z" />
                        </svg>
                    </a>
                </div>
                <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
                <div class="flex justify-between items-center">
                    <div class=" space-y-1">
                        <p>Total Tagihan</p>
                        <p class=" font-bold">Rp. 705.000</p>
                    </div>
                    <a href="/" class="font-semibold">Lihat Detail</a>
                </div>
            </div>
            <div class="p-3 border border-gray-400 rounded-lg space-y-2">
                <p class=" text-lg">Upload Bukti Pembayaran</p>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" name="photo" />
                    </label>
                </div>
            </div>
            <button
                class="w-full py-3 border-2 bg-red-600 text-center text-2xl rounded-xl font-bold text-white flex items-center justify-center">
                <img src="{{ Storage::url('images/icon_shield.svg') }}" alt="Voucher Icon" class="mr-2">
                Kirim
            </button>
        </div>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script>
        function countdownTimer(duration) {
            return {
                time: duration,
                formattedTime: '',
                init() {
                    this.updateFormattedTime();
                    this.startCountdown();
                },
                startCountdown() {
                    const interval = setInterval(() => {
                        if (this.time > 0) {
                            this.time--;
                            this.updateFormattedTime();
                        } else {
                            clearInterval(interval);
                        }
                    }, 1000);
                },
                updateFormattedTime() {
                    const minutes = Math.floor(this.time / 60);
                    const seconds = this.time % 60;
                    this.formattedTime = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                }
            };
        }
    </script>
</body>

</html>
