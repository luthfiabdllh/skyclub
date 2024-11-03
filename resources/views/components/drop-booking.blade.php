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
                <img x-show="!open" src="{{ asset('assets/icons/icon-angle-right.svg') }}" alt="">
                <img x-show="open" src="{{ asset('assets/icons/icon-angle-down.svg') }}" alt="">
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
