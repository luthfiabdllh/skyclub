@extends('layouts.master')
@section('content')
<div class="flex flex-col items-center">
    <div class=" relative bg-cover rounded-xl overflow-hidden group w-full h-banner-profile">
        <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
        <a href="/" class="absolute bottom-5 right-5 bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat Semua Foto</a>
    </div>
    <div class="relative">
        <div class="-mt-20 relative bg-cover rounded-full overflow-hidden group size-40 ring-4 ring-red-700">
            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
        </div>
        <button class="absolute bottom-0 right-0 p-2.5 bg-red-600 rounded-full">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
                </svg>
        </button>
        <img class="absolute top-0 left-0 -mt-20" src="{{ Storage::url('images/verified.svg')}}" alt="">
    </div>
</div>
<div class="mt-8 flex flex-col items-center space-y-2">
    <h5 class=" text-2xl font-semibold">John Doe</h5>
    <p class="text-base text-gray-700">john.doe@gmail.com</p>
</div>

<div>
    <div class="mt-8 pt-4 px-6 shadow bg-white rounded-lg">
        <div class="flex justify-evenly flex-wrap -mb-px text-sm font-semibold"
        id="tab-menu" data-tabs-toggle="#default-tab-content" role="tablist">
            <div class="text-center px-60 py-4 "
            role="presentation" id="account-tab" data-tabs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">
                <button class="inline-block" >Account</button>
            </div>
            <div class="border-l border-gray-400 h-7 my-auto"></div>
            <div class="text-center px-60 py-4"
            role="presentation" id="history-tab" data-tabs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="false">
                <button class="inline-block hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" >History</button>
            </div>
        </div>
    </div>

    <div id="tab-menu" class="mt-10">
        <div class="hidden" id="account" role="tabpanel" aria-labelledby="account-tab">
            <h2 class="font-bold text-3xl mb-4">Account</h2>
            <div class="px-6 py-8 rounded-lg bg-white space-y-8">
                <div class="flex justify-between items-center">
                    <div class="space-y2">
                        <p class="">Name</p>
                        <p class=" font-semibold text-xl">John Doe</p>
                    </div>
                    <a class="px-6 border-2 border-red-500 self-stretch items-center flex rounded-lg space-x-1" href="/">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                    <p>Change</p>
                    </a>
                </div>
                <div class="flex justify-between items-center">
                    <div class="space-y2">
                        <p class="">Email</p>
                        <p class=" font-semibold text-xl">Allan.hutomo@gmail.com</p>
                    </div>
                    <a class="px-6 border-2 border-red-500 self-stretch items-center flex rounded-lg space-x-1" href="/">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                    <p>Change</p>
                    </a>
                </div>
                <div class="flex justify-between items-center">
                    <div class="space-y2">
                        <p class="">Password</p>
                        <p class=" font-semibold text-xl">************</p>
                    </div>
                    <a class="px-6 border-2 border-red-500 self-stretch items-center flex rounded-lg space-x-1" href="/">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                    <p>Change</p>
                    </a>
                </div>
                <div class="flex justify-between items-center">
                    <div class="space-y2">
                        <p class="">Phone number</p>
                        <p class=" font-semibold text-xl">0812 8572 9516</p>
                    </div>
                    <a class="px-6 border-2 border-red-500 self-stretch items-center flex rounded-lg space-x-1" href="/">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                    <p>Change</p>
                    </a>
                </div>
                <div class="flex justify-between items-center">
                    <div class="space-y2">
                        <p class="">Address</p>
                        <p class=" font-semibold text-xl">Jl. Pogung Baru Blok E/ 38 C</p>
                    </div>
                    <a class="px-6 border-2 border-red-500 self-stretch items-center flex rounded-lg space-x-1" href="/">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                    <p>Change</p>
                    </a>
                </div>
                <div class="flex justify-between items-center">
                    <div class="space-y2">
                        <p class="">Date of birth</p>
                        <p class=" font-semibold text-xl">06-06-2005</p>
                    </div>
                    <a class="px-6 border-2 border-red-500 self-stretch items-center flex rounded-lg space-x-1" href="/">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                    <p>Change</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="tab-menu" class="mt-10">
        <div class="hidden" id="history" role="tabpanel" aria-labelledby="history-tab">
            <h2 class="font-bold text-3xl mb-4">Bookings</h2>

            <div class="mt-8 pt-4 px-6 shadow bg-white rounded-lg">
                <div class="flex justify-evenly flex-wrap -mb-px text-sm font-semibold"
                id="tab-booking" data-tabs-toggle="#default-tab-content" role="tablist">
                    <div class="text-center p-40 py-4 "
                    role="presentation" id="field-tab" data-tabs-target="#field" type="button" role="tab" aria-controls="field" aria-selected="false">
                        <button class="inline-block" >Lapangan</button>
                    </div>
                    <div class="border-l border-gray-400 h-7 my-auto"></div>
                    <div class="text-center p-40 py-4 "
                    role="presentation" id="sparing-tab" data-tabs-target="#sparing" type="button" role="tab" aria-controls="sparing" aria-selected="false">
                        <button class="inline-block hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Sparing</button>
                    </div>
                    <div class="border-l border-gray-400 h-7 my-auto"></div>
                    <div class="text-center p-40 py-4 "
                    role="presentation" id="finish-tab" data-tabs-target="#finish" type="button" role="tab" aria-controls="finish" aria-selected="false">
                        <button class="inline-block hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" >Selesai</button>
                    </div>
                </div>
            </div>

            <div class="hidden mt-8 space-y-10" id="field" role="tabpanel" aria-labelledby="field-tab">
                @for($x=0; $x<3; $x++)
                <div  x-data="{ open: false }" class="min-h-full bg-gray-200 shadow rounded-lg">
                    <div class=" bg-white rounded-lg py-8 px-6 flex justify-between items-center">
                        <div class="bg-cover rounded-xl overflow-hidden group w-20 h-20">
                            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                        </div>
                        <div class="flex items-center gap-6 ">
                            <p class="font-bold text-xl">Lapangan Mini Soccer Sky Club</p>
                            <div class="border-l border-gray-400 h-8 my-auto"></div>
                            <div>
                                <p class="font-xs ">22 September 2024</p>
                                <p class="font-semibold">12:00 - 14.00</p>
                            </div>
                            <div class="border-l border-gray-400 h-8 my-auto"></div>
                            <p class="font-semibold">Rp 1.000.000</p>
                        </div>
                        <div class=" p-1.5 bg-red-400 text-center font-bold text-sm rounded">
                            Menunggu Konfirmasi
                        </div>
                        <div>
                            <button @click="open = !open" class="size-12 p-2.5 border border-black rounded-lg">
                                <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                            </button>
                        </div>
                    </div>
                    <div x-show="open" class="py-7 mx-6 flex justify-between">
                        <div class="grid grid-cols-3 gap-14">
                            <div class=" space-y-7">
                                <div class=" space-y-1">
                                    <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                    <p>11 Januari 2024</p>
                                </div>
                                <div class=" space-y-1">
                                    <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                    <p>123 Sample St.Sydney</p>
                                </div>
                                <div>
                                    <button href="" class="my-3 px-6 py-3 bg-red-700 text-white font-bold rounded-lg" data-modal-target="schedule-modal" data-modal-toggle="schedule-modal">Ubah Jadwal</button>


                                        <!-- Modal -->
                                    <div x-show="showModal"
                                    class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
                                    <div @click.away="showModal = false" class="relative p-4 w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Close Button -->
                                        <button @click="showModal = false" type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>

                                        <!-- Modal Content -->
                                        <div class="p-4 md:p-5 text-center">
                                            <h3 class="mb-4 text-lg font-bold text-black dark:text-gray-400">Yakin ingin batalkan pesanan?</h3>
                                            <h3 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Konfirmasi Pembatalan Pemesanan Anda</h3>

                                            <!-- Buttons -->
                                            <button @click="showModal = false" type="button"
                                                    class="py-2.5 px-5 mr-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                Kembali
                                            </button>
                                            <button @click="showModal = false" type="button"
                                                    class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5">
                                                Ya, Batalkan
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" space-y-7">
                                <div class=" space-y-1">
                                    <h6 class="font-semibold text-sm">Pemesanan</h6>
                                    <p>Allan Raditya Hutomo</p>
                                </div>
                                <div class=" space-y-1">
                                    <h6 class="font-semibold text-sm">No. Telepon</h6>
                                    <p>081285729516</p>
                                </div>
                                <div x-data="{ cancelModal: false }">
                                    {{-- button --}}
                                    <button @click="cancelModal = true" class="my-3 px-6 py-3 bg-red-700 text-white font-bold rounded-lg">
                                        Batalkan
                                    </button>
                                        <!-- Modal -->
                                    <div x-show="cancelModal"
                                    class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
                                <div @click.away="cancelModal = false" class="relative p-4 w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Close Button -->
                                    <button @click="cancelModal = false" type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>

                                    <!-- Modal Content -->
                                    <div class="p-4 md:p-5 text-center">
                                        <h3 class="mb-4 text-lg font-bold text-black dark:text-gray-400">Yakin ingin batalkan pesanan?</h3>
                                        <h3 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Konfirmasi Pembatalan Pemesanan Anda</h3>

                                        <!-- Buttons -->
                                        <button @click="cancelModal = false" type="button"
                                                class="py-2.5 px-5 mr-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            Kembali
                                        </button>
                                        <button @click="cancelModal = false" type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5">
                                            Ya, Batalkan
                                        </button>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class=" space-y-7">
                                <div class=" space-y-1">
                                    <h6 class="font-semibold text-sm">Username</h6>
                                    <p>DreamR</p>
                                </div>
                                <div class=" space-y-1">
                                    <h6 class="font-semibold text-sm">Email</h6>
                                    <p>Allan.hutomo@gmail.com</p>
                                </div>
                                <div>
                                    <button href="" class="my-3 px-6 py-3 bg-red-700 text-white font-bold rounded-lg" data-modal-target="sparing-modal" data-modal-toggle="sparing-modal">Jadikan Sparing</button>
                                </div>
                            </div>
                        </div>
                        <div class="bg-cover rounded-xl overflow-hidden group w-79 h-45">
                            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="hidden mt-8 space-y-10" id="sparing" role="tabpanel" aria-labelledby="sparing-tab">
                @for($x=0; $x<3; $x++)
                <div  x-data="{ open: false }" class="min-h-full bg-gray-200 shadow rounded-lg">
                    <div class=" bg-white rounded-lg py-8 px-6 flex justify-between items-center">
                        <div class="bg-cover rounded-xl overflow-hidden group w-20 h-20">
                            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                        </div>
                        <div class="flex items-center gap-6 ">
                            <p class="font-bold text-xl">Lapangan Mini Soccer Sky Club</p>
                            <div class="border-l border-gray-400 h-7 my-auto"></div>
                            <p class="font-bold">Real Madrid vs Manchester United</p>
                            <div class="border-l border-gray-400 h-7 my-auto"></div>
                            <div>
                                <p class="font-xs ">22 September 2024</p>
                                <p class="font-semibold">12:00 - 14.00</p>
                            </div>
                        </div>
                        <div class=" p-1.5 bg-red-400 text-center font-bold text-sm rounded">
                            Menunggu Konfirmasi
                        </div>
                        <div>
                            <button @click="open = !open" class="size-12 p-2.5 border border-black rounded-lg">
                                <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                            </button>
                        </div>
                    </div>
                    <div x-show="open" class="py-7 mx-6 " class="p-4 text-gray-500 overflow-hidden">
                        <div class="flex justify-between items-center">
                            <div class="flex gap-10">
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>11 Januari 2024</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>123 Sample St.Sydney</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Pemesanan</h6>
                                        <p>Allan Raditya Hutomo</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">No. Telepon</h6>
                                        <p>081285729516</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Username</h6>
                                        <p>DreamR</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Email</h6>
                                        <p>Allan.hutomo@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border-l border-gray-400 h-32 my-auto"></div>
                            <div class="flex gap-10">
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>11 Januari 2024</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>123 Sample St.Sydney</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Pemesanan</h6>
                                        <p>Allan Raditya Hutomo</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">No. Telepon</h6>
                                        <p>081285729516</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Username</h6>
                                        <p>DreamR</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Email</h6>
                                        <p>Allan.hutomo@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-28 items-center mt-8 justify-self-center">
                            <div class="bg-cover rounded-full overflow-hidden group size-16">
                                <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                            </div>
                            <div>
                                <a href="" class="my-3 px-6 py-3 bg-yellow-200 text-red-700 font-bold rounded-lg">Konfirmasi</a>
                            </div>
                            <div>
                                <a href="" class="my-3 px-6 py-3 bg-red-700 text-white font-bold rounded-lg">Batalkan</a>
                            </div>
                            <div class="bg-cover rounded-full overflow-hidden group size-16">
                                <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="hidden mt-8 space-y-10" id="finish" role="tabpanel" aria-labelledby="finish-tab">
                @for($x=0; $x<2; $x++)
                <div x-data="{ open: false }" class="min-h-full bg-gray-200 shadow rounded-lg">
                    <div class=" bg-white rounded-lg py-8 px-6 flex justify-between items-center">
                        <div class="bg-cover rounded-xl overflow-hidden group w-20 h-20">
                            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                        </div>
                        <div class="flex items-center gap-6 ">
                            <p class="font-bold text-xl">Lapangan Mini Soccer Sky Club</p>
                            <div class="border-l border-gray-400 h-7 my-auto"></div>
                            <p class="font-semibold">Real Madrid vs Manchester United</p>
                            <div class="border-l border-gray-400 h-7 my-auto"></div>
                            <div>
                                <p class="font-xs ">22 September 2024</p>
                                <p class="font-semibold">12:00 - 14.00</p>
                            </div>
                        </div>
                        <div class=" p-1.5 bg-red-400 text-center font-bold text-sm rounded">
                            Menunggu Konfirmasi
                        </div>
                        <div>
                            <button @click="open = !open" class="size-12 p-2.5 border border-black rounded-lg">
                                <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                            </button>
                        </div>
                    </div>
                    <div x-show="open" class="py-7 mx-6 " class="p-4 text-gray-500 overflow-hidden">
                        <div class="flex justify-between items-center">
                            <div class="flex gap-10">
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>11 Januari 2024</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>123 Sample St.Sydney</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Pemesanan</h6>
                                        <p>Allan Raditya Hutomo</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">No. Telepon</h6>
                                        <p>081285729516</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Username</h6>
                                        <p>DreamR</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Email</h6>
                                        <p>Allan.hutomo@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border-l border-gray-400 h-32 my-auto"></div>
                            <div class="flex gap-10">
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>11 Januari 2024</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>123 Sample St.Sydney</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Pemesanan</h6>
                                        <p>Allan Raditya Hutomo</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">No. Telepon</h6>
                                        <p>081285729516</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Username</h6>
                                        <p>DreamR</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Email</h6>
                                        <p>Allan.hutomo@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-28 items-center mt-8 justify-self-center">
                            <div class="bg-cover rounded-full overflow-hidden group size-16">
                                <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                            </div>
                            <div class="items-center">
                                <a href="" class="py-2 px-3 border-4 border-yellow-300 flex items-center space-x-3 rounded-lg text-yellow-300 font-bold">
                                    <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <span>Review Sekarang</span>
                                </a>
                            </div>
                            <div class="bg-cover rounded-full overflow-hidden group size-16">
                                <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
                @for($x=0; $x<2; $x++)
                <div  x-data="{ open: false }" class="min-h-full bg-gray-200 shadow rounded-lg">
                    <div class=" bg-white rounded-lg py-8 px-6 flex justify-between items-center">
                        <div class="bg-cover rounded-xl overflow-hidden group w-20 h-20">
                            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                        </div>
                        <div class="flex items-center gap-6 ">
                            <p class="font-bold text-xl">Lapangan Mini Soccer Sky Club</p>
                            <div class="border-l border-gray-400 h-8 my-auto"></div>
                            <div>
                                <p class="font-xs ">22 September 2024</p>
                                <p class="font-semibold">12:00 - 14.00</p>
                            </div>
                            <div class="border-l border-gray-400 h-8 my-auto"></div>
                            <p class="font-semibold">Rp 1.000.000</p>
                        </div>
                        <div class=" p-1.5 bg-red-400 text-center font-bold text-sm rounded">
                            Menunggu Konfirmasi
                        </div>
                        <div>
                            <button @click="open = !open" class="size-12 p-2.5 border border-black rounded-lg">
                                <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                            </button>
                        </div>
                    </div>
                    <div x-show="open" class="py-7 mx-6 flex justify-between">
                        <div >
                            <div class="grid grid-cols-3 gap-14">
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>11 Januari 2024</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Tanggal Pemesanan</h6>
                                        <p>123 Sample St.Sydney</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Pemesanan</h6>
                                        <p>Allan Raditya Hutomo</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">No. Telepon</h6>
                                        <p>081285729516</p>
                                    </div>
                                </div>
                                <div class=" space-y-7">
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Username</h6>
                                        <p>DreamR</p>
                                    </div>
                                    <div class=" space-y-1">
                                        <h6 class="font-semibold text-sm">Email</h6>
                                        <p>Allan.hutomo@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-7 w-fit">
                                <a href="" class="py-2 px-3 border-4 border-yellow-300 flex items-center space-x-3 rounded-lg text-yellow-300 font-bold">
                                    <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <span>Review Sekarang</span>
                                </a>
                            </div>
                        </div>
                        <div class="bg-cover rounded-xl overflow-hidden group w-79 h-45">
                            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>



