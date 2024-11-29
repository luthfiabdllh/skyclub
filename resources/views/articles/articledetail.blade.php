@extends('layouts.master')
@section('content')
<style>
    /* Styling Header 1 - 5 menggunakan Tailwind */
    h1 {
        @apply text-4xl font-extrabold;
    }
    h2 {
        @apply text-3xl font-bold;
    }
    h3 {
        @apply text-2xl font-semibold;
    }
    h4 {
        @apply text-xl font-medium;
    }
    h5 {
        @apply text-lg font-normal;
    }
</style>

<div class="grid grid-cols-2 mt-20">
    <div class="grid grid-cols-1 content-between w-[420px]">
        <div class=" space-y-8">
            <p>artikel / isi</p>
            <h3 class=" text-5xl font-bold leading-tight">{{ $article->title }}</h3>
        </div>
        <div class=" space-y-8">
            <div>
                <p>By <span class=" font-semibold">{{ $article->title }}</span></p>
                <div class="flex items-center">
                    <p>11 Jan 2022</p>
                    <span class="w-1.5 h-1.5 mx-1.5 bg-black rounded-full"></span>
                    <p>5 min read</p>
                </div>
            </div>
            <div>
                <p class=" font-semibold mb-4">Share this post</p>
                <div class="flex space-x-2">
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>
                    </div>
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                            <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                            </svg>
                    </div>
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                        </svg>
                    </div>
                    <div class="rounded-full bg-gray-300 p-1">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                            </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div >
        @if($content && isset($content->blocks))
            @foreach($content->blocks as $block)
                {{-- Image --}}
                @if($block->type === 'image')
                    <img class="h-[450px] object-cover" src="{{ $block->data->file->url ?? '#' }}" alt="">
                    @break
                @endif
            @endforeach
        @endif
        {{-- <img class="h-[450px] object-cover" src="{{ Storage::url('images/banner.svg') }}" alt=""> --}}
    </div>
</div>

