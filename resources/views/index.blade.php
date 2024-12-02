@extends('layouts.master')
@section('content')
    {{-- banner --}}
    <div class="mx-auto text-justify md:mt-6 lg:mt-8 xl:mt-10">
        <div class="text-center bg-cover bg-no-repeat bg-center md:rounded-3xl text-white lg:h-screen  md:h-[500px]  pt-16 pb-32 shadow-inner-banner flex flex-col items-center justify-center"
            style="background-image: url('{{ Storage::url('images/banner/banner_1.png') }}');">
            <div>
                <h2 class="lg:text-5xl md:text-4xl text-3xl font-bold mb-1">Experience</h2>
                <h1 class="lg:text-6xl md:text-5xl text-4xl font-bold mb-4">THE BEST IN MINI SOCCER</h1>
                <h6 class="text-xl font-semibold">Premium fields, easy booking, and top-notch facilities.</h6>
            </div>
        </div>
    </div>


    {{-- selector --}}
    <div
        class="relative mx-auto z-10 lg:-mt-34 -mt-20 bg-white w-9/12 py-4 pl-8 pr-4 rounded-xl shadow flex flex-col space-y-6">
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
                    <input type="date" id="rent_date"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="username"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Pilih
                        Tanggal</label>
                </div>
                <div class="relative">
                    <input type="time" id="rent_time"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="username"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Jam
                        Sewa</label>
                </div>
            </div>
            <div class="flex justify-end ">
                <button type="submit" class=" bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat
                    Ketersediaan</button>
            </div>
        </form>
    </div>

    {{-- content 1 --}}
    <x-fasility-carousel />

    {{-- Content 2 --}}
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 mt-20">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="text-5xl font-bold mb-6 max-w-2xl tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                Sewa lapangan dengan cepat dan mudah.</h1>
            <h6 class="text-base mb-8 max-w-2xl font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                Punya rencana berolahraga minggu ini tapi belum tahu mau main di mana? Atau tidak ada waktu untuk datang
                langsung ke venue hanya untuk booking lapangan?</h6>
            <a href="/field-schedule" class=" bg-red-600 rounded-lg px-6 py-3 font-semibold text-white">Pesan Sekarang</a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex place-self-end">
            <img class="rounded-3xl" src="{{ asset('assets/icons/content-2.svg') }}" alt="image-content">
        </div>
    </div>


    <div class=" text-center mt-24 mb-16">
        <h1 class="font-bold text-5xl mb-6">Jadwal Sparing Mini Soccer</h1>
        <p class=" text-lg mb-10">Jadwal yang tersedia saat ini untuk melakukan sparing bersama, ayo tantang mereka</p>
        {{-- table sparing --}}
        <div class="mx-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="shadow-lg rounded-xl ring-1 ring-gray-200">
                        <th
                            class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-s-xl">
                            Tim
                        </th>
                        <th
                            class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider hidden lg:block">
                            Lokasi
                        </th>
                        <th
                            class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Waktu
                        </th>
                        <th
                            class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider sm:block hidden">
                            Tanggal
                            <i class="fas fa-sort-down"></i>
                        </th>
                        <th class="px-5 py-3 bg-white rounded-e-xl"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="px-5 py-2 bg-transparent"></td>
                    </tr>
                    @forelse ($sparings as $sparing)
                        <tr class="shadow-lg rounded-xl ring-1 ring-gray-200">
                            <td class="p-4 bg-white text-sm rounded-s-xl ">
                                <div class="flex items-center text-left">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="w-full h-full rounded-full"
                                            src="{{ asset('assets/images/profile.svg') }}"
                                            alt="Profile image of Real Madrid">
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap font-semibold">
                                            {{ $sparing->createdBy->team }}</p>
                                        <p class="text-gray-600 whitespace-no-wrap lg:hidden">Jl. Jenderal Sudirman No. 45
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-7 px-4 text-left bg-white text-sm hidden lg:block">
                                <p class="text-gray-900 whitespace-no-wrap">Jl. Jenderal Sudirman No. 45</p>
                            </td>
                            <td class="py-7 px-4 text-left bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap sm:hidden">
                                    {{ $sparing->listBooking->formatted_date }}</p>
                                <p class="text-gray-900 whitespace-no-wrap">{{ $sparing->listBooking->formatted_session }}
                                </p>
                            </td>
                            <td class="py-7 px-4 text-left bg-white text-sm hidden sm:block">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $sparing->listBooking->formatted_date }}</p>
                            </td>
                            <td class="py-7 px-4 text-center bg-white text-sm rounded-e-xl">
                                <a href="{{ route('sparing.index') }}" class="text-black font-semibold">Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="px-5 py-2 bg-transparent"></td>
                        </tr>
                    </tbody>
                    @empty
                    <tr>
                        <td colspan="4" class="px-5 py-2 bg-transparent">Tidak ada Sparing</td>
                    </tr>
                @endforelse
            </table>
        </div>

        {{-- content 3 --}}
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 mt-20">
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img class="rounded-3xl" src="{{ asset('assets/icons/content-2.svg') }}" alt="image-content">
            </div>
            <div class="mr-auto place-self-center lg:col-span-7 md:text-left text-right">
                <h1
                    class="text-5xl font-bold mb-6 max-w-2xl tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Sudah punya team tapi gak tau mau lawan siapa?</h1>
                <h6
                    class="text-base mb-8 max-w-2xl font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    SKY CLUB punya solusinya! Ikuti komunitas sparing kami dan temukan lawan tanding yang seimbang.
                    Tingkatkan skill dan nikmati pertandingan seru dengan berbagai tim di sini!</h6>
                <a href="/sparing" class=" bg-red-600 rounded-lg px-6 py-3 font-semibold text-white">Lihat Selengkapnya</a>
            </div>
        </div>

        {{-- testimonial --}}
        <div class=" text-center space-y-6 mt-24 mb-16">
            <h1 class="font-bold text-5xl">Testimonial</h1>
            <p class=" text-lg">Testimonials dari teman-teman Sky Club</p>
        </div>

        <div x-data="carousel()">
            <div class="relative max-w-full overflow-hidden hidden lg:block">
                <!-- Previous Button -->
                <button @click="prevSlide"
                    class="absolute left-1 top-1/2 transform -translate-y-1/2 bg-white border border-gray-300 rounded-full size-14 flex items-center justify-center shadow hover:bg-gray-100 z-10">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </button>

                <!-- Slider Container -->
                <div class="flex transition-transform duration-500"
                    :style="`transform: translateX(-${currentSlide * (100 / visibleCards)}%)`">
                    <template x-for="(slide, index) in slides" :key="index">
                        {{-- rating card --}}
                        <div class="flex-shrink-0 w-full sm:w-1/3 p-8">
                            {{-- <div @click="console.log(slide)"  --}}
                            <div @click="ratingModal = true;  selectedSlide = slide"
                                class="border border-gray-200 rounded-lg bg-white p-6 space-y-6 hover:shadow-xl transform hover:-translate-y-1 transition duration-300 cursor-pointer">
                                <div class="text-yellow-500 text-left" x-text="'⭐'.repeat(parseInt(slide.rating))">⭐</div>
                                <p class="text-gray-600 text-left" x-text="slide.comment"></p>
                                <div class="flex space-x-4">
                                    <img class="rounded-full" src="{{ asset('assets/images/profile.svg') }}"
                                        alt="">
                                    <div>
                                        <p class=" font-semibold text-left" x-text="slide.user.name"></p>
                                        <p class="text-gray-500 text-sm text-left" x-text="slide.user.team"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Next Button -->
                <button @click="nextSlide"
                    class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-white border border-gray-300 rounded-full size-14 flex items-center justify-center shadow hover:bg-gray-100 z-10">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>

                <!-- Rating Modal -->
                <div x-show="ratingModal" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-20 ">
                    <div @click.away="ratingModal = false" class="bg-white p-6 rounded-lg shadow-lg w-8/12">
                        <div class="flex justify-end">
                            <button @click="ratingModal = false" class="hover:text-gray-900 text-gray-400 rounded-lg p-2">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                        <div class="text-yellow-500 text-left mb-4" x-text="'⭐'.repeat(parseInt(selectedSlide?.rating))">
                            ⭐⭐⭐⭐⭐</div>
                        <p class="text-gray-600 text-left mb-4" x-text="selectedSlide?.comment"></p>
                        <div class="flex space-x-4 mb-4">
                            <img class="rounded-full w-12 h-12"
                                :src="`{{ asset('assets/images/') }}/${selectedSlide?.image}`" alt="">
                            <div>
                                <p class="font-semibold text-left" x-text="selectedSlide?.user.name"></p>
                                <p class="text-gray-500 text-sm text-left" x-text="selectedSlide?.user.team"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-10 lg:hidden block">
                <template x-for="(slide, index) in slides" :key="index">
                    <div class=" border-b-2 border-gray-200 bg-white py-6 space-y-6 text-left ">
                        <div class="flex space-x-4">
                            <img class="rounded-full" src="{{ asset('assets/images/profile.svg') }}" alt="">
                            <div>
                                <p class=" font-semibold" x-text="slide.user.name">Allan Raditya Hutomo</p>
                                <div class="text-yellow-500" @click="console.log(slide)">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>
                        <p class="text-gray-600" x-text="slide.comment"></p>
                    </div>
                </template>

                {{-- pagination --}}
            </div>
        </div>

        {{-- blog --}}
        <div class="mt-20 mx-10">
            <div class="grid grid-row-1 space-y-4 content-center text-left">
                <h6 class="text-base font-bold">Artikel</h6>
                <h1 class="text-5xl font-bold">Apa Yang Baru</h1>
                <h5 class="text-base">Berikut adalah artikel-artikel terkait SKY CLUB</h5>
            </div>
            <div class="grid lg:grid-cols-3 grid-cols-1 justify-between mt-10 lg:space-y-0 space-y-6 gap-8">
                @foreach($moreArticlesData as $moreArticleData)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 lg:grid-rows-2 lg:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 transform hover:-translate-y-1 transition duration-300 hover:shadow-xl">
                        <a class="hidden sm:block bg-cover h-72" href="{{ route('article.userShow', $moreArticleData['id']) }}">
                            <img class="rounded-s-lg lg:rounded-none lg:rounded-t-lg h-full object-cover w-full" src="{{ $moreArticleData['image'] }}" alt="" />
                        </a>

                        <div class="p-4 text-left">
                            <div class="">
                                <a href="{{ route('article.userShow', $moreArticleData['id']) }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $moreArticleData['title'] }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 break-words">{{ $moreArticleData['paragraph'] }}</p>
                            </div>
                            <div class="flex space-x-4 items-center mt-10">
                                <img class="rounded-full" src="{{ asset('assets/images/profile.svg') }}" alt="">
                                <div>
                                    <p class="text-xs md:text-sm font-semibold">{{ $moreArticleData['created_by'] }}</p>
                                    <p class="text-xs md:text-sm">{{ $moreArticleData['created_at'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end my-10">
                <a href="/article" type="submit" class=" bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat
                    Semuanya</a>
            </div>
        @endsection
        @section('script')
            <script>
                function carousel() {
                    return {
                        currentSlide: 0,
                        visibleCards: 3,
                        slides: @json($reviews)
                            /*[{
                                text: "Sebagai penggemar mini soccer, saya sangat mengapresiasi lapangan di SKY CLUB. Rumput sintetisnya jelas terasa standar FIFA, membuat permainan jauh lebih menyenangkan dan aman. Tidak perlu khawatir dengan cedera, karena daya serap benturannya sangat baik. Sangat puas dengan kualitasnya!",
                                name: "Allan Raditya Hutomo",
                                club: "Jaya Club",
                                image: "profile1.jpg"
                            },]*/
                            ,
                        get totalSlides() {
                            return this.slides.length;
                        },
                        prevSlide() {
                            if (this.currentSlide > 0) {
                                this.currentSlide--;
                            }
                        },
                        nextSlide() {
                            if (this.currentSlide < this.totalSlides - this.visibleCards) {
                                this.currentSlide++;
                            }
                        },
                        selectedSlide: null,
                        ratingModal: false,
                    };
                }
            </script>
        @endsection
