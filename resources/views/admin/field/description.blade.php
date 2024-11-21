@extends('layouts.admin')

@section('header')
    @vite(['resources/js/descriptionField.js' ])
@endsection

@section('content')

<div class="bg-white shadow rounded-lg border-gray-600 dark:border-gray-600 h-fit mb-4 p-6">
    <p class="font-semibold mb-2 text-2xl">Deskripsi Lapangan</p>
    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Masukkan deskripsi Lapangan</p>
    <div class="mb-4">
        <textarea id="description" maxlength="2999" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-blue-500 h-64 custom-scrollbar" placeholder="Tulis deskripsi lapangan disini..." rows="4">{{ $fieldDescription->description }}</textarea>
        <div class="flex justify-between">
            <div class="flex mt-2 items-center space-x-2">
                <p id="charCount" class="text-sm text-gray-500 dark:text-gray-400">0 characters</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">|</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Max 2999 characters</p>
            </div>
            <button id="updateButton" class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-gradient-to-r hover:from-red-500 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Update</button>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
