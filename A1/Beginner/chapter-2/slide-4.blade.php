<?php
$content = [
    'page_title' => 'Personal Information',
    'title'      => 'Where Do We Use Personal Information?',
    'subtitle'   => '',

    'cards' => [
        [
            'id'          => 'card1',
            'title'       => 'Schools',
            'description' => 'Personal information is required for enrollment forms.',
            'image' => materialAsset("slider/A1/Beginner/chapter-2/img/school.webp"),
        ],
        [
            'id'          => 'card2',
            'title'       => 'Hospitals',
            'description' => 'Hospitals use personal information for patient records.',
            'image' => materialAsset("slider/A1/Beginner/chapter-2/img/hospital.webp"),
        ],
        [
            'id'          => 'card3',
            'title'       => 'Jobs',
            'description' => 'Personal information is necessary for job applications.',
            'image' => materialAsset("slider/A1/Beginner/chapter-2/img/job.webp"),
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

            <div class="header-spacing text-center space-y-6 my-8">

                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{$content['title']}}
                    </span>
                </h1>
                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{$content['subtitle']}}
                </p>
            </div>

            <section id="cardsWrap" class="pb-2">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 items-stretch">
                    @foreach ($content['cards'] as $card)
                        <article id="{{ $card['id'] }}"
                                 class="group relative rounded-[28px] border border-slate-200/70 bg-white/60 backdrop-blur-xl shadow-xl
                                        dark:border-slate-700/30 dark:bg-slate-950/35 p-4 sm:p-5
                                        transition-transform duration-200 hover:-translate-y-0.5">

                            <div class="relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white/55 shadow-lg
                                        dark:border-slate-700/30 dark:bg-slate-900/20
                                        aspect-square
                                        transition-transform duration-200 group-hover:scale-[1.01]
                                        ring-1 ring-white/30 dark:ring-white/10">

                                <img
                                        src="{{ $card['image'] }}"
                                        alt="{{ $card['title'] }}"
                                        loading="lazy"
                                        decoding="async"
                                        class="h-full w-full object-cover select-none"
                                        draggable="false"
                                />

                                <div class="pointer-events-none absolute inset-0 opacity-90
                                            bg-[radial-gradient(420px_260px_at_20%_20%,rgba(99,102,241,0.18),transparent_60%)]"></div>

                                <div class="pointer-events-none absolute inset-0
                                            bg-gradient-to-t from-slate-950/30 via-transparent to-transparent
                                            dark:from-slate-950/55"></div>

                                <div class="absolute left-3 top-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[0.70rem] font-black tracking-[0.14em] uppercase
                                                 bg-slate-900/90 text-white ring-1 ring-white/15
                                                 dark:bg-white/90 dark:text-slate-900 dark:ring-black/10">
                                        Example
                                    </span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50">
                                    {{ $card['title'] }}
                                </h2>

                                <p class="mt-2 text-base sm:text-lg font-medium text-slate-700 dark:text-slate-200 leading-[1.45]">
                                    {{ $card['description'] }}
                                </p>
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
