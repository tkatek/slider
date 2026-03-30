@extends('slider.simple-layout')

@php
    $uid = $content['uid'] ?? ('holiday_' . substr(md5(uniqid('', true)), 0, 10));
    $content['theme'] = $content['theme'] ?? '#6366f1';
    $cols = $content['grid']['cols'];
    $gridCols = "grid-cols-{$cols['base']} sm:grid-cols-{$cols['sm']} md:grid-cols-{$cols['md']} lg:grid-cols-{$cols['lg']}";
    $headerWrapClass = $content['header_wrap_class'] ?? 'space-y-3 w-full max-w-3xl';
    $titleClass = $content['title_class'] ?? 'font-black tracking-tight text-2xl sm:text-3xl lg:text-5xl leading-tight';
    $titleGradientClass = $content['title_gradient_class'] ?? 'bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 bg-clip-text text-transparent';
    $subtitleClass = $content['subtitle_class'] ?? 'font-bold text-sm sm:text-base text-slate-600 dark:text-slate-400';
    $resultModalVariant = $content['result_modal_variant'] ?? 'default';

    $isGameModal = $resultModalVariant === 'game';
    $resultOverlayClass = $isGameModal
        ? 'absolute inset-0 bg-slate-950/40 dark:bg-black/70 backdrop-blur-sm'
        : 'absolute inset-0 bg-slate-950/70 backdrop-blur-md';
    $resultCardClass = $isGameModal
        ? 'modal-pop relative w-full max-w-3xl max-h-[88dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95'
        : 'modal-pop relative w-full max-w-xl overflow-hidden rounded-[3rem] border border-white/10 bg-white dark:bg-slate-900 shadow-2xl';
    $resultInnerClass = $isGameModal
        ? 'relative p-6 sm:p-8 lg:p-10 text-center'
        : 'relative p-8 sm:p-10 text-center';
    $resultTitleClass = $isGameModal
        ? 'mt-5 text-3xl sm:text-4xl lg:text-[2.6rem] leading-none font-black text-slate-900 dark:text-white'
        : 'mt-2 text-2xl sm:text-3xl font-black tracking-tight text-slate-900 dark:text-slate-50';
    $resultTextClass = $isGameModal
        ? 'mt-3 mx-auto max-w-xl text-sm sm:text-base font-semibold leading-[1.7] text-slate-500 dark:text-slate-400'
        : 'mt-4 text-sm sm:text-base font-semibold text-slate-600 dark:text-slate-300';
    $restartBtnClass = $isGameModal
        ? 'inline-flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-white px-8 py-4 font-black text-slate-900 shadow-lg transition-colors hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700'
        : 'inline-flex w-full items-center justify-center rounded-2xl border border-slate-200/80 bg-white/85 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-slate-800 shadow-sm transition-transform hover:-translate-y-0.5 hover:bg-white active:translate-y-0 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-100 dark:hover:bg-slate-900/70';
    $continueBtnClass = $isGameModal
        ? 'inline-flex w-full items-center justify-center rounded-2xl px-8 py-4 font-black text-white shadow-[0_16px_40px_rgba(79,70,229,0.22)] transition-colors hover:brightness-110 dark:text-slate-900'
        : 'inline-flex w-full items-center justify-center rounded-2xl px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-white shadow-[0_16px_40px_rgba(79,70,229,0.22)] transition-transform hover:-translate-y-0.5 active:translate-y-0';
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        #{{ $uid }} { --p: {{ $content['theme'] }}; }

        @keyframes pop {
            0% { transform: translateY(10px) scale(.98); opacity: 0; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        @keyframes cardIn {
            0% { transform: translateY(16px) scale(.96); opacity: 0; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        @keyframes glowPop {
            0% { transform: scale(.7); opacity: 0; }
            70% { transform: scale(1.12); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes floatOrb {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        #{{ $uid }} .modal-pop { animation: pop .3s cubic-bezier(.34,1.56,.64,1); }
        #{{ $uid }} .card-in { animation: cardIn .45s cubic-bezier(.2,.8,.2,1) both; }
        #{{ $uid }} .status-icon { animation: glowPop .28s cubic-bezier(.34,1.56,.64,1); }
        #{{ $uid }} .finish-orb { animation: floatOrb 2.6s ease-in-out infinite; }

        #{{ $uid }} .glass-panel {
             background: rgba(255, 255, 255, 0.6);
             backdrop-filter: blur(10px);
             border: 1px solid rgba(0, 0, 0, 0.05);
         }

        .dark #{{ $uid }} .glass-panel {
                   background: rgba(30, 41, 59, 0.5);
                   border: 1px solid rgba(255, 255, 255, 0.1);
               }

        #{{ $uid }} .option-card {
             background: #ffffff;
             border: 2px solid #f1f5f9;
             box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
             transition: all .28s ease;
         }

        .dark #{{ $uid }} .option-card {
                   background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
                   border: 2px solid rgba(255,255,255,0.06);
                   box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
               }

        #{{ $uid }} .option-card:hover {
             transform: translateY(-4px);
             border-color: color-mix(in srgb, var(--p) 35%, transparent);
         }

        #{{ $uid }} .option-check:checked + .option-label .option-card {
             border-color: color-mix(in srgb, var(--p) 68%, white 32%);
             box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.14), 0 18px 30px rgba(99, 102, 241, 0.12);
             transform: translateY(-4px);
         }

        #{{ $uid }} .option-check:checked + .option-label .check-badge {
             background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
             border-color: transparent;
             color: white;
             transform: scale(1.06);
         }

        #{{ $uid }} .option-check:checked + .option-label .image-overlay {
             opacity: .82;
         }

        #{{ $uid }} .option-check:checked + .option-label .label-chip {
             background: rgba(255,255,255,.96);
             color: #312e81;
         }

        .dark #{{ $uid }} .option-check:checked + .option-label .label-chip {
                   background: rgba(15, 23, 42, .92);
                   color: #c7d2fe;
               }

        #{{ $uid }} .check-badge {
             transition: all .25s ease;
         }

        #{{ $uid }} .image-overlay {
             background: linear-gradient(to top, rgba(2, 6, 23, .78), rgba(2, 6, 23, .12), transparent);
             transition: opacity .25s ease;
         }

        #{{ $uid }} .selection-pill {
             background: rgba(99, 102, 241, 0.10);
             color: #4f46e5;
         }

        .dark #{{ $uid }} .selection-pill {
                   background: rgba(99, 102, 241, 0.14);
                   color: #a5b4fc;
               }

        #{{ $uid }} .result-chip {
             background: rgba(99, 102, 241, 0.10);
             color: #4f46e5;
         }

        .dark #{{ $uid }} .result-chip {
                   background: rgba(99, 102, 241, 0.14);
                   color: #c7d2fe;
               }
    </style>
