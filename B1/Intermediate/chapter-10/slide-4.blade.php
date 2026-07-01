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
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-6">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-6 grid w-full max-w-6xl grid-cols-2 gap-4 sm:gap-6 md:grid-cols-4">
            @foreach ($content['images'] as $index => $image)
                @if (!empty($image))
                    <img
                            src="{{ $image }}"
                            alt="Discussion image {{ $index + 1 }}"
                            class="aspect-square w-full rounded-[1.5rem] object-cover shadow-lg shadow-slate-900/10"
                    >
                @else
                    <div class="flex aspect-square w-full items-center justify-center rounded-[1.5rem] bg-slate-100 px-6 text-center dark:bg-slate-800">
                        <p class="text-lg font-bold text-slate-400 dark:text-slate-500">
                            Image {{ $index + 1 }}
                        </p>
                    </div>
                @endif
            @endforeach
        </section>
    </main>
@endsection