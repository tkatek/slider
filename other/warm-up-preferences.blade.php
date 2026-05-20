@extends('slider.simple-layout')

@php
    $uid = 'holiday_preferences_' . substr(md5($content['page_title'] ?? 'holiday-preferences'), 0, 8);
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));

    $gridClass = 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3';
    $cardClass = 'h-32 sm:h-36 md:h-40 lg:h-44 xl:h-48';

    $soundUrls = [
        'click' => (string) materialAsset('slider/sounds/tap.wav'),
        'done'  => (string) materialAsset('slider/sounds/correct.wav'),
        'skip'  => (string) materialAsset('slider/sounds/click.wav'),
    ];
@endphp

@section('title', $content['page_title'])

@section('content')
    <main id="{{ $uid }}" class="min-h-[100dvh] w-full overflow-y-auto">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-6xl items-center px-4 py-4 sm:px-6 sm:py-5 lg:px-8">
            <section class="w-full">
                <div class="grid w-full place-items-center gap-4 text-center sm:gap-5 lg:gap-6">
                    <div class="w-full">
                        @include('slider.components.title-subtitle')
                    </div>

                    <form id="holidayForm" class="w-full max-w-sm sm:max-w-3xl lg:max-w-5xl">
                        <div class="grid {{ $gridClass }} gap-2.5 sm:gap-3.5 lg:gap-4">
                            @foreach($content['items'] as $index => $item)
                                <label
                                        for="{{ $uid }}_option_{{ $index }}"
                                        class="group relative block cursor-pointer overflow-hidden rounded-[1.35rem] outline-none sm:rounded-[1.65rem] lg:rounded-[1.9rem]"
                                >
                                    <input
                                            id="{{ $uid }}_option_{{ $index }}"
                                            type="checkbox"
                                            value="{{ $item['label'] }}"
                                            class="holiday-option peer sr-only"
                                    >

                                    <div
                                            class="{{ $cardClass }} relative overflow-hidden rounded-[1.35rem] border-2 border-white/80 bg-white shadow-[0_18px_44px_-30px_rgba(15,23,42,0.65)] ring-1 ring-slate-200/70 transition-all duration-200 ease-out peer-focus-visible:ring-4 peer-focus-visible:ring-indigo-300/35 peer-checked:-translate-y-0.5 peer-checked:border-indigo-400 peer-checked:ring-4 peer-checked:ring-indigo-400/25 dark:border-white/10 dark:bg-slate-900 dark:ring-white/10 dark:peer-checked:border-indigo-300/70 dark:peer-checked:ring-indigo-300/20 sm:rounded-[1.65rem] lg:rounded-[1.9rem]"
                                    >
                                        <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['label'] }}"
                                                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                                loading="lazy"
                                                decoding="async"
                                        >
                                    </div>

                                    <div class="pointer-events-none absolute inset-0 rounded-[1.35rem] bg-gradient-to-t from-slate-950/80 via-slate-950/15 to-transparent opacity-75 transition-opacity duration-200 peer-checked:opacity-95 sm:rounded-[1.65rem] lg:rounded-[1.9rem]"></div>

                                    <span
                                            class="pointer-events-none absolute right-2 top-2 grid h-8 w-8 place-items-center rounded-full border border-white/80 bg-white/90 text-slate-400 shadow-lg backdrop-blur-md transition-all duration-200 peer-checked:scale-105 peer-checked:border-white/20 peer-checked:bg-[image:var(--top-bar-gradient)] peer-checked:text-white dark:border-white/15 dark:bg-slate-950/80 dark:text-slate-500 sm:right-3 sm:top-3 sm:h-9 sm:w-9"
                                            aria-hidden="true"
                                    >
                                        <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>

                                    <span class="pointer-events-none absolute inset-x-0 bottom-0 flex justify-center p-2 sm:p-3">
                                        <span class="max-w-[92%] rounded-full bg-white/95 px-3 py-1.5 text-xs font-black leading-tight text-slate-900 shadow-lg backdrop-blur-md transition-all duration-200 peer-checked:bg-white peer-checked:text-indigo-700 dark:bg-slate-950/85 dark:text-slate-100 dark:peer-checked:bg-slate-950 sm:px-4 sm:text-sm">
                                            {{ $item['label'] }}
                                        </span>
                                    </span>
                                </label>
                            @endforeach
                        </div>

                        <div class="mt-4 flex flex-col items-stretch gap-2.5 sm:mt-5 sm:flex-row sm:items-center sm:justify-between sm:gap-3">
                            <p id="selectionCount" class="order-2 text-center text-xs font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400 sm:order-1 sm:text-left">
                                0 selected
                            </p>

                            <button
                                    type="button"
                                    id="confirmBtn"
                                    class="order-1 inline-flex w-full items-center justify-center rounded-2xl {{ $buttonGradient }} px-7 py-3.5 text-sm font-black uppercase tracking-[0.16em] text-white shadow-[0_20px_46px_-24px_rgba(79,70,229,0.75)] transition-all duration-200 hover:-translate-y-0.5 hover:brightness-110 active:translate-y-0 sm:order-2 sm:w-auto sm:min-w-44 sm:px-9 sm:py-4 sm:text-base"
                            >
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <div id="resultModal" class="fixed inset-0 z-50 hidden items-center justify-center p-3 sm:p-4">
            <button
                    type="button"
                    id="resultBg"
                    class="absolute inset-0 bg-slate-950/55 backdrop-blur-sm dark:bg-black/75"
                    aria-label="Close result"
            ></button>

            <section class="relative w-full max-w-[22rem] max-h-[88dvh] overflow-y-auto rounded-[1.75rem] border border-white/70 bg-white/95 p-5 text-center shadow-2xl ring-1 ring-slate-200/80 backdrop-blur-xl dark:border-white/10 dark:bg-slate-900/95 dark:ring-white/10 sm:max-w-xl sm:rounded-[2rem] sm:p-7 lg:max-w-2xl lg:p-8">
                <div id="resultEmoji" class="text-4xl sm:text-5xl" aria-hidden="true">🎉</div>

                <p id="resultEyebrow" class="mt-4 text-[0.68rem] font-black uppercase tracking-[0.24em] text-indigo-500 dark:text-indigo-300">
                    Your choices
                </p>

                <h2 id="resultTitle" class="mt-2 text-2xl font-black leading-tight tracking-[-0.03em] text-slate-900 dark:text-white sm:text-3xl lg:text-4xl">
                    Holiday preferences
                </h2>

                <div id="resultText" class="mx-auto mt-3 max-w-xl text-sm font-bold leading-[1.65] text-slate-600 dark:text-slate-300 sm:text-base">
                    No places selected yet.
                </div>

                <div class="mt-6 grid grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-3">
                    <button
                            id="restartBtn"
                            type="button"
                            class="inline-flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-black uppercase tracking-[0.13em] text-slate-900 shadow-sm transition-colors hover:bg-slate-50 dark:border-white/10 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700 sm:py-4"
                    >
                        Restart
                    </button>

                    <button
                            id="continueBtn"
                            type="button"
                            class="inline-flex w-full items-center justify-center rounded-2xl {{ $buttonGradient }} px-6 py-3.5 text-sm font-black uppercase tracking-[0.13em] text-white shadow-[0_20px_46px_-24px_rgba(79,70,229,0.75)] transition-all hover:brightness-110 sm:py-4"
                    >
                        Continue
                    </button>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.getElementById(@json($uid));
            if (!root) return;

            const SOUND_URLS = @json($soundUrls);
            let activeSounds = [];

            const soundPlayers = Object.entries(SOUND_URLS).reduce((players, [key, src]) => {
                if (!src) return players;

                const audio = new Audio(src);
                audio.preload = 'auto';
                players[key] = audio;

                return players;
            }, {});

            const elements = {
                checkboxes: Array.from(root.querySelectorAll('.holiday-option')),
                selectionCount: root.querySelector('#selectionCount'),
                confirmBtn: root.querySelector('#confirmBtn'),
                resultModal: root.querySelector('#resultModal'),
                resultBg: root.querySelector('#resultBg'),
                resultEmoji: root.querySelector('#resultEmoji'),
                resultText: root.querySelector('#resultText'),
                resultTitle: root.querySelector('#resultTitle'),
                resultEyebrow: root.querySelector('#resultEyebrow'),
                restartBtn: root.querySelector('#restartBtn'),
                continueBtn: root.querySelector('#continueBtn'),
            };

            function stopAllAudio() {
                activeSounds.forEach((sound) => {
                    try {
                        sound.pause();
                        sound.currentTime = 0;
                    } catch (e) {}
                });

                activeSounds = [];
            }

            function playSound(key) {
                const baseSound = soundPlayers[key];
                if (!baseSound) return;

                try {
                    const sound = baseSound.cloneNode(true);
                    sound.currentTime = 0;

                    activeSounds.push(sound);

                    const removeSound = () => {
                        activeSounds = activeSounds.filter((item) => item !== sound);
                    };

                    sound.addEventListener('ended', removeSound, { once: true });
                    sound.addEventListener('error', removeSound, { once: true });

                    const playPromise = sound.play();
                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(removeSound);
                    }
                } catch (e) {}
            }

            function getSelectedValues() {
                return elements.checkboxes
                    .filter((checkbox) => checkbox.checked)
                    .map((checkbox) => checkbox.value);
            }

            function escapeHtml(value) {
                const div = document.createElement('div');
                div.textContent = value;
                return div.innerHTML;
            }

            function updateCount() {
                const count = getSelectedValues().length;

                if (elements.selectionCount) {
                    elements.selectionCount.textContent = `${count} selected`;
                }
            }

            function openResultModal() {
                elements.resultModal?.classList.remove('hidden');
                elements.resultModal?.classList.add('flex');
            }

            function closeResultModal() {
                elements.resultModal?.classList.add('hidden');
                elements.resultModal?.classList.remove('flex');
            }

            function resetSelections() {
                elements.checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                });

                updateCount();
                closeResultModal();
                stopAllAudio();
            }

            function isEmbedded() {
                try {
                    return window.top !== window.self;
                } catch (e) {
                    return true;
                }
            }

            function goToNextSlide() {
                stopAllAudio();

                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.nextSlide === 'function') {
                            window.parent.nextSlide();
                            return;
                        }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                        return;
                    } catch (e) {}
                }

                const nextLink = document.querySelector('[data-next-slide-url]');
                const nextUrl = nextLink?.getAttribute('data-next-slide-url');

                if (nextUrl) {
                    window.location.href = nextUrl;
                }
            }

            function showResult() {
                const selected = getSelectedValues();

                if (selected.length === 0) {
                    if (elements.resultEmoji) elements.resultEmoji.textContent = '⚠️';
                    if (elements.resultEyebrow) elements.resultEyebrow.textContent = 'Nothing selected';
                    if (elements.resultTitle) elements.resultTitle.textContent = 'Choose at least one place';

                    if (elements.resultText) {
                        elements.resultText.innerHTML = `
                            <p class="font-bold text-rose-500 dark:text-rose-300">
                                Please select at least one place before continuing.
                            </p>
                        `;
                    }

                    playSound('skip');
                    openResultModal();
                    return;
                }

                if (elements.resultEmoji) elements.resultEmoji.textContent = '🎉';
                if (elements.resultEyebrow) elements.resultEyebrow.textContent = 'Your choices';
                if (elements.resultTitle) elements.resultTitle.textContent = 'Holiday preferences';

                if (elements.resultText) {
                    elements.resultText.innerHTML = `
                        <p class="mb-3 font-bold text-slate-800 dark:text-slate-100">You like:</p>
                        <div class="flex flex-wrap justify-center gap-2">
                            ${selected.map((item) => `
                                <span class="rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-black text-indigo-700 ring-1 ring-indigo-100 dark:bg-indigo-400/10 dark:text-indigo-200 dark:ring-indigo-300/10 sm:text-sm">
                                    ${escapeHtml(item)}
                                </span>
                            `).join('')}
                        </div>
                    `;
                }

                playSound('done');
                openResultModal();
            }

            elements.checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', () => {
                    updateCount();
                    playSound('click');
                });
            });

            elements.confirmBtn?.addEventListener('click', showResult);
            elements.restartBtn?.addEventListener('click', resetSelections);
            elements.continueBtn?.addEventListener('click', goToNextSlide);
            elements.resultBg?.addEventListener('click', closeResultModal);

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) stopAllAudio();
            });

            window.addEventListener('beforeunload', stopAllAudio);
            window.addEventListener('pagehide', stopAllAudio);

            window.stopSlideAudio = stopAllAudio;
            window.resetSlide = resetSelections;

            updateCount();
        });
    </script>
@endsection
