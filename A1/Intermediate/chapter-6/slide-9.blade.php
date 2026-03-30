<?php
$content = [
    'page_title' => 'Three Types of Emergency Services',
    'title'      => 'Three Types of Emergency Services',
    'subtitle'   => '',

    'cards' => [
        [
            'id'    => 'police',
            'title' => 'POLICE',
            'emoji' => '👮‍♂️',
            'items' => [
                ['emoji' => '⚠️', 'text' => 'Crimes & violence'],
                ['emoji' => '🧾', 'text' => 'Theft & robbery'],
                ['emoji' => '🔓', 'text' => 'Break-ins'],
                ['emoji' => '🚗', 'text' => 'Car accidents'],
            ],
        ],
        [
            'id'    => 'fire',
            'title' => 'FIRE DEPARTMENT',
            'emoji' => '🚒',
            'items' => [
                ['emoji' => '🔥', 'text' => 'Building fires'],
                ['emoji' => '⛽', 'text' => 'Gas leaks'],
                ['emoji' => '🪜', 'text' => 'Rescues'],
                ['emoji' => '🚧', 'text' => 'Dangerous situations'],
            ],
        ],
        [
            'id'    => 'ambulance',
            'title' => 'AMBULANCE',
            'emoji' => '🚑',
            'items' => [
                ['emoji' => '🩺', 'text' => 'Medical emergencies'],
                ['emoji' => '❤️', 'text' => 'Heart attacks'],
                ['emoji' => '🩹', 'text' => 'Accidents with injuries'],
                ['emoji' => '😵', 'text' => 'Unconscious people'],
            ],
        ],
    ],
];
?>

@extends("slider.simple-layout")

@section("title", $content['page_title'] ?? 'Slide')

@section("style")
@endsection

@section("content")
    <main class="min-h-[100dvh] w-full flex items-center justify-center px-4 sm:px-8 py-8 sm:py-10">
        <div class="w-full max-w-6xl">
            <header id="titleBlock" class="text-center mb-6 sm:mb-10">
                <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-3xl sm:text-5xl lg:text-6xl">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="mt-2 font-extrabold tracking-[-0.02em] text-sm sm:text-base text-slate-700 dark:text-slate-200">
                        {{ $content['subtitle'] }}
                    </p>
                @endif


            </header>

            <section id="cardsWrap" class="pb-2">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 items-stretch">
                    @foreach ($content['cards'] as $card)
                        <article id="{{ $card['id'] }}"
                                 class="group relative rounded-[28px] border border-slate-200/70 bg-white/60 backdrop-blur-xl shadow-xl
                                        dark:border-slate-700/30 dark:bg-slate-950/35 p-4 sm:p-5
                                        transition-transform duration-200 hover:-translate-y-0.5">

                            <div
                                    @class([
                                        'relative overflow-hidden rounded-2xl border shadow-lg ring-1 aspect-[16/9] p-4 sm:p-5',
                                        'border-slate-200/70 ring-white/30 bg-white/55 dark:border-slate-700/30 dark:ring-white/10 dark:bg-slate-900/20',
                                        'transition-transform duration-200 group-hover:scale-[1.01]',
                                    ])
                            >
                                <div
                                        @class([
                                            'absolute inset-0 opacity-95',
                                            'bg-gradient-to-br from-blue-600 to-indigo-600' => $card['id'] === 'police',
                                            'bg-gradient-to-br from-rose-600 to-orange-500' => $card['id'] === 'fire',
                                            'bg-gradient-to-br from-emerald-600 to-teal-500' => $card['id'] === 'ambulance',
                                        ])
                                ></div>

                                <div class="absolute inset-0 opacity-80 bg-[radial-gradient(520px_260px_at_20%_20%,rgba(255,255,255,0.20),transparent_60%)]"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/30 via-transparent to-transparent dark:from-slate-950/55"></div>

                                <div class="relative z-10 flex h-full flex-col justify-between">
                                    <div class="flex items-start justify-between gap-3">
                                        <div class="flex items-center gap-3">
                                            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/90 text-2xl shadow-sm ring-1 ring-black/5 dark:bg-slate-950/55 dark:ring-white/10">
                                                {{ $card['emoji'] }}
                                            </span>

                                            <div class="leading-tight">
                                                <div class="text-[0.75rem] sm:text-[0.78rem] font-black tracking-[0.18em] uppercase text-white/90">
                                                    Emergency service
                                                </div>
                                                <div class="text-lg sm:text-xl font-black tracking-[-0.02em] text-white">
                                                    {{ $card['title'] }}
                                                </div>
                                            </div>
                                        </div>

                                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[0.70rem] font-black tracking-[0.14em] uppercase bg-white/20 text-white ring-1 ring-white/20 backdrop-blur">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>

                                    <div class="mt-4 grid grid-cols-1 gap-2">
                                        <div class="inline-flex items-center gap-2 rounded-2xl bg-white/15 px-3 py-2 text-white/95 ring-1 ring-white/15 backdrop-blur">
                                            <span class="text-base">📌</span>
                                            <span class="text-sm sm:text-[0.95rem] font-extrabold tracking-[-0.01em]">When to call</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="grid gap-2">
                                    @foreach ($card['items'] as $item)
                                        <div class="flex items-start gap-3 rounded-2xl border border-slate-200/70 bg-white/70 px-3 py-2.5 shadow-sm
                                                    dark:border-slate-700/30 dark:bg-slate-950/30">
                                            <span class="mt-0.5 grid h-8 w-8 place-items-center rounded-xl bg-slate-900/90 text-white ring-1 ring-white/15 dark:bg-white/90 dark:text-slate-900 dark:ring-black/10">
                                                {{ $item['emoji'] }}
                                            </span>
                                            <div class="min-w-0">
                                                <div class="text-sm sm:text-base font-extrabold tracking-[-0.01em] text-slate-900 dark:text-slate-50">
                                                    {{ $item['text'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="pointer-events-none absolute inset-0 rounded-[28px] opacity-0 group-hover:opacity-100 transition-opacity duration-200
                                        ring-2 ring-indigo-500/20 dark:ring-indigo-300/15"></div>
                        </article>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = () => {};
        });
    </script>
@endsection