<!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
</button>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Sign in to our platform
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="#">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const accordionElement = document.getElementById('accordion-example');

    // create an array of objects with the id, trigger element (eg. button), and the content element
    const accordionItems = [
        {
            id: 'accordion-example-heading-1',
            triggerEl: document.querySelector('#accordion-example-heading-1'),
            targetEl: document.querySelector('#accordion-example-body-1'),
            active: true
        },
        {
            id: 'accordion-example-heading-2',
            triggerEl: document.querySelector('#accordion-example-heading-2'),
            targetEl: document.querySelector('#accordion-example-body-2'),
            active: false
        },
        {
            id: 'accordion-example-heading-3',
            triggerEl: document.querySelector('#accordion-example-heading-3'),
            targetEl: document.querySelector('#accordion-example-body-3'),
            active: false
        }
    ];

    // options with default values
    const options = {
        alwaysOpen: true,
        activeClasses: 'bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white',
        inactiveClasses: 'text-gray-500 dark:text-gray-400',
        onOpen: (item) => {
            console.log('accordion item has been shown');
            console.log(item);
        },
        onClose: (item) => {
            console.log('accordion item has been hidden');
            console.log(item);
        },
        onToggle: (item) => {
            console.log('accordion item has been toggled');
            console.log(item);
        },
    };

    // instance options object
    const instanceOptions = {
        id: 'accordion-example',
        override: true
    };
