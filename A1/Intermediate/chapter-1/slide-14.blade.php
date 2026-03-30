<?php
$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => 'Practice the conversation with a partner. Be sure to pronounce can and can’t correctly.',

    'dialogues' => [
        ['side' => 'left',  'text' => 'How about going to a movie on Saturday night?'],
        ['side' => 'right', 'text' => 'Saturday night? Sorry, I can’t. I have to work.'],
        ['side' => 'left',  'text' => 'Oh, that’s too bad.'],
        ['side' => 'right', 'text' => 'Yeah. I can go to the movies Friday night, though. Are you free then?'],
        ['side' => 'left',  'text' => 'Yes, I think so. Can you check what’s playing? I can’t find my phone.'],
        ['side' => 'right', 'text' => 'Okay, let’s see… How about The Monster’s Return? There’s a 7:30 show.'],
        ['side' => 'left',  'text' => 'That sounds good. Think you can give me a ride?'],
        ['side' => 'right', 'text' => 'Sure. I’ll pick you up around seven. See you Friday.'],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    @parent
    <style>
        .speaking-page {
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
            transition: padding 0.2s ease, align-items 0.2s ease;
        }

        .slide-shell.is-scrollable {
            align-items: flex-start;
        }

        .speaking-panel {
            position: relative;
            overflow: hidden;
        }

        .speaking-panel::before,
        .speaking-panel::after {
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: 0.9;
        }

        .speaking-panel::before {
            width: 120px;
            height: 120px;
            top: -38px;
            right: -22px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.22) 0%, rgba(99, 102, 241, 0) 72%);
        }

        .speaking-panel::after {
            width: 94px;
            height: 94px;
            bottom: -34px;
            left: -16px;
            opacity: 0.55;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.16) 0%, rgba(59, 130, 246, 0) 72%);
        }

        .dialogue-card {
            position: relative;
            display: flex;
            width: 100%;
        }

        .dialogue-card.is-left {
            justify-content: flex-start;
        }

        .dialogue-card.is-right {
            justify-content: flex-end;
        }

        .dialogue-line {
            display: inline-flex;
            align-items: flex-start;
            gap: 0.625rem;
            max-width: 100%;
        }

        .dialogue-card.is-right .dialogue-line {
            flex-direction: row-reverse;
        }

        .line-dot-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 1.25rem;
            padding-top: 0.9rem;
            flex-shrink: 0;
        }

        .line-dot {
            display: block;
            width: 0.7rem;
            height: 0.7rem;
            border-radius: 9999px;
            flex-shrink: 0;
        }

        .line-dot.dot-left {
            background: linear-gradient(135deg, rgb(99, 102, 241), rgb(59, 130, 246));
            box-shadow: 0 0 0 5px rgba(99, 102, 241, 0.12);
        }

        .line-dot.dot-right {
            background: linear-gradient(135deg, rgb(168, 85, 247), rgb(217, 70, 239));
            box-shadow: 0 0 0 5px rgba(168, 85, 247, 0.12);
        }

        .dialogue-bubble {
            position: relative;
            width: fit-content;
            max-width: 100%;
            transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
            backdrop-filter: blur(8px);
        }

        .dialogue-bubble:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 30px -24px rgba(15, 23, 42, 0.22);
        }

        .dialogue-bubble.bubble-left::after,
        .dialogue-bubble.bubble-right::after {
            content: "";
            position: absolute;
            top: 16px;
            width: 10px;
            height: 10px;
            transform: rotate(45deg);
            border-radius: 2px;
        }

        .dialogue-bubble.bubble-left::after {
            left: -5px;
            background: rgba(255, 255, 255, 0.88);
            border-left: 1px solid rgba(165, 180, 252, 0.42);
            border-top: 1px solid rgba(165, 180, 252, 0.42);
        }

        .dialogue-bubble.bubble-right::after {
            right: -5px;
            background: rgba(255, 255, 255, 0.88);
            border-right: 1px solid rgba(196, 181, 253, 0.42);
            border-top: 1px solid rgba(196, 181, 253, 0.42);
        }

        .dark .dialogue-bubble.bubble-left::after {
            background: rgba(30, 41, 59, 0.82);
            border-left-color: rgba(129, 140, 248, 0.24);
            border-top-color: rgba(129, 140, 248, 0.24);
        }

        .dark .dialogue-bubble.bubble-right::after {
            background: rgba(30, 41, 59, 0.82);
            border-right-color: rgba(167, 139, 250, 0.24);
            border-top-color: rgba(167, 139, 250, 0.24);
        }

        .dialogue-scroll {
            overflow-x: auto;
            overflow-y: hidden;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .dialogue-scroll::-webkit-scrollbar {
            display: none;
        }

        @media (max-width: 639px) {
            .dialogue-line {
                gap: 0.5rem;
            }

            .line-dot-wrap {
                width: 1rem;
                padding-top: 0.82rem;
            }

            .line-dot {
                width: 0.62rem;
                height: 0.62rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .slide-shell,
            .dialogue-bubble {
                transition: none !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="speaking-page relative h-[100dvh] w-full overflow-hidden bg-[radial-gradient(980px_560px_at_8%_10%,rgba(103,63,231,.14),transparent_55%),radial-gradient(900px_560px_at_92%_14%,rgba(59,130,246,.12),transparent_56%),radial-gradient(880px_640px_at_50%_100%,rgba(16,185,129,.08),transparent_60%)]">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1400px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid place-items-center gap-6 text-center sm:gap-8">
                        <div id="heroBlock" class="flex w-full flex-col justify-start text-center">
                            <div class="mx-auto w-full max-w-none">
                                <h1 class="hero-title mt-3 mx-auto mb-5 max-w-4xl text-4xl font-black leading-[1.02] tracking-tight sm:text-5xl lg:mt-5 lg:text-6xl">
                                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                        {{ $content['title'] }}
                                    </span>
                                </h1>

                                @if(!empty($content['subtitle']))
                                    <p class="hero-subtitle mx-auto mt-3 w-full max-w-none whitespace-nowrap text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:mt-4 lg:text-[1.15rem]">
                                        {{ $content['subtitle'] }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="w-full max-w-6xl text-left">
                            <section class="speaking-panel rounded-[24px] border border-white/70 bg-white/70 p-3 shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-4 lg:p-5">
                                <div class="relative z-10 space-y-2.5 sm:space-y-3">
                                    @foreach($content['dialogues'] as $item)
                                        <div class="dialogue-card {{ $item['side'] === 'right' ? 'is-right' : 'is-left' }}">
                                            <div class="dialogue-line">
                                                <span class="line-dot-wrap">
                                                    <span class="line-dot {{ $item['side'] === 'right' ? 'dot-right' : 'dot-left' }}"></span>
                                                </span>

                                                <div class="dialogue-scroll">
                                                    <div class="dialogue-bubble rounded-[20px] px-3 py-2.5 sm:px-4 sm:py-3 {{ $item['side'] === 'left'
                                                        ? 'bubble-left border border-indigo-100/80 bg-white/80 text-slate-800 dark:border-indigo-400/15 dark:bg-white/[0.04] dark:text-slate-100'
                                                        : 'bubble-right border border-violet-100/80 bg-white/80 text-slate-800 dark:border-violet-400/15 dark:bg-white/[0.04] dark:text-slate-100'
                                                    }}">
                                                        <p class="whitespace-nowrap text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base lg:text-[1.02rem]">
                                                            {{ $item['text'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
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
            const heading = document.querySelector('.hero-title');
            const subtitle = document.querySelector('.hero-subtitle');
            const cards = document.querySelectorAll('.dialogue-card');

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

            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReduced || !window.gsap) return;

            const animatedItems = [heading, subtitle].filter(Boolean);
            gsap.set(animatedItems, { clearProps: 'all' });

            const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

            if (heading) tl.from(heading, { opacity: 0, y: 18, duration: 0.65 });
            if (subtitle) tl.from(subtitle, { opacity: 0, y: 14, duration: 0.5 }, '-=0.35');
            if (cards.length) {
                tl.from(cards, {
                    opacity: 0,
                    y: 14,
                    duration: 0.4,
                    stagger: 0.05
                }, '-=0.15');
            }
        });
    </script>
@endsection