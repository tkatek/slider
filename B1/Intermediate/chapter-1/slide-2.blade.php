@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'What is speculating?',
        'title'      => 'What is speculating?',
        'subtitle'   => '',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-6">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-6 w-full max-w-4xl">
            <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900">
                <div class="h-2 w-full bg-gradient-to-r from-emerald-500 via-green-500 to-teal-500"></div>

                <div class="p-6 sm:p-8 lg:p-10">
                    <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 px-5 py-6 dark:border-slate-700 dark:bg-slate-800/60 sm:px-7 sm:py-8 lg:px-9">
                        <p class="text-left text-2xl font-black leading-snug tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-3xl lg:text-4xl">
                            Speculating means making a
                            <span class="text-emerald-600 dark:text-emerald-300">prediction</span>
                            without knowing all the
                            <span class="text-emerald-600 dark:text-emerald-300">facts</span>.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection