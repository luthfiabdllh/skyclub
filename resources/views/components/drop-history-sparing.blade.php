<div x-data="{ open: false, ratingSparingModal: false, rating: 5, review: ''}" class="min-h-full bg-gray-200 shadow rounded-lg">
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
                <img x-show="!open" src="{{ asset('assets/icons/icon-angle-right.svg') }}" alt="">
                <img x-show="open" src="{{ asset('assets/icons/icon-angle-down.svg') }}" alt="">
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
                <button @click="ratingSparingModal = true" class="py-2 px-3 border-4 border-yellow-300 flex items-center space-x-3 rounded-lg text-yellow-300 font-bold">
                    <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <span>Review Sekarang</span>
                </button>
            </div>
            <div class="bg-cover rounded-full overflow-hidden group size-16">
                <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
            </div>
        </div>
    </div>

    <!-- Rating Modal -->
    <div x-show="ratingSparingModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.stop class="bg-white rounded-lg shadow-lg w-135 p-6">

            <div class="flex items-center space-x-2">
                <div class="bg-cover rounded-xl overflow-hidden group w-20 h-20">
                    <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
                </div>
                <div class="">
                    <p class="text-lg font-semibold">Lapangan Mini Soccer SKY CLUB</p>
                    <div>
                        <div class="text-sm text-gray-500">Bagaimana kualitas lapangan ini secara keseluruhan?</div>
                        <div class="flex items-center mt-2">
                            <!-- Star rating (maximum 5 stars) -->
                            <template x-for="n in 5" :key="n">
                                <svg @click="rating = n" :class="rating >= n ? 'text-yellow-400' : 'text-gray-300'" class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                                  </svg>
                            </template>
                            <div class="ml-2 text-gray-600"
                            x-text="rating >= 5 ? 'Sangat Baik' : rating >= 4 ? 'Baik' : rating >= 3 ? 'Cukup Baik' : rating >= 2 ? 'Buruk' : 'Sangat Buruk'"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <label for="review" class="block text-sm text-gray-600">Berikan ulasan untuk lapangan ini</label>
                <textarea id="review" x-model="review" placeholder="Tulis review Anda mengenai lapangan ini..." class="w-full mt-2 p-2 border border-gray-300 rounded-md h-40 overflow-hidden"></textarea>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <button @click="ratingSparingModal = false" class="px-4 py-2 bg-gray-300 text-black rounded-md">Cancel</button>
                <button @click="ratingSparingModal = false; alert('Saved review: ' + review + ', Rating: ' + rating)" class="px-4 py-2 bg-red-500 text-white rounded-md">Save</button>
            </div>
        </div>
    </div>
</div>