</script>

<script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>
<script>
    // Account and History Tabs
    const tabsElement = document.getElementById('tab-menu');
    const tabElements = [
        {
            id: 'account',
            triggerEl: document.querySelector('#account-tab'),
            targetEl: document.querySelector('#account'),
        },
        {
            id: 'history',
            triggerEl: document.querySelector('#history-tab'),
            targetEl: document.querySelector('#history'),
        },
    ];

    const optionsAccount = {
        defaultTabId: 'account',
        activeClasses: 'text-red-600 border-b-4 border-black',
        inactiveClasses: 'text-gray-500',
        onShow: () => {
            console.log('Account/History tab active');
        },
    };

    function setActiveTab(tabId) {
        tabElements.forEach(({ id, triggerEl, targetEl }) => {
            if (id === tabId) {
                triggerEl.classList.add(...optionsAccount.activeClasses.split(" "));
                targetEl.classList.remove("hidden");
            } else {
                triggerEl.classList.remove(...optionsAccount.activeClasses.split(" "));
                targetEl.classList.add("hidden");
            }
        });
        optionsAccount.onShow();
    }

    setActiveTab(optionsAccount.defaultTabId);

    tabElements.forEach(({ id, triggerEl }) => {
        triggerEl.addEventListener('click', () => setActiveTab(id));
    });