<article class="mt-28 mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg">
    <div class="prose">
        @if($content && isset($content->blocks))
        @foreach($content->blocks as $block)
            {{-- Paragraph --}}
            @if($block->type === 'paragraph')
                <p class="mb-6 text-lg text-gray-700 leading-relaxed">
                    {!! $block->data->text ?? '' !!}
                </p>

            @elseif($block->type === 'header')
            <h{{ $block->data->level ?? 3 }} class="font-semibold text-{{ 6 - $block->data->level }}xl">
                {{ $block->data->text }}
            </h{{ $block->data->level ?? 3 }}>

            {{-- Image --}}
            @elseif($block->type === 'image')
                <div class="mb-6">
                    <img
                        src="{{ $block->data->file->url ?? '#' }}"
                        alt="{{ $block->data->caption ?? 'Image' }}"
                        class="rounded-lg shadow-md w-full object-cover transition-transform duration-300 hover:scale-105"
                    >
                    @if(!empty($block->data->caption))
                        <p class="text-center text-sm text-gray-500 italic">
                            {{ $block->data->caption }}
                        </p>
                    @endif
                </div>

            {{-- List --}}
            @elseif($block->type === 'list')
                @if($block->data->style === 'ordered')
                    <ol class="list-decimal pl-6 mb-6 text-gray-700 space-y-2">
                        @foreach($block->data->items as $item)
                            <li class="text-base">{{ $item->content ?? '' }}</li>
                        @endforeach
                    </ol>
                @else
                    <ul class="list-disc pl-6 mb-6 text-gray-700 space-y-2">
                        @foreach($block->data->items as $item)
                            <li class="text-base">{{ $item->content ?? '' }}</li>
                        @endforeach
                    </ul>
                @endif

            {{-- Checklist --}}
            @elseif($block->type === 'checklist')
                <ul class="mb-6 space-y-2">
                    @foreach($block->data->items as $item)
                        <li class="flex items-center space-x-3">
                            <input
                                type="checkbox"
                                class="form-checkbox h-5 w-5 text-red-500 rounded border-gray-300 transition duration-300 focus:ring focus:ring-green-400"
                                {{ $item->checked ? 'checked' : '' }}
                            >
                            <span class="text-gray-700 text-base">{{ $item->text ?? '' }}</span>
                        </li>
                    @endforeach
                </ul>

            {{-- Quote --}}
            @elseif($block->type === 'quote')
                <blockquote class="border-l-4 border-red-600 pl-6 italic text-lg text-gray-600 mb-6">
                    {!! $block->data->text ?? '' !!}
                    @if(!empty($block->data->caption))
                        <footer class="text-sm text-gray-500 mt-2">
                            - {{ $block->data->caption }}
                        </footer>
                    @endif
                </blockquote>
            {{-- Table --}}
            @elseif($block->type === 'table')
            <div class="overflow-x-auto mb-6">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-100">
                            @foreach($block->data->content[0] as $header)
                                <th class="py-3 px-5 border-b border-gray-300 text-left text-sm font-semibold text-gray-700 uppercase tracking-wide">
                                    {{ $header }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(array_slice($block->data->content, 1) as $row)
                            <tr class="even:bg-gray-50 odd:bg-white">
                                @foreach($row as $cell)
                                    <td class="py-3 px-5 border-b border-gray-300 text-sm text-gray-800">
                                        {{ $cell }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @elseif($block->type === 'warning')
            <div class="border-l-4 border-yellow-400 bg-yellow-50 p-4 mb-6 rounded-md shadow-sm">
                <h4 class="font-semibold text-yellow-700 mb-2">
                    {{ $block->data->title ?? 'Warning' }}
                </h4>
                <p class="text-sm text-yellow-800">
                    {{ $block->data->message ?? 'No details provided.' }}
                </p>
            </div>
            @elseif($block->type === 'delimiter')
            <div class="my-6 text-center">
                <span class="text-5xl text-gray-800">* * *</span>
            </div>

            {{-- Fallback for Unknown Types --}}
            @else
                <p class="text-sm text-red-500">
                    Unsupported block type: {{ $block->type }}
                </p>
            @endif
        @endforeach
    @else
        <p class="text-gray-500 italic">No content available</p>
    @endif
    </div>
    </div>
    <div class="mt-16">
        <p class=" font-semibold mb-4">Share this post</p>
        <div class="flex space-x-2">
            <div class="rounded-full bg-gray-300 p-1">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                </svg>
            </div>
            <div class="rounded-full bg-gray-300 p-1">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                    <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                    </svg>
            </div>
            <div class="rounded-full bg-gray-300 p-1">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                </svg>
            </div>
            <div class="rounded-full bg-gray-300 p-1">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>
    <hr class="h-px my-10 bg-gray-400 border-0 dark:bg-gray-700">
    <div class="flex space-x-4">
        <img class=" rounded-full" src="{{ Storage::url('images/profile.svg') }}" alt="">
        <div>
            <p class=" font-semibold">Jamal Sigh</p>
            <p>11 Jan 2024</p>
        </div>
    </div>
</article>


{{-- blog --}}
<div class="mt-28 mb-20">
    <div class="flex justify-between ">
        <div class="space-y-4">
            <h6 class="text-base font-bold">Artikel</h6>
            <h1 class="text-5xl font-bold">Artikel Serupa</h1>
            <h5 class="text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h5>
        </div>
        <div class=" self-end">
            <button type="submit" class=" bg-red-600 rounded px-4 py-2 font-semibold text-white">Lihat Semuanya</button>
        </div>
    </div>
    <div class="flex justify-between pt-20" >
        @for ($x = 0; $x < 3; $x++)
            <div class="border" style="width: 416px">
                <img src="{{ Storage::url('images/blog-image.svg') }}" alt="">
                <div class=" flex-col p-6 space-y-6">
                    <div class="max-w-sm space-y-2">
                        <p class=" text-sm font-semibold">Pertandingan</p>
                        <h4 class=" text-2xl font-bold">Persija vs Areama FC</h4>
                        <p class="text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.</p>
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
    </div>
</div>
@endsection
