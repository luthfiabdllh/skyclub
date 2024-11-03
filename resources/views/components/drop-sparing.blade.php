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
