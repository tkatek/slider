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
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-5 sm:px-6">

        {{-- Keep existing title style --}}
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        {{-- Compact platform-safe content card --}}
        <section class="mx-auto mt-4 w-full max-w-[900px]">
            <div class="rounded-[1.75rem] border border-emerald-100 bg-white/95 p-4 shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900 sm:p-5 lg:p-6">

                <div class="grid items-center gap-5 lg:grid-cols-[minmax(0,1fr)_minmax(260px,0.78fr)] lg:gap-7">

                    {{-- Meaning --}}
                    <div class="text-center lg:pl-2 lg:text-left">
                        <div class="mb-4 inline-flex items-center rounded-full bg-emerald-50 px-4 py-2 text-xs font-black uppercase tracking-wide text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300 sm:text-sm">
                            Meaning
                        </div>

                        <p
                                class="mx-auto max-w-[520px] text-[clamp(2rem,3.7vw,3.2rem)] font-black leading-[1.05] tracking-[-0.035em] text-slate-900 dark:text-slate-50 lg:mx-0"
                                style="text-wrap: balance;"
                        >
                            To do something
                            <span class="text-emerald-600 dark:text-emerald-300">brave</span>
                            or
                            <span class="text-emerald-600 dark:text-emerald-300">risky</span>.
                        </p>
                    </div>

                    {{-- Image --}}
                    <div class="flex justify-center lg:justify-end">
                        <div class="relative w-full max-w-[315px] lg:max-w-[335px]">
                            <div class="absolute -inset-3 rounded-[1.75rem] bg-emerald-200/20 blur-2xl dark:bg-emerald-400/10"></div>

                            <div class="relative aspect-[4/3] overflow-hidden rounded-[1.35rem] bg-slate-100 shadow-xl shadow-slate-900/15 ring-1 ring-white/80 dark:bg-slate-800 dark:ring-white/10">
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
            </div>
        </section>
    </main>
@endsection