@endsection

@section('content')
    <main id="{{ $uid }}" class="w-full min-h-screen transition-colors duration-500">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 py-6 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-6">

                    <div class="{{ $headerWrapClass }}">
                        <h1 class="{{ $titleClass }}">
                            <span class="{{ $titleGradientClass }}">
                                {{ $content['title'] }}
                            </span>
                        </h1>

                        @if(!empty($content['subtitle']))
                            <p class="{{ $subtitleClass }}">
                                {{ $content['subtitle'] }}
                            </p>
                        @endif

                        <div class="flex justify-center">
                            <span id="selectionCount" class="selection-pill rounded-full px-4 py-2 text-xs sm:text-sm font-black uppercase tracking-[0.14em]">
                                0 selected
                            </span>
                        </div>
                    </div>

                    <section class="w-full max-w-6xl">
                        <form id="holidayForm">
                            <div class="grid {{ $gridCols }} {{ $content['grid']['gap'] }}">
                                @foreach($content['items'] as $idx => $item)
                                    <div class="card-in" style="animation-delay: {{ $idx * 0.04 }}s;">
                                        <input
                                                id="{{ $uid }}_option_{{ $idx }}"
                                                type="checkbox"
                                                class="option-check sr-only"
                                                value="{{ $item['label'] }}"
                                        >

                                        <label for="{{ $uid }}_option_{{ $idx }}" class="option-label block cursor-pointer">
                                            <div class="option-card {{ $content['grid']['card_height'] }} group relative overflow-hidden rounded-[2.2rem]">
                                                <img
                                                        src="{{ $item['image'] }}"
                                                        alt="{{ $item['label'] }}"
                                                        class="h-full w-full object-cover"
                                                >

                                                <div class="image-overlay absolute inset-0"></div>

                                                <div class="check-badge absolute right-3 top-3 z-10 flex h-10 w-10 items-center justify-center rounded-full border-2 border-white/80 bg-white/90 text-slate-400 shadow-lg backdrop-blur-sm">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                </div>

                                                <div class="absolute inset-x-0 bottom-0 z-10 p-3 sm:p-4">
                                                    <div class="label-chip inline-flex items-center rounded-full bg-white/90 px-3 py-1.5 text-xs sm:text-sm font-black text-slate-900 shadow-lg backdrop-blur-sm transition-all">
                                                        {{ $item['label'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-5">
                                <button
                                        type="button"
                                        id="confirmBtn"
                                        class="w-full py-4 rounded-[1.4rem] font-black text-white text-base sm:text-lg tracking-wide transition-all active:scale-95 shadow-xl hover:brightness-110"
                                        style="background-color: var(--p)"
                                >
                                    CONFIRM
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </section>
        </div>

        <div id="resultModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
            <div class="{{ $resultOverlayClass }}" id="resultBg"></div>

            <div class="{{ $resultCardClass }}">
                @unless($isGameModal)
                    <div class="absolute inset-0 pointer-events-none opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.16)_0%,transparent_55%)]"></div>
                @endunless

                <div class="{{ $resultInnerClass }}">
                    @if($isGameModal)
                        <div class="text-5xl sm:text-6xl">🎉</div>
                    @else
                        <div class="mx-auto relative mb-6 h-20 w-20">
                            <div class="finish-orb absolute inset-0 rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-blue-500 opacity-20 blur-2xl"></div>
                            <div class="absolute inset-0 grid place-items-center rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-blue-500 text-white shadow-xl">
                                <svg id="resultMainIcon" viewBox="0 0 24 24" class="h-10 w-10" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.6" d="M3 7h18M5 7l1.5 10.5A2 2 0 0 0 8.48 19h7.04a2 2 0 0 0 1.98-1.5L19 7M9 11h6"/>
                                </svg>
                            </div>
                        </div>
                    @endif

                    @unless($isGameModal)
                        <p id="resultEyebrow" class="text-[11px] font-black uppercase tracking-[0.25em] text-indigo-500">
                            Your choices
                        </p>
                    @endunless

                    <h2 id="resultTitle" class="{{ $resultTitleClass }}">
                        Holiday preferences
                    </h2>

                    <div id="resultText" class="{{ $resultTextClass }}">
                        No places selected yet.
                    </div>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button id="restartBtn"
                                type="button"
                                class="{{ $restartBtnClass }}">
                            Restart
                        </button>

                        <button id="continueBtn"
                                type="button"
                                class="{{ $continueBtnClass }}"
                                style="background-color: var(--p)">
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.getElementById(@json($uid));
            const SOUNDS = @json($content['sounds'] ?? []);

            const sfx = new Audio();

            const elements = {
                checkboxes: Array.from(root.querySelectorAll('.option-check')),
                selectionCount: root.querySelector('#selectionCount'),
                confirmBtn: root.querySelector('#confirmBtn'),

                resultModal: root.querySelector('#resultModal'),
                resultBg: root.querySelector('#resultBg'),
                resultText: root.querySelector('#resultText'),
                resultTitle: root.querySelector('#resultTitle'),
                resultEyebrow: root.querySelector('#resultEyebrow'),
                resultMainIcon: root.querySelector('#resultMainIcon'),
                restartBtn: root.querySelector('#restartBtn'),
                continueBtn: root.querySelector('#continueBtn'),
            };

            function stopAllAudio() {
                try {
                    sfx.pause();
                    sfx.currentTime = 0;
                } catch (e) {}
            }

            window.stopSlideAudio = stopAllAudio;

            function playSound(key) {
                if (!SOUNDS?.[key]) return;
                try {
                    sfx.pause();
                    sfx.currentTime = 0;
                    sfx.src = SOUNDS[key];
                    sfx.play().catch(() => {});
                } catch (e) {}
            }

            function getSelectedValues() {
                return elements.checkboxes
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);
            }

            function updateCount() {
                const count = getSelectedValues().length;
                elements.selectionCount.textContent = `${count} selected`;
            }

            function openResultModal() {
                elements.resultModal.classList.remove('hidden');
                elements.resultModal.classList.add('flex');
            }

            function closeResultModal() {
                elements.resultModal.classList.add('hidden');
                elements.resultModal.classList.remove('flex');
            }

            function resetSelections() {
                elements.checkboxes.forEach(cb => cb.checked = false);
                updateCount();
                closeResultModal();
                stopAllAudio();
            }

            function isEmbedded() {
                try { return window.top !== window.self; }
                catch (e) { return true; }
            }

            function goToNextSlide() {
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


            }

            function escapeHtml(value) {
                const div = document.createElement('div');
                div.textContent = value;
                return div.innerHTML;
            }

            function showResult() {
                const selected = getSelectedValues();

                if (selected.length === 0) {
                    if (elements.resultEyebrow) {
                        elements.resultEyebrow.textContent = 'Nothing selected';
                    }
                    elements.resultTitle.textContent = 'Choose at least one place';
                    elements.resultText.innerHTML = `
                        <p class="font-semibold text-rose-500">Please select at least one place before continuing.</p>
                    `;
                    if (elements.resultMainIcon) {
                        elements.resultMainIcon.innerHTML = `
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.8" d="M12 9v4m0 4h.01M10.29 3.86l-7.5 13A2 2 0 0 0 4.5 20h15a2 2 0 0 0 1.71-3.14l-7.5-13a2 2 0 0 0-3.42 0z"/>
                        `;
                    }
                    playSound('skip');
                } else {
                    if (elements.resultEyebrow) {
                        elements.resultEyebrow.textContent = 'Your choices';
                    }
                    elements.resultTitle.textContent = 'Holiday preferences';
                    elements.resultText.innerHTML = `
                        <p class="mb-4 font-semibold text-slate-800 dark:text-slate-100">You like:</p>
                        <div class="flex flex-wrap justify-center gap-2">
                            ${selected.map(item => `
                                <span class="result-chip rounded-full px-3 py-1 text-xs sm:text-sm font-black">
                                    ${escapeHtml(item)}
                                </span>
                            `).join('')}
                        </div>
                    `;
                    if (elements.resultMainIcon) {
                        elements.resultMainIcon.innerHTML = `
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.6" d="M3 7h18M5 7l1.5 10.5A2 2 0 0 0 8.48 19h7.04a2 2 0 0 0 1.98-1.5L19 7M9 11h6"/>
                        `;
                    }
                    playSound('done');
                }

                openResultModal();
            }

            window.resetSlide = resetSelections;

            elements.checkboxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    updateCount();
                    playSound('click');
                });
            });

            elements.confirmBtn.addEventListener('click', showResult);
            elements.restartBtn.addEventListener('click', resetSelections);
            elements.continueBtn.addEventListener('click', goToNextSlide);
            elements.resultBg.addEventListener('click', closeResultModal);

            updateCount();
        });
    </script>
@endsection
