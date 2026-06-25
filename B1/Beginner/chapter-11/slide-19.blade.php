@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Speaking',
        'title'      => 'Speaking',
        'subtitle'   => '',

        'instruction' => 'Look at these two pictures & make if 3rd conditional sentences using the following:',

        'prompts' => [
            'I wish I had(n’t) ...',
            'If only I had(n’t) ...',
            'If I had...',
        ],

        'images' => [
            materialAsset('slider/B1/Beginner/chapter-11/img/1.webp'),
            materialAsset('slider/B1/Beginner/chapter-11/img/2.webp'),
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-3 py-3">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-4 flex w-full max-w-5xl flex-col items-center justify-center">

            {{-- Main instruction --}}
            <div class="mx-auto max-w-4xl text-center">
                <p class="text-xl font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-2xl lg:text-3xl">
                    {{ $content['instruction'] }}
                </p>
            </div>

            {{-- Image area --}}
            <div class="mx-auto mt-5 grid w-full max-w-3xl grid-cols-2 gap-4">
                @foreach($content['images'] as $image)
                    <div class="aspect-[5/4] w-full overflow-hidden rounded-[1.25rem] border border-slate-200 dark:border-slate-700">
                        <img
                                src="{{ $image }}"
                                alt=""
                                class="h-full w-full object-cover"
                        >
                    </div>
                @endforeach
            </div>

            {{-- Sentence starters --}}
            <div class="mx-auto mt-5 grid w-full max-w-4xl grid-cols-3 gap-3">
                @foreach($content['prompts'] as $prompt)
                    <div class="flex min-h-[3.5rem] items-center justify-center rounded-[1rem] border border-purple-300 px-3 py-3 text-center dark:border-purple-500/60">
                        <p class="text-sm font-black leading-snug text-purple-700 dark:text-purple-300 sm:text-xl lg:text-2xl">
                            {{ $prompt }}
                        </p>
                    </div>
                @endforeach
            </div>

        </section>
    </main>
@endsection