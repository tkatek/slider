<?php
$content = [
    'page_title' => 'Questions',
    'title'      => 'Can you describe your house?',
    'subtitle'   => '',
    'images' => [
        'home_type' => materialAsset('slider/A1/Beginner/chapter-5/img/slide4-1.webp'),
        'rooms'     => materialAsset('slider/A1/Beginner/chapter-5/img/slide4-2.webp'),
    ],
    'questions' => [
        [
            'emoji'     => '🏠',
            'text'      => 'Do you live in a house or in an apartment?',
            'image_key' => 'home_type',
            'alt'       => 'Houses and apartment buildings',
        ],
        [
            'emoji'     => '🚪',
            'text'      => 'How many rooms do you have?',
            'image_key' => 'rooms',
            'alt'       => 'House floor plan showing rooms',
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-4 sm:gap-6">

                    <div class="header-spacing text-center space-y-6 my-8">

                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title']  }}
                            </span>
                        </h1>
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{ $content['subtitle']  }}
                        </p>
                    </div>

                    <div
                            id="questionsGrid"
                            class="w-full max-w-4xl mt-2 sm:mt-4 grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5 items-stretch"
                    >
                        @foreach($content['questions'] as $q)
                            @php $src = $content['images'][$q['image_key']] ?? ''; @endphp

                            <article
                                    data-talk-card
                                    class="w-full h-full flex flex-col group relative overflow-hidden rounded-3xl
                                       !opacity-100
                                       bg-white dark:bg-slate-900
                                       border border-slate-200/80 dark:border-slate-700/70
                                       shadow-[0_10px_30px_rgba(2,6,23,0.07)]"
                            >
                                <div class="relative aspect-[16/10] overflow-hidden bg-slate-100 dark:bg-slate-800">
                                    <img
                                            src="{{ $src }}"
                                            alt="{{ $q['alt'] }}"
                                            loading="lazy"
                                            decoding="async"
                                            class="h-full w-full object-cover !opacity-100"
                                            onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/3/3f/Placeholder_view_vector.svg';"
                                    />
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/0 via-slate-950/0 to-white/20 dark:to-white/10"></div>
                                </div>

                                <div class="p-5 sm:p-6 text-left flex-1 flex flex-col !opacity-100">
                                    <div class="inline-flex items-center gap-2 rounded-full px-3 py-1 bg-indigo-600/15 text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-200 font-black text-sm">
                                        <span aria-hidden="true" class="text-base">{{ $q['emoji'] }}</span>
                                        <span>Question</span>
                                    </div>

                                    <p class="mt-3 !text-slate-900 dark:!text-slate-50 font-extrabold tracking-[-0.02em] text-lg sm:text-xl leading-snug">
                                        {{ $q['text'] }}
                                    </p>

                                    <div class="mt-auto pt-3">
                                        <p class="text-slate-700 dark:text-slate-300 text-sm sm:text-[0.95rem] font-semibold">
                                            Say your answer out loud ✨
                                        </p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
