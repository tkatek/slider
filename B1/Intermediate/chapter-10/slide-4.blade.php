@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Discussion',
        'title'      => 'Discussion',
        'subtitle'   => 'What do these 4 images have in common?',
        'images'     => [
            materialAsset('slider/B1/Intermediate/chapter-10/img/slide4/1.webp'),
            materialAsset('slider/B1/Intermediate/chapter-10/img/slide4/2.webp'),
            materialAsset('slider/B1/Intermediate/chapter-10/img/slide4/3.webp'),
            materialAsset('slider/B1/Intermediate/chapter-10/img/slide4/4.webp'),
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-6 sm:px-6">

        {{-- Keep existing title/subtitle exactly as-is --}}
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-7 w-full max-w-[980px]">
            <div class="rounded-[2rem] border border-emerald-100/80 bg-white/55 p-3 shadow-xl shadow-slate-900/5 backdrop-blur-sm dark:border-slate-700 dark:bg-slate-900/40 sm:p-4 lg:p-5">

                <div class="grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-4">
                    @foreach ($content['images'] as $index => $image)
                        <div class="group relative overflow-hidden rounded-[1.35rem] bg-white p-1.5 shadow-lg shadow-slate-900/10 ring-1 ring-slate-200/70 dark:bg-slate-900 dark:ring-slate-700/70">

                            <div class="absolute left-3 top-3 z-20 flex h-8 min-w-8 items-center justify-center rounded-full bg-emerald-600 px-2 text-xs font-black text-white shadow-md shadow-emerald-900/20 dark:bg-emerald-400 dark:text-emerald-950">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            @if (!empty($image))
                                <img
                                        src="{{ $image }}"
                                        alt="Discussion image {{ $index + 1 }}"
                                        class="aspect-square w-full rounded-[1rem] object-cover transition-transform duration-300 group-hover:scale-[1.03]"
                                >
                            @else
                                <div class="flex aspect-square w-full items-center justify-center rounded-[1rem] bg-slate-100 px-6 text-center dark:bg-slate-800">
                                    <p class="text-lg font-bold text-slate-400 dark:text-slate-500">
                                        Image {{ $index + 1 }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </main>
@endsection