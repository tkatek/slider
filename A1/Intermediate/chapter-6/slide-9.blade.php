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
    <main class="min-h-[100dvh] w-full flex items-center justify-center px-3 py-5 sm:px-4 sm:py-6 md:px-6 lg:px-8">
        <div class="w-full max-w-6xl">
            <div class="mb-4 sm:mb-5 md:mb-6 lg:mb-7">
                @include('slider.components.title-subtitle')
            </div>

            <section id="cardsWrap" class="pb-2">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4 xl:gap-6 items-stretch">
                    @foreach ($content['cards'] as $card)
                        <article id="{{ $card['id'] }}"
                                 class="group relative rounded-[22px] md:rounded-[24px] xl:rounded-[28px] border border-slate-200/70 bg-white/60 backdrop-blur-xl shadow-xl
                                        dark:border-slate-700/30 dark:bg-slate-950/35 p-3 md:p-4 xl:p-5
                                        transition-transform duration-200 hover:-translate-y-0.5">

                            <div
                                    @class([
                                        'relative overflow-hidden rounded-2xl border shadow-lg ring-1 min-h-[150px] sm:min-h-[170px] md:min-h-[165px] lg:min-h-[170px] xl:aspect-[16/9] xl:min-h-0 p-3 md:p-4 xl:p-5',
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

                                <div class="relative z-10 flex h-full flex-col justify-between gap-4">
                                    <div class="flex items-start justify-between gap-2">
                                        <div class="flex min-w-0 flex-1 items-start gap-2 md:gap-3">
                                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-white/90 text-lg shadow-sm ring-1 ring-black/5
                                                         dark:bg-slate-950/55 dark:ring-white/10
                                                         md:h-10 md:w-10 md:text-xl lg:h-11 lg:w-11 lg:text-2xl xl:h-12 xl:w-12 xl:rounded-2xl">
                                                {{ $card['emoji'] }}
                                            </span>

                                            <div class="min-w-0 flex-1 leading-tight pt-0.5">
                                                <div class="text-[0.55rem] md:text-[0.65rem] lg:text-[0.72rem] xl:text-[0.78rem] font-black tracking-[0.08em] md:tracking-[0.12em] xl:tracking-[0.18em] uppercase text-white/90">
                                                    Emergency service
                                                </div>

                                                <div class="mt-1 text-sm md:text-base lg:text-lg xl:text-xl font-black leading-[1.05] tracking-[-0.02em] text-white break-words">
                                                    {{ $card['title'] }}
                                                </div>
                                            </div>
                                        </div>

                                        <span class="shrink-0 inline-flex items-center rounded-full px-1.5 py-0.5 md:px-2 md:py-1 xl:px-2.5 text-[0.6rem] md:text-[0.65rem] xl:text-[0.70rem] font-black tracking-[0.1em] uppercase bg-white/20 text-white ring-1 ring-white/20 backdrop-blur">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-1 gap-2">
                                        <div class="inline-flex w-fit max-w-full items-center gap-1.5 md:gap-2 rounded-xl xl:rounded-2xl bg-white/15 px-2 py-1.5 md:px-2.5 md:py-2 xl:px-3 text-white/95 ring-1 ring-white/15 backdrop-blur">
                                            <span class="shrink-0 text-sm md:text-base">📌</span>
                                            <span class="min-w-0 text-[0.72rem] md:text-xs lg:text-sm xl:text-[0.95rem] font-extrabold tracking-[-0.01em] leading-tight">
                                                When to call
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 xl:mt-4">
                                <div class="grid gap-2">
                                    @foreach ($card['items'] as $item)
                                        <div class="flex items-start gap-2 md:gap-2.5 lg:gap-3 rounded-xl xl:rounded-2xl border border-slate-200/70 bg-white/70 px-2.5 py-2 shadow-sm
                                                    dark:border-slate-700/30 dark:bg-slate-950/30
                                                    lg:px-3 lg:py-2.5">
                                            <span class="mt-0.5 grid h-7 w-7 shrink-0 place-items-center rounded-lg bg-slate-900/90 text-sm text-white ring-1 ring-white/15
                                                         dark:bg-white/90 dark:text-slate-900 dark:ring-black/10
                                                         lg:h-8 lg:w-8 lg:rounded-xl lg:text-base">
                                                {{ $item['emoji'] }}
                                            </span>

                                            <div class="min-w-0">
                                                <div class="text-xs md:text-sm lg:text-base font-extrabold tracking-[-0.01em] leading-tight text-slate-900 dark:text-slate-50">
                                                    {{ $item['text'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="pointer-events-none absolute inset-0 rounded-[22px] md:rounded-[24px] xl:rounded-[28px] opacity-0 group-hover:opacity-100 transition-opacity duration-200
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