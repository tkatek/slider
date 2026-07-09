@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'New Language',
        'title'      => 'New Language',
        'subtitle'   => '',

        'collocations_left' => [
            'climate change',
            'global weather patterns',
            'human activities',
            'fossil fuels',
            'greenhouse gas emissions',
            'trap heat',
            "cause the Earth’s temperature to rise",
            'negative impacts',
        ],

        'collocations_right' => [
            'severe weather events',
            'rising sea levels',
            'coastal communities',
            'at risk of flooding and erosion',
            'adapt to the changing climate',
            'reduce greenhouse gas emissions',
            'take action',
            'carbon footprint',
            'renewable energy',
        ],

        'verbs_left' => [
            'cause (sth)',
            'release (gases)',
            'trap (heat)',
            'result in (sth)',
            'be felt (around the world)',
            'become (more frequent/severe)',
        ],

        'verbs_right' => [
            'rise (sea levels)',
            'put (communities) at risk',
            'adapt to (sth)',
            'struggle to (do sth)',
            'take action',
            'reduce (emissions)',
            'mitigate (effects)',
        ],

        'other_language' => [
            'leading to significant economic and social costs',
            'at an increasing rate',
            'threaten the balance of entire ecosystems',
            "if we don’t take action",
            'mitigate the effects of climate change',
            'prioritize the health of our planet',
            'spread awareness about this important issue',
        ],
    ];

    $collocations = array_merge($content['collocations_left'], $content['collocations_right']);
    $verbs = array_merge($content['verbs_left'], $content['verbs_right']);
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-start overflow-x-hidden bg-gradient-to-br from-emerald-50 via-white to-sky-50 px-4 py-5 text-slate-950 dark:from-slate-950 dark:via-slate-900 dark:to-emerald-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1280px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 flex w-full max-w-[1180px] flex-col gap-5">

                {{-- COLLOCATIONS --}}
                <section class="overflow-hidden rounded-[1.75rem] border border-emerald-200 bg-white/95 shadow-[0_20px_55px_rgba(15,118,110,0.12)] dark:border-emerald-500/25 dark:bg-slate-900/90">
                    <div class="border-b border-emerald-200 bg-emerald-100/80 px-6 py-2.5 text-emerald-900 dark:border-emerald-500/25 dark:bg-emerald-900/30 dark:text-emerald-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/70 text-base ring-1 ring-emerald-300 dark:bg-emerald-950/40 dark:ring-emerald-500/30">
                                🔗
                            </div>

                            <h2 class="text-sm font-extrabold uppercase tracking-wide sm:text-lg">
                                Collocations (Words That Go Together)
                            </h2>
                        </div>
                    </div>

                    <div class="p-5">
                        <ul class="grid gap-x-8 gap-y-2 text-[0.92rem] font-extrabold leading-snug text-slate-800 dark:text-slate-100 md:grid-cols-3">
                            @foreach($collocations as $item)
                                <li class="flex items-start gap-2.5">
                                    <span class="mt-[0.1rem] text-emerald-600 dark:text-emerald-300">●</span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>

                {{-- USEFUL VERBS --}}
                <section class="overflow-hidden rounded-[1.75rem] border border-orange-200 bg-white/95 shadow-[0_20px_55px_rgba(234,88,12,0.12)] dark:border-orange-500/25 dark:bg-slate-900/90">
                    <div class="border-b border-orange-200 bg-orange-100/80 px-6 py-2.5 text-orange-900 dark:border-orange-500/25 dark:bg-orange-900/30 dark:text-orange-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/70 text-base ring-1 ring-orange-300 dark:bg-orange-950/40 dark:ring-orange-500/30">
                                ⚙️
                            </div>

                            <h2 class="text-sm font-extrabold uppercase tracking-wide sm:text-lg">
                                Useful Verbs & Verb Phrases
                            </h2>
                        </div>
                    </div>

                    <div class="p-5">
                        <ul class="grid gap-x-8 gap-y-2 text-[0.92rem] font-extrabold leading-snug text-slate-800 dark:text-slate-100 md:grid-cols-3">
                            @foreach($verbs as $item)
                                <li class="flex items-start gap-2.5">
                                    <span class="mt-[0.1rem] text-orange-600 dark:text-orange-300">●</span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>

                {{-- OTHER USEFUL LANGUAGE --}}
                <section class="overflow-hidden rounded-[1.75rem] border border-violet-200 bg-white/95 shadow-[0_20px_55px_rgba(124,58,237,0.12)] dark:border-violet-500/25 dark:bg-slate-900/90">
                    <div class="border-b border-violet-200 bg-violet-100/80 px-6 py-2.5 text-violet-900 dark:border-violet-500/25 dark:bg-violet-900/30 dark:text-violet-100">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/70 text-base ring-1 ring-violet-300 dark:bg-violet-950/40 dark:ring-violet-500/30">
                                ⭐
                            </div>

                            <h2 class="text-sm font-extrabold uppercase tracking-wide sm:text-lg">
                                Other Useful Language
                            </h2>
                        </div>
                    </div>

                    <div class="p-5">
                        <ul class="grid gap-x-8 gap-y-2 text-[0.92rem] font-extrabold leading-snug text-slate-800 dark:text-slate-100 md:grid-cols-3">
                            @foreach($content['other_language'] as $item)
                                <li class="flex items-start gap-2.5">
                                    <span class="mt-[0.1rem] text-violet-600 dark:text-violet-300">●</span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>

            </div>
        </section>
    </main>
@endsection