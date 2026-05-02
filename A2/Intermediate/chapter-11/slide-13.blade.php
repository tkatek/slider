<?php
$content = [
    'page_title' => 'Can you say How are you feeling now?',
    'title' => 'Can you say How are you feeling now?',
    'subtitle' => '',
    'subtitle_2' => '',
    'rows' => [
        [
            'starter' => 'I’m',
        ],
        [
            'starter' => 'I feel',
        ],
        [
            'starter' => 'I’m very',
        ],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $pageTitle = trim((string) ($content['page_title'] ?? 'Writing'));
    $title = trim((string) ($content['title'] ?? 'Writing'));
    $subtitle = trim((string) ($content['subtitle'] ?? ''));
    $subtitle2 = trim((string) ($content['subtitle_2'] ?? ''));
    $rows = array_values(is_array($content['rows'] ?? null) ? $content['rows'] : []);
@endphp

@section('title', $pageTitle)

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-x-hidden bg-transparent px-4 py-6 font-['Plus_Jakarta_Sans',sans-serif] text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <div class="mx-auto w-full max-w-5xl">
            <header class="mx-auto flex max-w-3xl flex-col items-center gap-3 text-center">
                @include('slider.components.title-subtitle')

                @if($subtitle2 !== '')
                    <p class="max-w-2xl text-sm font-bold leading-[1.5] text-slate-500 dark:text-slate-300 sm:text-base">
                        {{ $subtitle2 }}
                    </p>
                @endif
            </header>

            <section class="mx-auto mt-7 w-full max-w-3xl space-y-4 sm:mt-8" aria-label="Writing practice">
                @foreach($rows as $index => $row)
                    @php
                        $starter = trim((string) ($row['starter'] ?? $row['label'] ?? ''));
                    @endphp

                    <article class="rounded-2xl border border-slate-200 bg-transparent px-4 py-5 dark:border-slate-700 sm:px-5">
                        <div class="flex items-start gap-4">
                            <div class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-slate-300 text-xs font-black text-slate-500 dark:border-slate-600 dark:text-slate-300">
                                {{ $index + 1 }}
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:gap-3">
                                    <span class="shrink-0 text-xl font-black leading-tight tracking-[-0.03em] text-slate-950 dark:text-white sm:text-2xl lg:text-3xl">
                                        {{ $starter }}
                                    </span>

                                    <textarea
                                            class="js-writing-area block min-h-[38px] w-full resize-none border-0 border-b-2 border-dotted border-slate-300 bg-transparent px-0 pb-1 pt-1 text-base font-medium leading-[1.55] tracking-normal text-slate-800 outline-none focus:border-slate-700 focus:ring-0 dark:border-slate-600 dark:text-slate-100 dark:focus:border-slate-200 sm:text-lg lg:text-xl"
                                            data-index="{{ $index }}"
                                            rows="1"
                                            aria-label="Continue the answer: {{ $starter }}"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const areas = Array.from(document.querySelectorAll('.js-writing-area'));

            const resizeArea = (area) => {
                area.style.height = 'auto';
                area.style.height = `${Math.max(area.scrollHeight, 38)}px`;
            };

            areas.forEach((area) => {
                area.value = '';
                resizeArea(area);
                area.addEventListener('input', () => resizeArea(area));
            });

            window.resetSlide = () => {
                areas.forEach((area) => {
                    area.value = '';
                    resizeArea(area);
                });
            };
        })();
    </script>
@endsection