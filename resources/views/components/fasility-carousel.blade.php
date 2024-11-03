<div x-data="{ activeSlide: 0, slides: [
    { image: '{{ Storage::url('images/album_1.svg') }}', title: 'Rumput Standar FIFA', text: 'Di SKY CLUB, kami menggunakan rumput sintetis berstandar FIFA yang dirancang khusus untuk mini soccer. Dengan rumput berkualitas ini, kami memastikan pengalaman bermain Anda lebih nyaman, aman, dan optimal.' },
    { image: '{{ Storage::url('images/album_2.svg') }}', title: 'Fasilitas Lengkap', text: 'Di SKY CLUB, kami menyediakan fasilitas lengkap untuk mendukung kenyamanan Anda, termasuk ruang ganti modern dengan shower dan loker pribadi. Dengan fasilitas ini, Anda dapat bersiap dan bersantai dengan mudah sebelum dan sesudah bermain.' },
    { image: '{{ Storage::url('images/album_3.svg') }}', title: 'Parkir Luas', text: 'SKY CLUB memiliki area parkir yang luas, kami memastikan kenyamanan dan kemudahan bagi setiap pengunjung. Anda tidak perlu khawatir mencari tempat parkir, karena area kami dirancang untuk menampung kendaraan dalam jumlah besar dengan akses yang mudah dan aman.' }
] }"
     x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 7000)" class="mt-28 space-y-5">

    <!-- Heading and Subheading -->
    <h1 class="text-5xl font-bold w-1/2">Keuntungan menyewa lapangan Mini Soccer di Sky Club</h1>
    <h6 class="text-base">Rasakan fasilitas terlengkap di sekitaran Bogor</h6>

    <!-- Content Section -->
    <div class="flex justify-between items-stretch">
        <!-- Buttons Section -->
        <div class="grid grid-row-3 space-y-10 content-center w-5/12">
            <template x-for="(slide, index) in slides" :key="index">
                <div @click="activeSlide = index" class="cursor-pointer pl-8"
                        :class="{'border-l-2 border-red-600': activeSlide === index}">
                    <h1 class="text-2xl font-bold mb-4" x-text="slide.title"></h1>
                    <p class="text-base" x-text="slide.text"></p>
                </div>
            </template>
        </div>

        <!-- Image Display Section -->
        <div class="relative bg-cover rounded-xl overflow-hidden w-5/12 items-stretch ">
            <template x-for="(slide, index) in slides" :key="index">
                <img :src="slide.image" x-show="activeSlide === index"
                     x-transition:enter="transition-opacity duration-1000 ease-in-out"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity duration-1000 ease-in-out"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="absolute inset-0 w-full h-full object-cover" alt="carousel-image">
            </template>
        </div>
    </div>
</div>
