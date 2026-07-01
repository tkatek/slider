@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Take the Plunge means?',
        'title'      => 'Take the Plunge means?',
        'subtitle'   => '',
        'image'      => materialAsset('slider/B1/Intermediate/chapter-10/img/slide2.webp'),
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-6">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-6 w-full max-w-5xl">
            <div class="rounded-[2rem] border border-emerald-100 bg-white p-6 shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900 sm:p-8 lg:p-10">

                <div class="grid items-center gap-8 lg:grid-cols-[1.2fr_0.8fr]">

                    {{-- Text first --}}
                    <div class="text-center lg:text-left">
                        <p class="text-3xl font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-4xl lg:text-5xl">
                            To do something
                            <span class="text-emerald-600 dark:text-emerald-300">brave</span>
                            or
                            <span class="text-emerald-600 dark:text-emerald-300">risky</span>.
                        </p>

                    </div>

                    {{-- Smaller image --}}
                    <div class="flex justify-center lg:justify-end">
                        <div class="aspect-[4/3] w-full max-w-[360px] overflow-hidden rounded-[1.5rem] bg-slate-100 shadow-lg dark:bg-slate-800">
                            @if (!empty($content['image']))
                                <img
                                        src="{{ $content['image'] }}"
                                        alt="Take the Plunge"
                                        class="h-full w-full object-cover"
                                >
                            @else
                                <div class="flex h-full w-full items-center justify-center px-6 text-center">
                                    <p class="text-lg font-bold text-slate-400 dark:text-slate-500">
                                        Image 4/3
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection