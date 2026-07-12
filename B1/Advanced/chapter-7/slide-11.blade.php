@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'The Causative',
        'subtitle' => 'Getting Things Done for You',
    ];

    $neeraj = [
        ['emoji' => '🧔', 'text' => 'Trims his own beard'],
        ['emoji' => '🍳', 'text' => 'Cooks his own meals'],
        ['emoji' => '🖌️', 'text' => 'Painted his apartment'],
        ['emoji' => '👕', 'text' => 'Buys his own clothes'],
        ['emoji' => '🚲', 'text' => 'Goes everywhere by bicycle'],
        ['emoji' => '☂️', 'text' => 'Holds his own umbrella'],
    ];

    $neerajito = [
        ['emoji' => '✂️', 'text' => 'Gets his beard trimmed'],
        ['emoji' => '🍽️', 'text' => 'Has his meals cooked'],
        ['emoji' => '🏠', 'text' => 'Gets his mansion repainted'],
        ['emoji' => '🧥', 'text' => 'Gets his clothes made'],
        ['emoji' => '🚘', 'text' => 'Gets driven all over the city'],
        ['emoji' => '☔', 'text' => 'Gets his umbrella held'],
    ];

    $contextExamples = [
        [
            'emoji' => '🧔✂️',
            'text'  => 'He gets his beard <strong class="font-black text-blue-700 dark:text-blue-300">trimmed</strong> twice a week by his personal barber.',
        ],
        [
            'emoji' => '👨‍🍳🍽️',
            'text'  => 'He has his meals <strong class="font-black text-blue-700 dark:text-blue-300">cooked</strong> for him by his private chef.',
        ],
        [
            'emoji' => '🏠🎨',
            'text'  => 'He got his mansion <strong class="font-black text-blue-700 dark:text-blue-300">repainted</strong> pink.',
        ],
        [
            'emoji' => '🧥🪡',
            'text'  => 'He gets his clothes <strong class="font-black text-blue-700 dark:text-blue-300">made</strong> for him by his tailor.',
        ],
        [
            'emoji' => '🚘',
            'text'  => 'He gets <strong class="font-black text-blue-700 dark:text-blue-300">driven</strong> all over the city in his limousine by his driver.',
        ],
        [
            'emoji' => '☔🌧️',
            'text'  => 'He gets his umbrella <strong class="font-black text-blue-700 dark:text-blue-300">held</strong> for him when it rains by his butler.',
        ],
    ];

    $timeExpressions = [
        'twice a week',
        'every day / week / month',
        'recently',
        'last summer',
        'when it rains',
        'all over the city',
    ];
@endphp

@section('content')
    <main class="w-full overflow-x-hidden px-3 py-2.5 text-slate-950 dark:text-slate-50 sm:px-5 lg:px-7">
        <section class="mx-auto w-full max-w-[1260px]">
            @include('slider.components.title-subtitle')

            <div class="relative mt-3">
                {{-- Desktop connector lines --}}
                <svg
                        class="pointer-events-none absolute inset-0 z-0 hidden h-[690px] w-full lg:block"
                        viewBox="0 0 1200 690"
                        fill="none"
                        preserveAspectRatio="none"
                        aria-hidden="true"
                >
                    <path d="M500 112 C545 130 548 190 575 228" stroke="#7C3AED" stroke-width="7" stroke-linecap="round"/>
                    <path d="M700 112 C655 130 652 190 625 228" stroke="#15803D" stroke-width="7" stroke-linecap="round"/>

                    <path d="M425 345 C480 345 515 345 550 345" stroke="#F97316" stroke-width="7" stroke-linecap="round"/>
                    <path d="M650 345 C685 345 720 345 775 345" stroke="#2563EB" stroke-width="7" stroke-linecap="round"/>

                    <path d="M540 430 C500 500 455 560 410 590" stroke="#DB2777" stroke-width="7" stroke-linecap="round"/>
                    <path d="M600 440 C600 500 600 545 600 590" stroke="#0891B2" stroke-width="7" stroke-linecap="round"/>
                    <path d="M660 430 C700 500 745 560 790 590" stroke="#F59E0B" stroke-width="7" stroke-linecap="round"/>
                </svg>

                <div class="relative z-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-[minmax(0,1fr)_minmax(230px,0.72fr)_minmax(0,1fr)] lg:grid-rows-[auto_auto_auto] lg:items-center lg:gap-x-10 lg:gap-y-7">
                    {{-- 1. What is the causative? --}}
                    <article class="relative rounded-2xl border-2 border-violet-300 bg-violet-50/80 px-4 pb-4 pt-9 shadow-sm dark:border-violet-400/30 dark:bg-violet-500/[0.07] lg:col-start-1 lg:row-start-1">
                        <header class="absolute left-4 top-0 flex -translate-y-1/2 items-center gap-2 rounded-full bg-violet-700 py-1.5 pl-1.5 pr-4 text-white shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white/70 bg-white/15 text-lg font-black">?</span>
                            <h2 class="text-[11px] font-black uppercase tracking-[0.03em] sm:text-xs">
                                What Is the Causative?
                            </h2>
                        </header>

                        <div class="grid grid-cols-[52px_minmax(0,1fr)] items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-violet-200 bg-white text-3xl shadow-inner dark:border-violet-400/20 dark:bg-slate-900">
                                👤
                            </div>

                            <div class="space-y-2.5 text-[12px] font-bold leading-relaxed text-slate-700 dark:text-slate-200">
                                <p>The causative is a structure used when we get someone to do something for us.</p>
                                <p>We are <strong class="font-black text-violet-700 dark:text-violet-300">NOT</strong> doing it ourselves.</p>
                            </div>
                        </div>
                    </article>

                    {{-- 2. Structure --}}
                    <article class="relative rounded-2xl border-2 border-green-300 bg-green-50/80 px-4 pb-4 pt-9 shadow-sm dark:border-green-400/30 dark:bg-green-500/[0.07] lg:col-start-3 lg:row-start-1">
                        <header class="absolute left-4 top-0 flex -translate-y-1/2 items-center gap-2 rounded-full bg-green-700 py-1.5 pl-1.5 pr-4 text-white shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white/70 bg-white/15 text-lg">⚙️</span>
                            <h2 class="text-[11px] font-black uppercase tracking-[0.03em] sm:text-xs">
                                The Causative Structure
                            </h2>
                        </header>

                        <div class="rounded-xl border border-green-300 bg-white/90 px-3 py-2.5 text-center dark:border-green-400/30 dark:bg-slate-900/70">
                            <p class="text-[14px] font-black text-green-800 dark:text-green-300">
                                have / get + object + past participle
                            </p>
                            <p class="mt-0.5 text-[10px] font-bold italic text-slate-500 dark:text-slate-300">
                                (have something done / get something done)
                            </p>
                        </div>

                        <div class="mt-2.5">
                            <p class="mb-1 text-[11px] font-black text-slate-950 dark:text-white">Examples:</p>
                            <ul class="space-y-1 text-[11px] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                <li class="flex gap-2">
                                    <span class="mt-[0.38rem] h-1.5 w-1.5 shrink-0 rounded-full bg-green-600"></span>
                                    <span>He gets his beard <strong class="font-black text-green-700 dark:text-green-300">trimmed</strong>.</span>
                                </li>
                                <li class="flex gap-2">
                                    <span class="mt-[0.38rem] h-1.5 w-1.5 shrink-0 rounded-full bg-green-600"></span>
                                    <span>She has her car <strong class="font-black text-green-700 dark:text-green-300">repaired</strong>.</span>
                                </li>
                                <li class="flex gap-2">
                                    <span class="mt-[0.38rem] h-1.5 w-1.5 shrink-0 rounded-full bg-green-600"></span>
                                    <span>We had our house <strong class="font-black text-green-700 dark:text-green-300">cleaned</strong>.</span>
                                </li>
                            </ul>
                        </div>
                    </article>

                    {{-- Center character and circle --}}
                    <div class="relative order-first flex justify-center pb-4 pt-12 sm:col-span-2 lg:order-none lg:col-span-1 lg:col-start-2 lg:row-start-2 lg:pb-0 lg:pt-0">
                        <div class="absolute top-0 z-20 flex h-24 w-24 items-center justify-center rounded-[2rem] bg-fuchsia-500 text-5xl shadow-md lg:-top-20">
                            <span aria-hidden="true">😎</span>
                            <span class="absolute -right-3 -top-3 rotate-12 text-3xl" aria-hidden="true">👑</span>
                            <span class="absolute -bottom-2 -left-3 -rotate-12 text-3xl" aria-hidden="true">🎤</span>
                        </div>

                        <article class="relative z-10 flex h-[245px] w-[245px] flex-col items-center justify-center rounded-full border-[5px] border-violet-600 bg-white px-7 text-center shadow-[0_18px_38px_-24px_rgba(76,29,149,0.75)] dark:bg-slate-900">
                            <div class="mb-2 flex justify-center gap-2" aria-hidden="true">
                                <span class="h-4 w-1 rounded-full bg-violet-600"></span>
                                <span class="mt-1 h-3 w-1 rotate-45 rounded-full bg-violet-600"></span>
                                <span class="mt-1 h-3 w-1 -rotate-45 rounded-full bg-violet-600"></span>
                            </div>

                            <h2 class="text-[30px] font-black leading-none tracking-[-0.04em] text-slate-950 dark:text-white">
                                CAUSATIVE
                            </h2>
                            <p class="mt-2 text-[15px] font-black leading-tight text-slate-800 dark:text-slate-100">
                                Getting Things<br>Done for You
                            </p>
                            <p class="mt-3 text-[11px] font-bold leading-relaxed text-slate-600 dark:text-slate-300">
                                We use the causative when we cause someone to do something for us.
                            </p>

                            <div class="absolute -bottom-6 flex h-14 w-14 items-center justify-center rounded-full bg-amber-100 text-3xl shadow-sm dark:bg-amber-500/20">
                                🤝
                            </div>
                        </article>
                    </div>

                    {{-- 3. Who does what --}}
                    <article class="relative rounded-2xl border-2 border-orange-300 bg-orange-50/80 px-3 pb-3 pt-9 shadow-sm dark:border-orange-400/30 dark:bg-orange-500/[0.07] lg:col-start-1 lg:row-start-2">
                        <header class="absolute left-4 top-0 flex -translate-y-1/2 items-center gap-2 rounded-full bg-orange-600 py-1.5 pl-1.5 pr-4 text-white shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white/70 bg-white/15 text-lg">👥</span>
                            <h2 class="text-[11px] font-black uppercase tracking-[0.03em] sm:text-xs">
                                Who Does What?
                            </h2>
                        </header>

                        <div class="relative grid grid-cols-2 overflow-hidden rounded-xl border border-orange-300 bg-white/90 dark:border-orange-400/30 dark:bg-slate-900/65">
                            <section class="border-r border-orange-300 dark:border-orange-400/30">
                                <div class="border-b border-orange-300 px-2 py-2 text-center dark:border-orange-400/30">
                                    <h3 class="text-[11px] font-black text-orange-700 dark:text-orange-300">NEERAJ</h3>
                                    <p class="text-[9px] font-black text-rose-600 dark:text-rose-300">(does it himself)</p>
                                </div>

                                <ul class="divide-y divide-orange-200 dark:divide-orange-400/20">
                                    @foreach($neeraj as $item)
                                        <li class="grid min-h-9 grid-cols-[24px_minmax(0,1fr)] items-center gap-1.5 px-2 py-1 text-[9px] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                            <span class="text-center text-base">{{ $item['emoji'] }}</span>
                                            <span>{{ $item['text'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>

                            <section>
                                <div class="border-b border-orange-300 px-2 py-2 text-center dark:border-orange-400/30">
                                    <h3 class="text-[11px] font-black text-orange-700 dark:text-orange-300">NEERAJITO</h3>
                                    <p class="text-[9px] font-black text-rose-600 dark:text-rose-300">(gets it done for him)</p>
                                </div>

                                <ul class="divide-y divide-orange-200 dark:divide-orange-400/20">
                                    @foreach($neerajito as $item)
                                        <li class="grid min-h-9 grid-cols-[24px_minmax(0,1fr)] items-center gap-1.5 px-2 py-1 text-[9px] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                            <span class="text-center text-base">{{ $item['emoji'] }}</span>
                                            <span>{{ $item['text'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>

                            <div class="absolute left-1/2 top-1/2 flex h-9 w-9 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border-2 border-slate-400 bg-white text-[10px] font-black shadow-sm dark:bg-slate-900">
                                VS
                            </div>
                        </div>
                    </article>

                    {{-- 4. Examples --}}
                    <article class="relative rounded-2xl border-2 border-blue-300 bg-blue-50/80 px-3 pb-3 pt-9 shadow-sm dark:border-blue-400/30 dark:bg-blue-500/[0.07] lg:col-start-3 lg:row-start-2">
                        <header class="absolute left-4 top-0 flex -translate-y-1/2 items-center gap-2 rounded-full bg-blue-700 py-1.5 pl-1.5 pr-4 text-white shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white/70 bg-white/15 text-lg">★</span>
                            <h2 class="text-[11px] font-black uppercase tracking-[0.03em] sm:text-xs">
                                Examples in Context
                            </h2>
                        </header>

                        <div class="divide-y divide-blue-200 overflow-hidden rounded-xl border border-blue-300 bg-white/90 dark:divide-blue-400/20 dark:border-blue-400/30 dark:bg-slate-900/65">
                            @foreach($contextExamples as $item)
                                <div class="grid min-h-[50px] grid-cols-[52px_minmax(0,1fr)] items-center gap-2 px-2.5 py-1.5">
                                    <div class="flex h-10 w-11 items-center justify-center rounded-lg bg-blue-50 text-xl dark:bg-blue-500/10">
                                        {{ $item['emoji'] }}
                                    </div>
                                    <p class="text-[9px] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                        {!! $item['text'] !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </article>

                    {{-- 5. Notes --}}
                    <article class="relative rounded-2xl border-2 border-rose-300 bg-rose-50/80 px-4 pb-4 pt-9 shadow-sm dark:border-rose-400/30 dark:bg-rose-500/[0.07] lg:col-start-1 lg:row-start-3">
                        <header class="absolute left-4 top-0 flex -translate-y-1/2 items-center gap-2 rounded-full bg-rose-700 py-1.5 pl-1.5 pr-4 text-white shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white/70 bg-white/15 text-lg">📋</span>
                            <h2 class="text-[11px] font-black uppercase tracking-[0.03em] sm:text-xs">Useful Notes</h2>
                        </header>

                        <ul class="space-y-1.5 pr-20 text-[9px] font-bold leading-snug text-slate-700 dark:text-slate-200">
                            <li class="flex gap-1.5"><span class="font-black text-rose-600">✓</span><span>We can use <strong>have</strong> or <strong>get</strong> with the same meaning.</span></li>
                            <li class="flex gap-1.5"><span class="font-black text-rose-600">✓</span><span><strong>Have</strong> is more common in American English.</span></li>
                            <li class="flex gap-1.5"><span class="font-black text-rose-600">✓</span><span><strong>Get</strong> is more common in British English.</span></li>
                            <li class="flex gap-1.5"><span class="font-black text-rose-600">✓</span><span>The person who does the action can be mentioned (by the barber) or skipped.</span></li>
                            <li class="flex gap-1.5"><span class="font-black text-rose-600">✓</span><span>The object is usually a person or a thing.</span></li>
                        </ul>

                        <div class="absolute bottom-2 right-2 -rotate-2 rounded-lg border border-amber-300 bg-amber-100 px-2.5 py-2 text-[9px] font-black leading-snug text-slate-700 shadow-sm dark:border-amber-400/30 dark:bg-amber-500/15 dark:text-slate-200">
                            <p class="mb-1 text-amber-800 dark:text-amber-300">Compare:</p>
                            <p>I cut my hair. <span class="text-rose-600">✕</span></p>
                            <p>I get my hair cut. <span class="text-green-700">✓</span></p>
                        </div>
                    </article>

                    {{-- 6. Why --}}
                    <article class="relative rounded-2xl border-2 border-cyan-300 bg-cyan-50/80 px-3 pb-3 pt-9 shadow-sm dark:border-cyan-400/30 dark:bg-cyan-500/[0.07] lg:col-start-2 lg:row-start-3">
                        <header class="absolute left-1/2 top-0 flex -translate-x-1/2 -translate-y-1/2 items-center gap-2 whitespace-nowrap rounded-full bg-cyan-700 py-1.5 pl-1.5 pr-4 text-white shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white/70 bg-white/15 text-lg">💡</span>
                            <h2 class="text-[11px] font-black uppercase tracking-[0.03em]">Why Use It?</h2>
                        </header>

                        <div class="space-y-1.5">
                            <div class="flex items-center gap-2 rounded-lg border border-cyan-200 bg-white/90 px-2.5 py-1.5 dark:border-cyan-400/20 dark:bg-slate-900/65">
                                <span class="text-lg">🕒</span>
                                <span class="text-[10px] font-black text-slate-700 dark:text-slate-200">It’s faster</span>
                            </div>
                            <div class="flex items-center gap-2 rounded-lg border border-cyan-200 bg-white/90 px-2.5 py-1.5 dark:border-cyan-400/20 dark:bg-slate-900/65">
                                <span class="text-lg">💵</span>
                                <span class="text-[10px] font-black text-slate-700 dark:text-slate-200">It’s cheaper</span>
                            </div>
                            <div class="flex items-center gap-2 rounded-lg border border-cyan-200 bg-white/90 px-2.5 py-1.5 dark:border-cyan-400/20 dark:bg-slate-900/65">
                                <span class="text-lg">🤷</span>
                                <span class="text-[10px] font-black text-slate-700 dark:text-slate-200">You can’t do it yourself</span>
                            </div>
                            <div class="flex items-center gap-2 rounded-lg border border-cyan-200 bg-white/90 px-2.5 py-1.5 dark:border-cyan-400/20 dark:bg-slate-900/65">
                                <span class="text-lg">👍</span>
                                <span class="text-[10px] font-black text-slate-700 dark:text-slate-200">It’s more convenient</span>
                            </div>
                        </div>
                    </article>

                    {{-- 7. Time --}}
                    <article class="relative rounded-2xl border-2 border-amber-300 bg-amber-50/80 px-4 pb-4 pt-9 shadow-sm dark:border-amber-400/30 dark:bg-amber-500/[0.07] lg:col-start-3 lg:row-start-3">
                        <header class="absolute left-4 top-0 flex -translate-y-1/2 items-center gap-2 rounded-full bg-amber-500 py-1.5 pl-1.5 pr-4 text-white shadow-sm">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-white/70 bg-white/15 text-lg">🕒</span>
                            <h2 class="text-[11px] font-black uppercase tracking-[0.03em] sm:text-xs">Time Expressions</h2>
                        </header>

                        <p class="text-[10px] font-black text-slate-700 dark:text-slate-200">Common with the causative:</p>

                        <div class="mt-2 grid grid-cols-[minmax(0,1fr)_60px] items-end gap-3">
                            <ul class="space-y-0.5 text-[9px] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                @foreach($timeExpressions as $expression)
                                    <li class="flex gap-1.5">
                                        <span class="mt-[0.32rem] h-1.5 w-1.5 shrink-0 rounded-full bg-amber-500"></span>
                                        <span>{{ $expression }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="flex h-14 w-14 items-center justify-center rounded-xl border border-amber-200 bg-white text-3xl shadow-inner dark:border-amber-400/20 dark:bg-slate-900">
                                🗓️
                            </div>
                        </div>
                    </article>
                </div>

                {{-- Reminder strip --}}
                <section class="relative z-10 mt-6 overflow-hidden rounded-2xl border-2 border-violet-300 bg-white/90 shadow-sm dark:border-violet-400/30 dark:bg-slate-900/70">
                    <div class="grid gap-3 px-4 py-3 sm:grid-cols-[auto_minmax(0,1fr)_minmax(310px,0.9fr)_auto] sm:items-center">
                        <div class="flex items-center gap-2">
                            <span class="text-3xl">📣</span>
                            <h2 class="text-[12px] font-black uppercase text-violet-800 dark:text-violet-300">Remember!</h2>
                        </div>

                        <p class="text-[10px] font-bold leading-snug text-slate-700 dark:text-slate-200 sm:border-l sm:border-dotted sm:border-violet-300 sm:pl-4">
                            Use the causative when you cause something to happen, but you don’t do it yourself.
                        </p>

                        <div class="rounded-xl border border-green-300 bg-green-50 px-4 py-2.5 text-center dark:border-green-400/30 dark:bg-green-500/10">
                            <p class="text-[13px] font-black text-slate-900 dark:text-white">
                                <span class="text-green-700 dark:text-green-300">have</span> /
                                <span class="text-blue-700 dark:text-blue-300">get</span>
                                + object + past participle
                            </p>
                            <p class="mt-0.5 text-[9px] font-bold italic text-slate-500 dark:text-slate-300">
                                (have something done / get something done)
                            </p>
                        </div>

                        <div class="flex items-center justify-center gap-2 rounded-full bg-violet-700 px-4 py-2 text-center text-[9px] font-black leading-tight text-white">
                            <span>You cause it.<br>They do it.<br>Simple!</span>
                            <span class="text-2xl">😎</span>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection