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

    <div class="min-h-full px-16 my-12">
        {{-- gallery --}}
        <div class="grid grid-cols-3 grid-flow-col gap-4" style="height: 670px">
            <div class="col-span-2 row-span-2 rounded-s-3xl bg-black overflow-hidden group">
                <img class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                     src="{{ Storage::url('images/album_1.svg') }}" alt="">
            </div>

            <div class="bg-cover rounded-tr-3xl overflow-hidden group">
                <img class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                     src="{{ Storage::url('images/album_2.svg') }}" alt="">
            </div>

            <div class="relative bg-cover rounded-br-3xl overflow-hidden group">
                <img class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-110"
                     src="{{ Storage::url('images/album_3.svg') }}" alt="">
                <a href="/" class="absolute bottom-5 right-5 bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat Semua Foto</a>
            </div>

        </div>
        {{-- cart & desc --}}
        <div class="flex justify-between my-12">
            <div style="width: 812px">
                <div class=" space-y-1">
                    <h1 class=" text-4.5xl font-bold">SKY CLUB MINI SOCCER</h1>
                    <div class="flex space-x-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                          </svg>

                        <p class=" text-lg">Puncak Kab. Bogor</p>
                    </div>
                    <div class="flex">
                        <div class="flex items-center border rounded-lg px-2.5">
                            <p class="text-sm font-bold text-gray-900 dark:text-white">4.95</p>
                            <svg class="ms-1 w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        </div>
                        <p class="p-2.5 text-sm font-medium"><span class=" font-bold">Very Good</span> 231 Reviews</p>
                    </div>
                </div>
                <hr class="h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
                <div>
                    <h3 class="mb-4 text-3xl font-bold">Deskripsi</h3>
                    <p class="leading-loose">Lapangan mini soccer di SKY CLUB dilengkapi dengan rumput sintetis berkualitas standar FIFA, memberikan permukaan yang rata dan stabil untuk permainan yang optimal. Dengan pencahayaan canggih, lapangan ini siap digunakan sepanjang hari, bahkan di malam hari. Rumput sintetis kami tahan segala cuaca, sehingga lapangan tetap nyaman dimainkan kapan pun. Lapangan ini cocok untuk pertandingan 5-a-side dan 7-a-side, dengan daya serap benturan yang baik untuk meminimalkan risiko cedera.....</p>
                </div>
                <hr class="h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
                <div class="space-y-8">
                    <h3 class=" text-3xl font-bold">Fasilitas</h3>
                    <div class="grid grid-cols-2">
                        <div class=" space-y-10">
                            <div class="flex items-center space-x-8 text-2xl">
                                <img src="{{ Storage::url('images/icon_mosque.svg') }}" alt="">
                                <p class="ml-2">Mushola</p>
                            </div>
                            <div class="flex items-center space-x-8 text-2xl">
                                <img src="{{ Storage::url('images/icon_parking.svg') }}" alt="">
                                <h1>Parkir Penonton</h1>
                            </div>
                            <div class="flex items-center space-x-8 text-2xl">
                                <img src="{{ Storage::url('images/icon_bed.svg') }}" alt="">
                                <P>Tribun Area</P>
                            </div>
                            <div class="flex items-center space-x-8 text-2xl">
                                <img src="{{ Storage::url('images/icon_wifi.svg') }}" alt="">
                                <P>Wifi</P>
                            </div>
                        </div>
                        <div class=" space-y-10">
                            <div class="flex items-center space-x-8 text-2xl">
                                <img src="{{ Storage::url('images/icon_toilet.svg') }}" alt="">
                                <P>Toilet</P>
                            </div>
                            <div class="flex items-center space-x-8 text-2xl">
                                <img src="{{ Storage::url('images/icon_shower.svg') }}" alt="">
                                <P>Shower</P>
                            </div>
                            <div class="flex items-center space-x-8 text-2xl">
                                <img src="{{ Storage::url('images/icon_eat.svg') }}" alt="">
                                <P>Kantin</P>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="/" class="border border-red-400 rounded p-2 font-semibold text-red-500">Lihat Semua Fasilitas</a>
                    </div>
                </div>
                <hr class="h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">

            </div>
            <div class="border px-5 py-8 bg-white rounded-2xl max-h-fit space-y-7" style="width: 490px">
                <div>
                    <h4 class="font-bold text-2xl">Mulai dari</h4>
                    <p class=" font-bold text-4xl">Rp. 600.000,00 <span class=" text-xl">/Sesi</span></p>
                </div>
                <div>
                    <p class=" font-semibold text-lg">Tanggal Pesanan</p>
                    <p class=" text-lg text-gray-500">2/19/2022</p>
                </div>
                @for ($x = 0; $x < 3; $x++)
                <div class="w-full flex justify-between items-center border border-gray-500 text-lg rounded-xl py-2 px-4">
                    <div>
                        <p>120 Menit</p>
                        <p>14.00 - 16.00</p>
                    </div>
                    <div class="flex items-center space-x-7">
                        <p>Rp. 1.000.000</p>
                        <svg class="w-6 h-6 text-gray-500 hover:text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                          </svg>
                    </div>
                </div>
                @endfor
                <hr class="h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
                <div class="flex justify-between text-2xl font-semibold">
                    <p>Total Harga</p>
                    <p>Rp. 1.000.000</p>
                </div>
                <div class="flex items-stretch space-x-8">
                    <a href="" class="bg-red-600 w-full text-center py-3 rounded-lg font-bold text-white">Bayar</a>
                    <a href="" class="border-2 border-red-600 w-full text-center py-3 rounded-lg font-bold text-red-600">+Keranjang</a>
                </div>
            </div>
        </div>

            {{-- customer testimoni --}}
        <div class=" space-y-10">
            <div >
                <h2 class="text-4xl font-bold">Customer Testimonials</h2>
                <h6 class="text-lg">Kesan dari kawan kawan SKY CLUB</h6>
            </div>
            <div class="grid grid-cols-3 gap-8">
                @for ($x = 0; $x < 3; $x++)
                <div class=" space-y-8">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                    </div>
                    <p>"Lapangan di SKY CLUB sangat nyaman dan aman. Permukaannya rata, jadi permainan berjalan lebih lancar. Saya sangat puas dengan kualitasnya!"</p>
                    <div>
                        <img class=" rounded-full w-14 mb-4"  src="{{ Storage::url('images/profile.svg') }}" alt="">
                        <p class="text-base font-bold">Budi Santoso</p>
                        <p class="text-base">Pemain Komunitas</p>
                    </div>
                </div>
                @endfor
            </div>
            <hr class="h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
            <div class="rounded-lg border border-gray-300">
                <div class=" grid p-12 space-y-8">
                    <div>
                        <p class="text-3xl font-bold">Lokasi Venue</p>
                        <p class="text-xl font-bold">Jalan Raya Palsu No. 123,  Kota Bogor, Jawa Barat, 16111</p>
                    </div>
                    <iframe class="w-full h-[27rem]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.299606239549!2d110.36796849553049!3d-7.77393531109345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a584a6eaf7cbb%3A0x294cd98559dc9c8c!2sSekolah%20Vokasi%20UGM!5e0!3m2!1sid!2sid!4v1729779883264!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>


    <x-bottom></x-bottom>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script>
        const zoomImage = document.getElementById('zoomImage');

        // Listen for mouse movement on the image container
        zoomImage.parentElement.addEventListener('mousemove', (e) => {
            // Get the position of the mouse relative to the image
            const rect = zoomImage.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;

            // Update the transform origin based on mouse position
            zoomImage.style.transformOrigin = `${x}% ${y}%`;
        });

        // Reset transform origin when mouse leaves
        zoomImage.parentElement.addEventListener('mouseleave', () => {
            zoomImage.style.transformOrigin = 'center center';
        });
    </script>
</body>
</html>
