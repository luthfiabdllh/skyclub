@extends('layouts.master')
@section('content')
    <div class=" text-center mt-17.5">
        <p class="mb-4 font-semibold">Aritcle</p>
        <h1 class="mb-4 font-bold text-56">Kumpulan Artikel</h1>
        <p class="">Artikel mengenai kegiatan dan event yang berlangsung pada Sky Club</p>
    </div>
    <div class="py-20 px-16 grid gap-8 lg:grid-cols-3 md:grid-cols-2">
        @for ($x = 0; $x < 3; $x++)
            <div class="border rounded-2xl" style="width: 416px">
                <img src="{{ Storage::url('images/blog-image.svg') }}" alt="">
                <div class=" flex-col p-6 space-y-6">
                    <div class="max-w-sm space-y-2">
                        <p class=" text-sm font-semibold">Pertandingan</p>
                        <h4 class=" text-2xl font-bold">Persija vs Areama FC</h4>
                        <p class="text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius
                            enim in eros.</p>
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
        @forelse ($articles as $article)
            <div class="border rounded-2xl" style="width: 416px">
                {{-- <img src="{{ Storage::url('images/blog-image.svg') }}" alt=""> --}}
                <img src="{{ $article->photo }}" alt="">
                <div class=" flex-col p-6 space-y-6">
                    <div class="max-w-sm space-y-2">
                        <p class=" text-sm font-semibold">Pertandingan</p>
                        <h4 class=" text-2xl font-bold">{{ $article->title }}</h4>
                        <p class="text-base">{{ $article->content }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <img class=" rounded-full" src="{{ Storage::url('images/profile.svg') }}" alt="">
                        <div>
                            <p class=" font-semibold">{{ $article->user->name }}</p>
                            <p>{{ $article->user->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    @endsection
