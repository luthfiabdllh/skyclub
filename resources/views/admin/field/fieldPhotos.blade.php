@extends('layouts.admin')

@section('header')
    @vite(['resources/js/dropzoneFieldPhoto.js' ])
@endsection

@section('content')
{{-- field image --}}
<div class="bg-white shadow rounded-lg border-gray-300 dark:border-gray-60 mb-4 p-6">
    <p class="font-semibold mb-2 text-2xl">Gambar Lapangan</p>
    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Masukan gambar lapangan</p>
    {{-- album image --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        @foreach ($fieldPhotos as $image)
        <!-- Modal -->

        <div x-data="{ open: false, imageUrl: '' }">
            <template x-if="open">
                <div class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="fixed inset-0 bg-black opacity-50" @click="open = false"></div>
                    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                        <div class="bg-white p-4">
                            <img :src="imageUrl" alt="Image" class="w-full h-auto">
                        </div>
                        <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button @click="open = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Close
                            </button>
                            <button @click="deleteImage('{{ url('/delete-image/' . $image->id) }}')" type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete
                        </button>
                        </div>
                    </div>
                </div>
            </template>
            <div class="overflow-hidden rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64 cursor-pointer" @click="open = true; imageUrl = '{{ asset('storage/images/images/' . $image->photo) }}'">
                <div class="items-center justify-center w-full h-full bg-center bg-cover bg-no-repeat" style="background-image: url('{{ asset('storage/images/images/' . $image->photo) }}');">
                </div>
            </div>
        </div>
        @endforeach
        {{-- tombol add dengan dropzone --}}
        <div class="rounded-lg  border-gray-300 dark:border-gray-600 h-32 md:h-64">
            <div id="dropzone-image" class="dropzone hover:bg-gray-100 flex items-center justify-center w-full h-full">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    </div>
</div>
{{-- Banner Image --}}
<div class="bg-white shadow rounded-lg border-gray-600 dark:border-gray-600 h-fit mb-4 p-6">
    <p class="font-semibold mb-2 text-2xl">Gambar Banner</p>
    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Ganti gambar untuk banner pada halaman dashboard</p>
    <div class="rounded-lg border-gray-300 dark:border-gray-600 h-[300px] sm:h-[400px] md:h-[500px]">
        <div id="dropzone-banner-1" class="dropzone flex items-center justify-center w-full h-full bg-center bg-cover bg-no-repeat"
        style="background-image: url('{{ Storage::url('images/banner/banner_1.png') }}');">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
    </div>
</div>
{{-- slider image --}}
<div class="bg-white shadow rounded-lg border-gray-300 dark:border-gray-60 mb-4 p-6">
    <p class="font-semibold mb-2 text-2xl">Gambar Slider</p>
    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Ganti gambar untuk slider pada halaman dashboard</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
        <div class="rounded-lg border-gray-300 dark:border-gray-600 md:h-64">
            <div id="dropzone-slider-1" class="dropzone flex items-center justify-center w-full h-full bg-center bg-cover bg-no-repeat rounded-lg"
            style="background-image: url('{{ Storage::url('images/slider/album_1.png') }}');">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
        <div class="rounded-lg border-gray-300 dark:border-gray-600 md:h-64">
            <div id="dropzone-slider-2" class="dropzone flex items-center justify-center w-full h-full bg-center bg-cover bg-no-repeat"
            style="background-image: url('{{ Storage::url('images/slider/album_2.png') }}');">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
        <div class="rounded-lg border-gray-300 dark:border-gray-600 md:h-64">
            <div id="dropzone-slider-3" class="dropzone flex items-center justify-center w-full h-full bg-center bg-cover bg-no-repeat"style="background-image: url('{{ Storage::url('images/slider/album_3.png') }}');">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function deleteImage(url) {
        axios.delete(url, {
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(() => {
            // Refresh halaman setelah penghapusan berhasil
            location.reload();
        })
        .catch((error) => {
            console.error("Error deleting image:", error.response?.data || error.message);
        });
    }
</script>
