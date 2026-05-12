<?php
$content = [
    'page_title' => 'Listen',
    'title' => 'Listen',
    'subtitle' => 'Repeat the sentences & check (✓) the features you like.',
    'instruction' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 2xl:grid-cols-6',

    'cards' => [
        [
            'sentence' => 'He has a beard and a mustache.',
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide17/Sixteen.webp'),
            'alt' => 'A man with a beard and mustache',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/beard-mustache.mp3'),
        ],
        [
            'sentence' => 'She has pierced ears.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide10/pierced-ears.webp'),
            'alt' => 'A woman with pierced ears',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/pierced-ears.mp3'),
        ],
        [
            'sentence' => 'He has a shaved head. He\'s bald.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/shaved-head.webp'),
            'alt' => 'A man with a shaved head',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/shaved-head.mp3'),
        ],
        [
            'sentence' => 'She wears braces.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide10/braces.webp'),
            'alt' => 'A girl wearing braces',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/wears-braces.mp3'),
        ],
        [
            'sentence' => 'She has long fingernails.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide10/long-fingernails.webp'),
            'alt' => 'Long fingernails',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/long-fingernails.mp3'),
        ],
        [
            'sentence' => 'He wears his hair in a ponytail.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide10/ponytail.webp'),
            'alt' => 'A man with a ponytail',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/ponytail.mp3'),
        ],
        [
            'sentence' => 'She\'s got freckles.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide10/freckles.webp'),
            'alt' => 'A girl with freckles',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/freckles.mp3'),
        ],
        [
            'sentence' => 'She wears her hair in cornrows.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide10/cornrows.webp'),
            'alt' => 'A girl with cornrows',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/hair-in-cornrows.mp3'),
        ],
        [
            'sentence' => 'She wears glasses.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/intelligent.webp'),
            'alt' => 'A woman wearing glasses',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/wears-glasses.mp3'),
        ],
        [
            'sentence' => 'He\'s very muscular.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/Muscular.webp'),
            'alt' => 'A muscular man',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/muscular.mp3'),
        ],
        [
            'sentence' => 'She wears braids.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/braided-hair.webp'),
            'alt' => 'A woman with braids',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/wears-braids.mp3'),
        ],
        [
            'sentence' => 'He\'s got spiked hair.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide10/spiked-hair.webp'),
            'alt' => 'A man with spiked hair',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide10/spiked-hair.mp3'),
        ],
    ],
];

