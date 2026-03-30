<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Making Invitations',

    'sections' => [
        [
            'label' => 'Making an Invitation',
            'emoji' => '💌',
            'theme' => 'indigo',
            'items' => [
                'Do you want to...?',
                'Do you want to play football?',
                'Want to watch a movie?',
                'How about...? "How about a coffee?"',
                'Are you free on Saturday?',
                "Let's go to the park.",
            ],
        ],
        [
            'label' => 'Accepting an Invitation',
            'emoji' => '✅',
            'theme' => 'violet',
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
            'theme' => 'blue',
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

@section('style')
    @parent
    <style>
        .nl-page {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .slide-viewport {
            height: 100dvh;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .slide-shell {
            min-height: 100dvh;
            display: flex;
            align-items: center;
        }

        .slide-shell.is-scrollable {
            align-items: flex-start;
        }

        .section-card {
            position: relative;
            overflow: hidden;
        }

        .section-card::before,
        .section-card::after {
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: 0.9;
        }

        .section-card::before {
            width: 110px;
            height: 110px;
            top: -34px;
            right: -22px;
        }

        .section-card::after {
            width: 84px;
            height: 84px;
            bottom: -34px;
            left: -18px;
            opacity: 0.55;
        }

        .section-card.card-indigo::before {
            background: radial-gradient(circle, rgba(99, 102, 241, 0.22) 0%, rgba(99, 102, 241, 0) 72%);
        }

        .section-card.card-indigo::after {
            background: radial-gradient(circle, rgba(59, 130, 246, 0.16) 0%, rgba(59, 130, 246, 0) 72%);
        }

        .section-card.card-violet::before {
            background: radial-gradient(circle, rgba(139, 92, 246, 0.22) 0%, rgba(139, 92, 246, 0) 72%);
        }

        .section-card.card-violet::after {
            background: radial-gradient(circle, rgba(217, 70, 239, 0.14) 0%, rgba(217, 70, 239, 0) 72%);
        }

        .section-card.card-blue::before {
            background: radial-gradient(circle, rgba(59, 130, 246, 0.22) 0%, rgba(59, 130, 246, 0) 72%);
        }

        .section-card.card-blue::after {
            background: radial-gradient(circle, rgba(6, 182, 212, 0.14) 0%, rgba(6, 182, 212, 0) 72%);
        }

        .phrase-item {
            backdrop-filter: blur(8px);
        }
    </style>
@endsection

@section('content')
    @php
        $sections = $content['sections'] ?? [];
    @endphp

    <div class="nl-page relative h-[100dvh] w-full overflow-hidden bg-[radial-gradient(980px_560px_at_8%_10%,rgba(103,63,231,.14),transparent_55%),radial-gradient(900px_560px_at_92%_14%,rgba(59,130,246,.12),transparent_56%),radial-gradient(880px_640px_at_50%_100%,rgba(16,185,129,.08),transparent_60%)]">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid place-items-center gap-6 text-center sm:gap-8">
                        <div id="heroBlock" class="flex flex-col justify-start text-center">
                            <div class="mx-auto w-full max-w-[42rem]">
                                <h1 class="hero-title mt-3 mx-auto mb-5 max-w-4xl text-4xl font-black tracking-tight sm:text-5xl lg:mt-5 lg:text-6xl">
                                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                        {{ $content['title'] ?? 'Invitations' }}
                                    </span>
                                </h1>

                                @if(!empty($content['subtitle']))
                                    <p class="hero-subtitle mx-auto mt-3 max-w-2xl text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:mt-4 lg:max-w-[31rem] lg:text-[1.15rem]">
                                        {{ $content['subtitle'] }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="w-full max-w-6xl text-left">
                            <div class="grid grid-cols-1 gap-3 sm:gap-4 md:grid-cols-2 xl:grid-cols-3 lg:gap-4">
                                @foreach($sections as $index => $section)
                                    @php
                                        $theme = $section['theme'] ?? match($index % 3) {
                                            0 => 'indigo',
                                            1 => 'violet',
                                            default => 'blue',
                                        };

                                        $themeClasses = match($theme) {
                                            'violet' => [
                                                'card' => 'card-violet',
                                                'icon' => 'bg-violet-500/10 text-violet-700 ring-violet-400/20 dark:bg-violet-400/10 dark:text-violet-200 dark:ring-violet-300/20',
                                                'item' => 'border-violet-100/80 bg-white/75 dark:border-violet-400/15 dark:bg-white/[0.04]',
                                                'dot'  => 'bg-violet-500',
                                            ],
                                            'blue' => [
                                                'card' => 'card-blue',
                                                'icon' => 'bg-blue-500/10 text-blue-700 ring-blue-400/20 dark:bg-blue-400/10 dark:text-blue-200 dark:ring-blue-300/20',
                                                'item' => 'border-blue-100/80 bg-white/75 dark:border-blue-400/15 dark:bg-white/[0.04]',
                                                'dot'  => 'bg-blue-500',
                                            ],
                                            default => [
                                                'card' => 'card-indigo',
                                                'icon' => 'bg-indigo-500/10 text-indigo-700 ring-indigo-400/20 dark:bg-indigo-400/10 dark:text-indigo-200 dark:ring-indigo-300/20',
                                                'item' => 'border-indigo-100/80 bg-white/75 dark:border-indigo-400/15 dark:bg-white/[0.04]',
                                                'dot'  => 'bg-indigo-500',
                                            ],
                                        };
                                    @endphp

                                    <article class="section-card {{ $themeClasses['card'] }} rounded-[24px] border border-white/70 bg-white/70 p-4 shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-5">
                                        <div class="relative z-10 flex h-full flex-col">
                                            <div class="flex items-start gap-3 sm:gap-4">
                                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-[1.35rem] ring-1 sm:h-14 sm:w-14 sm:text-[1.55rem] {{ $themeClasses['icon'] }}">
                                                    {{ $section['emoji'] ?? '💬' }}
                                                </div>

                                                <div class="min-w-0">
                                                    <p class="text-xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50 sm:text-2xl">
                                                        {{ $section['label'] ?? 'Section' }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mt-4 space-y-2.5 sm:mt-5 sm:space-y-3">
                                                @foreach(($section['items'] ?? []) as $item)
                                                    <div class="phrase-item flex items-start gap-3 rounded-2xl border px-4 py-3 {{ $themeClasses['item'] }}">
                                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full {{ $themeClasses['dot'] }}"></span>
                                                        <p class="text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                                            {{ $item }}
                                                        </p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const viewport = document.getElementById('slideViewport');
            const shell = document.getElementById('slideShell');

            function syncLayoutMode() {
                if (!viewport || !shell) return;

                shell.classList.remove('is-scrollable');

                requestAnimationFrame(() => {
                    const needsScroll = viewport.scrollHeight > viewport.clientHeight + 2;
                    shell.classList.toggle('is-scrollable', needsScroll);
                });
            }

            let resizeRaf = null;

            function handleResize() {
                if (resizeRaf) cancelAnimationFrame(resizeRaf);
                resizeRaf = requestAnimationFrame(() => {
                    syncLayoutMode();
                });
            }

            window.addEventListener('resize', handleResize);
            window.addEventListener('load', syncLayoutMode);

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(syncLayoutMode);
            }

            window.resetSlide = () => {
                syncLayoutMode();
            };

            syncLayoutMode();
        });
    </script>
@endsection