</script>

<script>
    // Booking Tabs
    const bookingTabsElement = document.getElementById('tab-booking');
    const bookingTabElements = [
        {
            id: 'field',
            triggerEl: document.querySelector('#field-tab'),
            targetEl: document.querySelector('#field'),
        },
        {
            id: 'sparing',
            triggerEl: document.querySelector('#sparing-tab'),
            targetEl: document.querySelector('#sparing'),
        },
        {
            id: 'finish',
            triggerEl: document.querySelector('#finish-tab'),
            targetEl: document.querySelector('#finish'),
        },
    ];

    const optionsBooking = {
        defaultTabId: 'field',
        activeClasses: 'text-blue-600 border-b-4 border-black',
        inactiveClasses: 'text-gray-500',
        onShow: () => {
            console.log('Booking tab active');
        },
    };

    function setActiveBookingTab(tabId) {
        bookingTabElements.forEach(({ id, triggerEl, targetEl }) => {
            if (id === tabId) {
                triggerEl.classList.add(...optionsBooking.activeClasses.split(" "));
                targetEl.classList.remove("hidden");
            } else {
                triggerEl.classList.remove(...optionsBooking.activeClasses.split(" "));
                targetEl.classList.add("hidden");
            }
        });
        optionsBooking.onShow();
    }

    setActiveBookingTab(optionsBooking.defaultTabId);

    bookingTabElements.forEach(({ id, triggerEl }) => {
        triggerEl.addEventListener('click', () => setActiveBookingTab(id));
    });
</script>
@endsection
