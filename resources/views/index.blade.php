@extends('layouts.master')
@section('content')

    {{-- banner --}}
    <div class="mx-auto text-justify mt-3">
        <div class="text-center bg-cover bg-no-repeat bg-center rounded-3xl text-white h-screen pt-32 shadow-inner-banner" style="background-image: url('{{ Storage::url('images/banner.svg') }}');">
            <h2 class="text-5xl font-bold mb-1">Experience</h2>
            <h1 class="text-6xl font-bold mb-4">THE BEST IN MINI SOCCER</h1>
            <h6 class="text-xl font-semibold">Premium fields, easy booking, and top-notch facilities.</h6>
        </div>
    </div>

    {{-- selector --}}
    <div class="relative z-10 -mt-36 bg-white mx-32 py-4 pl-8 pr-4 rounded-xl shadow flex flex-col space-y-6">
        <div class=" flex items-start text-base font-semibold px-3.5">
            <button class="active:border-b-4 border-red-600 mr-8 cursor-pointer">
                Sewa Lapangan
            </button>
            <div class="h-8 border-l-2 border-gray-200"></div>
            <button class="active:border-b-4 border-red-600 ml-8 cursor-pointer">
                Sparing
            </button>
        </div>
        <form action="/" method="get">
        

            <div class="space-x-6 grid grid-flow-col justify-stretch mb-4">
                <div class="relative">
                    <input type="date" id="rent_date" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    <label for="username" class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Pilih Tanggal</label>
                </div>
                <div class="relative">
                    <input type="time" id="rent_time" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    <label for="username" class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Jam Sewa</label>
                </div>
            </div>
            <div class="flex justify-end ">
                <button type="submit" class=" bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat Ketersediaan</button>
            </div>
        </form>
    </div>

    {{-- content 1 --}}
    <x-fasility-carousel/>

    {{-- Content 3 --}}
    <div class="pt-44 flex justify-between space-x-20">
        <div class="content-center">
            <h1 class="text-5xl font-bold mb-6">Sewa lapangan dengan cepat dan mudah.</h1>
            <h6 class="text-base mb-8">Punya rencana berolahraga minggu ini tapi belum tahu mau main di mana? Atau tidak ada waktu untuk datang langsung ke venue hanya untuk booking lapangan?</h6>
            <a href="/" class=" bg-red-600 rounded-lg px-6 py-3 font-semibold text-white">Pesan Sekarang</a>
        </div>
        <img class="rounded-3xl" src="{{ Storage::url('images/content-2.svg') }}" alt="image-content">
    </div>
    <div class="pt-44 flex justify-between space-x-20">
        <img class="rounded-3xl" src="{{ Storage::url('images/content-2.svg') }}" alt="image-content">
        <div class="content-center">
            <h1 class="text-5xl font-bold mb-6">Sudah punya team tapi gak tau mau lawan siapa?</h1>
            <h6 class="text-base mb-8">SKY CLUB punya solusinya! Ikuti komunitas sparing kami dan temukan lawan tanding yang seimbang. Tingkatkan skill dan nikmati pertandingan seru dengan berbagai tim di sini!</h6>
            <a href="/" class=" bg-red-600 rounded-lg px-6 py-3 font-semibold text-white">Lihat Selengkapnya</a>
        </div>
    </div>

    {{-- blog --}}
    <div class="pt-44">
        <div class="grid grid-row-1 space-y-4 content-center">
            <h6 class="text-base font-bold">Blog</h6>
            <h1 class="text-5xl font-bold">Apa Yang Baru</h1>
            <h5 class="text-base">Berikut adalah artikel-artikel terkait SKY CLUB</h5>
        </div>
        <div class="flex justify-between pt-20" >
            @for ($x = 0; $x < 3; $x++)
                <div class="border" style="width: 416px">
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
        <div class="flex justify-end pt-20">
            <button type="submit" class=" bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat Semuanya</button>
        </div>
    </div>

@endsection