$items = $content['cards'];
$cardGridClass = $content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5';
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-5 sm:py-5 lg:px-7">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1500px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 w-full max-w-[1420px]">
                <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/90 p-3 shadow-2xl shadow-slate-200/70 backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-950/70 dark:shadow-slate-950/40 sm:p-3.5 lg:p-5">
                    <div class="pointer-events-none absolute -left-24 -top-24 h-72 w-72 rounded-full bg-orange-300/20 blur-3xl dark:bg-orange-600/10"></div>
                    <div class="pointer-events-none absolute -right-24 -bottom-24 h-72 w-72 rounded-full bg-amber-300/20 blur-3xl dark:bg-amber-500/10"></div>

                    <div class="relative mb-3 flex flex-wrap items-center justify-between gap-2 rounded-2xl border border-slate-200/80 bg-slate-50/80 px-3 py-2.5 dark:border-slate-700/70 dark:bg-slate-900/70 sm:px-4">
                        <p class="text-xs font-black uppercase tracking-[0.14em] text-slate-600 dark:text-slate-300 sm:text-sm">
                            Selected:
                            <span id="selectedCount" class="text-orange-600 dark:text-orange-300">0</span>
                            /
                            <span>{{ count($content['cards']) }}</span>
                        </p>

                        <button
                                id="clearChecksBtn"
                                type="button"
                                class="inline-flex items-center justify-center rounded-xl bg-orange-500 px-3 py-2 text-xs font-black text-white shadow-sm shadow-orange-200 transition duration-200 hover:-translate-y-0.5 hover:bg-orange-600 active:scale-95 dark:shadow-none sm:px-4 sm:text-sm"
                        >
                            Clear checks
                        </button>
                    </div>

                    <div class="relative grid {{ $cardGridClass }} gap-3 sm:gap-4">
                        @foreach($items as $index => $item)
                            <article
                                    class="vocab-card group relative overflow-hidden rounded-3xl border border-slate-200/90 bg-white/95 shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-1 hover:border-orange-200 hover:shadow-xl hover:shadow-orange-100/60 dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/30 dark:hover:border-orange-400/50"
                                    data-index="{{ $index }}"
                            >
                                <div class="relative aspect-[5/4] w-full overflow-hidden bg-slate-100 dark:bg-slate-800">
                                    <img
                                            src="{{ $item['image'] }}"
                                            alt="{{ $item['alt'] ?? $item['sentence'] }}"
                                            loading="lazy"
                                            decoding="async"
                                            class="pointer-events-none h-full w-full object-contain p-1 transition duration-300 group-hover:scale-[1.02]"
                                    >

                                    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-slate-950/45 to-transparent"></div>

                                    <div class="absolute left-2.5 top-2.5 z-10 inline-flex h-8 min-w-8 items-center justify-center rounded-full border border-white/70 bg-white/90 px-2 text-xs font-black text-slate-700 shadow-sm backdrop-blur dark:border-slate-600/60 dark:bg-slate-900/85 dark:text-slate-100">
                                        {{ $index + 1 }}
                                    </div>

                                    <span class="selected-badge pointer-events-none absolute left-2.5 top-2.5 z-20 hidden rounded-full border border-white/60 bg-orange-500 px-2.5 py-1 text-[0.68rem] font-black text-white shadow-sm">
                                        Selected
                                    </span>

                                    <button
                                            type="button"
                                            class="js-speak-btn absolute right-2.5 top-2.5 z-20 inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/60 bg-slate-950/35 text-white shadow-lg shadow-slate-900/20 backdrop-blur transition duration-200 hover:scale-105 hover:bg-slate-950/50 focus:outline-none focus:ring-4 focus:ring-orange-300/40"
                                            aria-label="Play sentence {{ $index + 1 }}"
                                            data-text="{{ $item['sentence'] }}"
                                            data-audio="{{ $item['sound'] ?? '' }}"
                                    >
                                        <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                        </svg>

                                        <span class="wave-icon hidden items-center gap-[2px]">
                                            <span class="h-2 w-[3px] rounded-full bg-current animate-pulse"></span>
                                            <span class="h-4 w-[3px] rounded-full bg-current animate-pulse"></span>
                                            <span class="h-3 w-[3px] rounded-full bg-current animate-pulse"></span>
                                        </span>
                                    </button>
                                </div>

                                <div class="border-t border-slate-200/90 p-3 dark:border-slate-700/80 sm:p-3.5">
                                    <label class="flex cursor-pointer items-start gap-3" for="feature_{{ $index }}">
                                        <input
                                                id="feature_{{ $index }}"
                                                type="checkbox"
                                                class="js-feature-check peer sr-only"
                                                aria-label="Select feature {{ $index + 1 }}"
                                        >

                                        <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-lg border-2 border-slate-300 bg-white text-transparent transition peer-checked:border-orange-500 peer-checked:bg-orange-500 peer-checked:text-white dark:border-slate-600 dark:bg-slate-950">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                <path d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </span>

                                        <span class="text-sm font-black leading-snug tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-sm">
                                            {{ $item['sentence'] }}
                                        </span>
                                    </label>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        function onReady(fn) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', fn, { once: true });
                return;
            }

            fn();
        }

        onReady(() => {
            const checks = Array.from(document.querySelectorAll('.js-feature-check'));
            const cards = Array.from(document.querySelectorAll('.vocab-card'));
            const speakButtons = Array.from(document.querySelectorAll('.js-speak-btn'));
            const selectedCountEl = document.getElementById('selectedCount');
            const clearBtn = document.getElementById('clearChecksBtn');

            const synth = window.speechSynthesis || null;
            const realAudio = new Audio();
            const AudioContextClass = window.AudioContext || window.webkitAudioContext;

            let activeSpeakBtn = null;
            let fxCtx = null;

            const selectedCardClasses = [
                'border-orange-400',
                'ring-4',
                'ring-orange-400/20',
                'shadow-orange-100/80',
                'dark:border-orange-400/70',
                'dark:ring-orange-400/15'
            ];

            const playSelectSound = () => {
                try {
                    if (!AudioContextClass) return;
                    if (!fxCtx) fxCtx = new AudioContextClass();
                    if (fxCtx.state === 'suspended') fxCtx.resume();

                    const now = fxCtx.currentTime;
                    const osc = fxCtx.createOscillator();
                    const gain = fxCtx.createGain();

                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(640, now);
                    osc.frequency.linearRampToValueAtTime(840, now + 0.1);

                    gain.gain.setValueAtTime(0, now);
                    gain.gain.linearRampToValueAtTime(0.16, now + 0.02);
                    gain.gain.exponentialRampToValueAtTime(0.001, now + 0.2);

                    osc.connect(gain);
                    gain.connect(fxCtx.destination);
                    osc.start(now);
                    osc.stop(now + 0.21);
                } catch (error) {}
            };

            const setButtonSpeaking = (btn, speaking) => {
                if (!btn) return;

                const staticIcon = btn.querySelector('.static-icon');
                const waveIcon = btn.querySelector('.wave-icon');

                btn.classList.toggle('bg-orange-500/90', speaking);
                btn.classList.toggle('bg-slate-950/35', !speaking);
                btn.classList.toggle('ring-4', speaking);
                btn.classList.toggle('ring-orange-300/35', speaking);

                staticIcon?.classList.toggle('hidden', speaking);
                waveIcon?.classList.toggle('hidden', !speaking);
                waveIcon?.classList.toggle('inline-flex', speaking);
            };

            const stopSpeaking = () => {
                if (synth) synth.cancel();

                realAudio.pause();
                realAudio.currentTime = 0;
                realAudio.removeAttribute('src');
                realAudio.load();

                setButtonSpeaking(activeSpeakBtn, false);
                activeSpeakBtn = null;
            };

            const speakText = (btn) => {
                const audioSrc = (btn.getAttribute('data-audio') || '').trim();
                const text = (btn.getAttribute('data-text') || '').trim();

                if (activeSpeakBtn === btn) {
                    stopSpeaking();
                    return;
                }

                stopSpeaking();

                activeSpeakBtn = btn;
                setButtonSpeaking(activeSpeakBtn, true);

                if (audioSrc) {
                    realAudio.src = audioSrc;
                    realAudio.currentTime = 0;
                    realAudio.onended = stopSpeaking;
                    realAudio.onerror = stopSpeaking;
                    realAudio.play().catch(stopSpeaking);
                    return;
                }

                if (!text || !synth || typeof SpeechSynthesisUtterance === 'undefined') {
                    stopSpeaking();
                    return;
                }

                const utterance = new SpeechSynthesisUtterance(text);
                utterance.rate = 0.92;
                utterance.pitch = 1;
                utterance.lang = 'en-US';
                utterance.onend = stopSpeaking;
                utterance.onerror = stopSpeaking;

                synth.speak(utterance);
            };

            const syncCardState = (checkbox) => {
                const card = checkbox.closest('.vocab-card');
                const badge = card?.querySelector('.selected-badge');

                if (!card) return;

                selectedCardClasses.forEach((className) => {
                    card.classList.toggle(className, checkbox.checked);
                });

                badge?.classList.toggle('hidden', !checkbox.checked);
            };

            const syncCount = () => {
                const selected = checks.filter((checkbox) => checkbox.checked).length;
                if (selectedCountEl) selectedCountEl.textContent = String(selected);
            };

            checks.forEach((checkbox) => {
                checkbox.addEventListener('change', () => {
                    syncCardState(checkbox);
                    syncCount();

                    if (checkbox.checked) playSelectSound();
                });
            });

            clearBtn?.addEventListener('click', () => {
                checks.forEach((checkbox) => {
                    checkbox.checked = false;
                    syncCardState(checkbox);
                });

                syncCount();
            });

            cards.forEach((card) => {
                card.addEventListener('click', (event) => {
                    if (event.target.closest('.js-speak-btn')) return;
                    if (event.target.closest('label') || event.target.closest('input')) return;

                    const checkbox = card.querySelector('.js-feature-check');
                    if (!checkbox) return;

                    checkbox.checked = !checkbox.checked;
                    syncCardState(checkbox);
                    syncCount();

                    if (checkbox.checked) playSelectSound();
                });
            });

            speakButtons.forEach((btn) => {
                btn.addEventListener('click', (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    speakText(btn);
                });
            });

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) stopSpeaking();
            });

            window.addEventListener('pagehide', stopSpeaking);
            window.addEventListener('beforeunload', stopSpeaking);

            window.stopSlideAudio = stopSpeaking;
            window.destroySlide = stopSpeaking;
            window.resetSlide = function () {
                stopSpeaking();

                checks.forEach((checkbox) => {
                    checkbox.checked = false;
                    syncCardState(checkbox);
                });

                syncCount();
            };

            checks.forEach(syncCardState);
            syncCount();
        });
    </script>
@endsection
