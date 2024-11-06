<div x-data="{ open: false, cancelBookingModal: false, scheduleModal: false, sparingModal: false }" class="min-h-full bg-gray-200 shadow rounded-lg">
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
                    <h6 class="font-semibold text-sm">Alamat</h6>
                    <p>123 Sample St.Sydney</p>
                </div>
                <div>
                    <button @click="scheduleModal = true" class="my-3 px-6 py-3 bg-red-700 text-white font-bold rounded-lg">Ubah Jadwal</button>
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
                <div>
                    <button @click="cancelBookingModal = true" class="my-3 px-6 py-3 bg-red-700 text-white font-bold rounded-lg">Batalkan</button>
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
                    <button @click="sparingModal = true" class="my-3 px-6 py-3 bg-red-700 text-white font-bold rounded-lg">Jadikan Sparing</button>
                </div>
            </div>
        </div>
        <div class="bg-cover rounded-xl overflow-hidden group w-79 h-45">
            <img class="w-full h-full object-cover" src="{{ Storage::url('images/album_1.svg') }}" alt="">
        </div>
    </div>

    <!-- Cancel Modal -->
    <div x-show="cancelBookingModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Batalkan Pemesanan</h2>
            <p>Apakah Anda yakin ingin membatalkan pemesanan ini?</p>
            <div class="mt-4 flex justify-end">
                <button @click="cancelBookingModal = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Tutup</button>
                <button class="px-4 py-2 bg-red-700 text-white rounded-lg">Batalkan</button>
            </div>
        </div>
    </div>

    <!-- Schedule Modal -->
    <div x-show="scheduleModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Ubah Jadwal</h2>
            <p>Form untuk mengubah jadwal pemesanan.</p>
            <div class="mt-4 flex justify-end">
                <button @click="scheduleModal = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Tutup</button>
                <button class="px-4 py-2 bg-red-700 text-white rounded-lg">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Sparing Modal -->
    <div x-show="sparingModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Jadikan Sparing</h2>
            <p>Apakah Anda yakin ingin menjadikan pengguna ini sebagai sparing?</p>
            <div class="mt-4 flex justify-end">
                <button @click="sparingModal = false" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Tutup</button>
                <button class="px-4 py-2 bg-red-700 text-white rounded-lg">Jadikan Sparing</button>
            </div>
        </div>
    </div>
</div>
