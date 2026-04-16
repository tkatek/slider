<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => 'Making Invitations',

    'sections' => [
        [
            'label' => 'Making an Invitation',
            'emoji' => '💌',
            'tone' => 'indigo',
            'items' => [
                'Do you want to...?',
                'Do you want to play football?',
                'Want to watch a movie?',
                'How about a coffee?',
                'Are you free on Saturday?',
                "Let's go to the park.",
            ],
        ],
        [
            'label' => 'Accepting an Invitation',
            'emoji' => '✅',
            'tone' => 'violet',
            'items' => [
                "Yes, I'd love to!",
                'Sounds great! What time?',
                'Sure!',
                "OK, let's do that.",
            ],
        ],
        [
            'label' => 'Declining Politely',
            'emoji' => '🙏',
            'tone' => 'blue',
            'items' => [
                "Sorry, I can't. I'm busy.",
                "I'd love to, but I have to work.",
                'Maybe next time!',
                "Thanks for asking, but I can't.",
                "I'm sorry, I'm not free on Sunday.",
            ],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    @php
        $cards = $content['sections'] ?? [];

        $toneMap = [
            'indigo' => [
                'card' => 'border-indigo-100/80 bg-white/75 dark:border-indigo-400/15 dark:bg-white/[0.04]',
                'icon' => 'bg-indigo-500/10 text-indigo-700 ring-indigo-400/20 dark:bg-indigo-400/10 dark:text-indigo-200 dark:ring-indigo-300/20',
                'item' => 'border-indigo-100/80 bg-white/80 dark:border-indigo-400/15 dark:bg-white/[0.05]',
                'dot'  => 'bg-indigo-500',
            ],
            'violet' => [
                'card' => 'border-violet-100/80 bg-white/75 dark:border-violet-400/15 dark:bg-white/[0.04]',
                'icon' => 'bg-violet-500/10 text-violet-700 ring-violet-400/20 dark:bg-violet-400/10 dark:text-violet-200 dark:ring-violet-300/20',
                'item' => 'border-violet-100/80 bg-white/80 dark:border-violet-400/15 dark:bg-white/[0.05]',
                'dot'  => 'bg-violet-500',
            ],
            'blue' => [
                'card' => 'border-blue-100/80 bg-white/75 dark:border-blue-400/15 dark:bg-white/[0.04]',
                'icon' => 'bg-blue-500/10 text-blue-700 ring-blue-400/20 dark:bg-blue-400/10 dark:text-blue-200 dark:ring-blue-300/20',
                'item' => 'border-blue-100/80 bg-white/80 dark:border-blue-400/15 dark:bg-white/[0.05]',
                'dot'  => 'bg-blue-500',
            ],
        ];
    @endphp

    <div class="relative min-h-[100dvh] overflow-x-hidden overflow-y-auto bg-[radial-gradient(980px_560px_at_8%_10%,rgba(103,63,231,.14),transparent_55%),radial-gradient(900px_560px_at_92%_14%,rgba(59,130,246,.12),transparent_56%),radial-gradient(880px_640px_at_50%_100%,rgba(16,185,129,.08),transparent_60%)]">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1280px] items-center px-4 py-6 sm:px-6 sm:py-8 lg:px-8 lg:py-10">
            <main class="w-full">
                <section class="space-y-6 sm:space-y-8">
                    <div class="mx-auto max-w-4xl text-center">
                        @include('slider.components.title-subtitle')
                    </div>

                    <div class="mx-auto w-full max-w-6xl">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                            @foreach($cards as $cardIndex => $card)
                                @php
                                    $toneKey = $card['tone'] ?? match($cardIndex % 3) {
                                        0 => 'indigo',
                                        1 => 'violet',
                                        default => 'blue',
                                    };

                                    $toneClasses = $toneMap[$toneKey] ?? $toneMap['indigo'];
                                @endphp

                                <article class="rounded-[24px] border p-4 shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md sm:p-5 {{ $toneClasses['card'] }}">
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-[1.35rem] ring-1 sm:h-14 sm:w-14 sm:text-[1.55rem] {{ $toneClasses['icon'] }}">
                                            {{ $card['emoji'] ?? '💬' }}
                                        </div>

                                        <div class="min-w-0">
                                            <h2 class="text-xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50 sm:text-2xl">
                                                {{ $card['label'] ?? 'Section' }}
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="mt-4 space-y-2.5 sm:mt-5 sm:space-y-3">
                                        @foreach(($card['items'] ?? []) as $line)
                                            <div class="flex items-start gap-3 rounded-2xl border px-4 py-3 backdrop-blur-sm {{ $toneClasses['item'] }}">
                                                <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full {{ $toneClasses['dot'] }}"></span>
                                                <p class="text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                                    {{ $line }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
@endsection