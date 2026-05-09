<?php
$content = [
    'page_title' => 'Notice',
    'title'      => 'Notice the following',
    'subtitle'   => 'Immigrant or emigrant?',

    'question' => 'Are you an immigrant or an emigrant?',

    'cards' => [
        [
            'label'       => 'Immigrant',
            'keyword'     => 'in',
            'description' => 'A person who comes into a new country to live there.',
            'accent'      => 'from-rose-500 to-orange-400',
            'text_color'  => 'text-rose-600 dark:text-rose-300',
        ],
        [
            'label'       => 'Emigrant',
            'keyword'     => 'out',
            'description' => 'A person who leaves their country to live somewhere else.',
            'accent'      => 'from-blue-600 to-cyan-400',
            'text_color'  => 'text-blue-700 dark:text-blue-300',
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    @php
        $theme = $theme ?? [];
        $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500'));
    @endphp

    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-hidden px-4 py-5 sm:px-6 lg:px-8">
        <section class="mx-auto flex w-full max-w-6xl flex-col gap-6">
            @include('slider.components.title-subtitle')

            <div class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/90 p-4 shadow-[0_24px_70px_-40px_rgba(15,23,42,0.35)] backdrop-blur dark:border-slate-700 dark:bg-slate-900/80 sm:p-6 lg:p-8">
                <div class="pointer-events-none absolute inset-x-0 top-0 h-1.5 {{ $primaryGradient }}"></div>
                <div class="pointer-events-none absolute -left-20 top-10 h-52 w-52 rounded-full bg-rose-400/12 blur-3xl dark:bg-rose-500/10"></div>
                <div class="pointer-events-none absolute -right-20 bottom-0 h-56 w-56 rounded-full bg-blue-400/12 blur-3xl dark:bg-blue-500/10"></div>

                <div class="relative grid gap-5 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                    <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50/80 p-5 dark:border-slate-700 dark:bg-slate-950/40 sm:p-6">
                        <p class="text-sm font-black uppercase tracking-[0.14em] text-slate-500 dark:text-slate-400">
                            Quick check
                        </p>

                        <h2 class="mt-3 text-2xl font-black leading-tight text-slate-950 dark:text-slate-50 sm:text-3xl lg:text-4xl">
                            Are you an
                            <span class="text-rose-600 dark:text-rose-300">immigrant</span>
                            or an
                            <span class="text-blue-700 dark:text-blue-300">emigrant</span>?
                        </h2>

                        <p class="mt-4 text-base font-bold leading-relaxed text-slate-600 dark:text-slate-300 sm:text-lg">
                            The direction is the key: one word means coming into a country, the other means going out of a country.
                        </p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach($content['cards'] as $card)
                            <article class="relative overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-6">
                                <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r {{ $card['accent'] }}"></div>

                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-400">
                                            {{ $card['label'] }}
                                        </p>

                                        <h3 class="mt-2 text-3xl font-black leading-none {{ $card['text_color'] }} sm:text-4xl">
                                            {{ $card['keyword'] }}
                                        </h3>
                                    </div>

                                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-xl font-black text-slate-700 dark:bg-slate-800 dark:text-slate-100">
                                        {{ $card['keyword'] === 'in' ? '→' : '←' }}
                                    </div>
                                </div>

                                <p class="mt-5 text-base font-bold leading-relaxed text-slate-700 dark:text-slate-200">
                                    {{ $card['description'] }}
                                </p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
