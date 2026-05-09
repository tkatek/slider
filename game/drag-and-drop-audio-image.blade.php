@extends('slider.simple-layout')

@php
    $uid = $content['uid'] ?? ('listen_match_' . substr(md5(uniqid('', true)), 0, 10));
    $scriptLines = is_array($content['script'] ?? null)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['script']), static fn ($line) => $line !== ''))
        : (is_array($content['transcript'] ?? null)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['transcript']), static fn ($line) => $line !== ''))
            : []);
    $hasScript = $scriptLines !== [];
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        #{{ $uid }}{
            --p: {{ $content['theme'] ?? '#6366f1' }};
            --ok: #10b981;
            --bad: #ef4444;
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                radial-gradient(980px 560px at 8% 10%, rgba(103,63,231,.14), transparent 55%),
                radial-gradient(900px 560px at 92% 14%, rgba(59,130,246,.12), transparent 56%),
                radial-gradient(880px 640px at 50% 100%, rgba(16,185,129,.08), transparent 60%);
        }

        .dark #{{ $uid }}{
            background:
                radial-gradient(980px 560px at 8% 10%, rgba(96,165,250,.18), transparent 55%),
                radial-gradient(900px 560px at 92% 14%, rgba(192,132,252,.16), transparent 56%),
                radial-gradient(880px 640px at 50% 100%, rgba(99,102,241,.12), transparent 60%),
                linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        @keyframes pop {
            0% { transform: translateY(10px) scale(.98); opacity: 0; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        @keyframes cardIn {
            0% { transform: translateY(16px) scale(.96); opacity: 0; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        @keyframes floatOrb {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        #{{ $uid }} .modal-pop { animation: pop .3s cubic-bezier(.34,1.56,.64,1); }
        #{{ $uid }} .card-in { animation: cardIn .45s cubic-bezier(.2,.8,.2,1) both; }
        #{{ $uid }} .finish-orb { animation: floatOrb 2.6s ease-in-out infinite; }

        #{{ $uid }} .glass-panel{
             background: rgba(255,255,255,.72);
             backdrop-filter: blur(12px);
             -webkit-backdrop-filter: blur(12px);
             border: 1px solid rgba(255,255,255,.72);
             box-shadow: 0 16px 34px -24px rgba(15,23,42,.18);
         }

        .dark #{{ $uid }} .glass-panel{
                   background: rgba(15,23,42,.72);
                   border: 1px solid rgba(148,163,184,.18);
                   box-shadow: 0 18px 44px -24px rgba(2,6,23,.72);
               }

        #{{ $uid }} .speaker-card{
             background: #fff;
             border: 2px solid #eef2ff;
             box-shadow: 0 8px 20px rgba(15,23,42,.05);
             transition: transform .22s ease, border-color .22s ease, box-shadow .22s ease;
         }

        .dark #{{ $uid }} .speaker-card{
                   background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
                   border-color: rgba(255,255,255,.07);
                   box-shadow: 0 12px 28px rgba(0,0,0,.22);
               }

        #{{ $uid }} .speaker-card.is-wrong{
             border-color: rgba(239,68,68,.45);
             box-shadow: 0 0 0 4px rgba(239,68,68,.12), 0 12px 26px rgba(239,68,68,.12);
         }

        #{{ $uid }} .speaker-card.is-correct{
             border-color: rgba(16,185,129,.45);
             box-shadow: 0 0 0 4px rgba(16,185,129,.12), 0 14px 28px rgba(16,185,129,.12);
         }

        #{{ $uid }} .speaker-avatar{
             border: 2px solid rgba(99,102,241,.10);
             background: #eef2ff;
         }

        .dark #{{ $uid }} .speaker-avatar{
                   background: rgba(99,102,241,.12);
                   border-color: rgba(255,255,255,.08);
               }

        #{{ $uid }} .answer-zone{
             border: 2px dashed rgba(99,102,241,.24);
             background: rgba(99,102,241,.06);
             transition: all .18s ease;
         }

        .dark #{{ $uid }} .answer-zone{
                   background: rgba(99,102,241,.08);
               }

        #{{ $uid }} .answer-zone.can-drop{
             border-color: var(--p);
             transform: translateY(-2px);
             background: rgba(99,102,241,.12);
         }

        #{{ $uid }} .answer-zone.correct{
             border-color: rgba(16,185,129,.6);
             background: rgba(16,185,129,.08);
         }

        #{{ $uid }} .answer-zone.wrong{
             border-color: rgba(239,68,68,.6);
             background: rgba(239,68,68,.08);
         }

        #{{ $uid }} .answer-zone-square{
             width: 74px;
             aspect-ratio: 1 / 1;
             min-height: 0;
             padding: 6px;
             justify-self: center;
         }

        @media (min-width: 640px){
            #{{ $uid }} .answer-zone-square{
            width: 84px;
        }
        }

        @media (min-width: 1024px){
            #{{ $uid }} .answer-zone-square{
            width: 92px;
        }
        }

        #{{ $uid }} .choice-card{
             background: #fff;
             border: 2px solid #eef2ff;
             box-shadow: 0 8px 20px rgba(15,23,42,.05);
             transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease, opacity .2s ease;
             cursor: grab;
             user-select: none;
             -webkit-user-drag: element;
         }

        .dark #{{ $uid }} .choice-card{
                   background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
                   border-color: rgba(255,255,255,.07);
               }

        #{{ $uid }} .choice-card:hover{
             transform: translateY(-3px);
             border-color: color-mix(in srgb, var(--p) 38%, transparent);
             box-shadow: 0 14px 28px rgba(79,70,229,.12);
         }

        #{{ $uid }} .choice-thumb{
             aspect-ratio: 4 / 3;
             overflow: hidden;
         }

        #{{ $uid }} .choice-thumb img,
        #{{ $uid }} .assigned-thumb img{
             width: 100%;
             height: 100%;
             object-fit: cover;
             display: block;
             pointer-events: none;
         }

        #{{ $uid }} .assigned-thumb{
             width: 100%;
             height: 100%;
             min-height: 0;
             aspect-ratio: 1 / 1;
             overflow: hidden;
             border-radius: 14px;
             position: relative;
         }

        #{{ $uid }} .assigned-thumb::after{
             content: "✓";
             position: absolute;
             top: 6px;
             right: 6px;
             width: 22px;
             height: 22px;
             border-radius: 999px;
             display: grid;
             place-items: center;
             background: var(--ok);
             color: #fff;
             font-weight: 900;
             font-size: .8rem;
             box-shadow: 0 8px 18px rgba(16,185,129,.24);
         }

        #{{ $uid }} .bank-empty{
             border: 2px dashed rgba(99,102,241,.18);
             background: rgba(99,102,241,.06);
             color: #64748b;
         }

        .dark #{{ $uid }} .bank-empty{
                   color: #94a3b8;
               }

        #{{ $uid }} audio{
            height: 36px;
            width: 100%;
        }

        @media (min-width: 1024px){
            #{{ $uid }} .desktop-bank{
            max-width: 180px;
            margin-left: auto;
            margin-right: auto;
        }

            #{{ $uid }} .choice-thumb{
            aspect-ratio: 1 / 1;
        }
        }

        @media (max-width: 900px){
            #{{ $uid }} .mobile-bank-space{
            padding-bottom: 170px;
        }
        }

        @media (max-width: 640px){
            #{{ $uid }} audio{
                height: 34px;
            }

            #{{ $uid }} .choice-thumb{
            aspect-ratio: 1 / 1;
        }
        }
    </style>
@endsection

@section('content')
    <main id="{{ $uid }}" class="w-full min-h-screen overflow-x-hidden transition-colors duration-500">
        <div class="mx-auto w-full max-w-7xl px-3 sm:px-6 py-4 sm:py-6 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full mobile-bank-space">
                <div class="grid place-items-center text-center gap-4 sm:gap-6">

                    @include('slider.components.title-subtitle')

                    <div class="w-full grid grid-cols-1 lg:grid-cols-[minmax(0,1.6fr)_220px] gap-4 lg:gap-5 items-start">
                        <section class="glass-panel rounded-[2rem] sm:rounded-[2.25rem] p-3 sm:p-4 lg:p-5">
                            <div class="flex items-center justify-between gap-3 mb-3 sm:mb-4 text-left">
                                <div>
                                    <h2 class="text-sm sm:text-base font-black text-slate-900 dark:text-white">Speakers</h2>
                                    <p class="text-xs sm:text-sm font-semibold text-slate-500 dark:text-slate-400">Listen and match</p>
                                </div>

                                <div id="progressText" class="rounded-full bg-indigo-50 px-3 py-1 text-[10px] sm:text-xs font-black uppercase tracking-[0.14em] text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-300">
                                    0 / {{ count($content['speakers']) }} done
                                </div>
                            </div>

                            <div id="speakerList" class="grid grid-cols-1 gap-3 sm:gap-4">
                                @foreach($content['speakers'] as $index => $speaker)
                                    <div
                                            class="speaker-card card-in rounded-[1.6rem] sm:rounded-[1.9rem] p-3 sm:p-4 grid grid-cols-1 md:grid-cols-[minmax(0,1fr)_120px] gap-3 sm:gap-4 items-center"
                                            style="animation-delay: {{ $index * 0.05 }}s;"
                                            data-speaker-id="{{ $speaker['id'] }}"
                                            data-answer="{{ $speaker['answer'] }}"
                                            data-locked="false"
                                    >
                                        <div class="min-w-0 flex items-center gap-3 sm:gap-4 text-left">
                                            <div class="speaker-avatar h-14 w-14 sm:h-16 sm:w-16 rounded-[1rem] sm:rounded-[1.2rem] overflow-hidden shrink-0">
                                                <img src="{{ $speaker['photo'] }}" alt="{{ $speaker['name'] }}" class="w-full h-full object-cover">
                                            </div>

                                            <div class="min-w-0 flex-1">
                                                <h3 class="text-base sm:text-lg font-black tracking-tight text-slate-900 dark:text-slate-50">
                                                    {{ $index + 1 }}. {{ $speaker['name'] }}
                                                </h3>

                                                @if(!empty($speaker['audio']))
                                                    <div class="mt-2">
                                                        @include('slider.components.audio-player', [
                                                            'playerAudio' => $speaker['audio'],
                                                            'scriptLines' => [],
                                                            'hasScript' => false,
                                                            'audioPlayerFloating' => false,
                                                        ])
                                                    </div>
                                                @elseif(!empty($speaker['note']))
                                                    <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                                                        {{ $speaker['note'] }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="answer-zone answer-zone-square rounded-[1.2rem] sm:rounded-[1.4rem] flex items-center justify-center overflow-hidden"
                                             data-answer-zone
                                             data-speaker-id="{{ $speaker['id'] }}">
                                            <div class="text-center text-slate-500 dark:text-slate-400 text-[9px] sm:text-[10px] font-black uppercase tracking-[0.08em] leading-tight">
                                                Drop<br>image
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <aside class="glass-panel rounded-[1.8rem] sm:rounded-[2rem] p-2.5 sm:p-3 lg:p-4 fixed lg:static bottom-0 left-0 right-0 z-30 rounded-b-none lg:rounded-b-[2rem] border-t border-white/50 dark:border-slate-700/70">
                            <div id="choicesBank" class="desktop-bank grid grid-cols-3 lg:grid-cols-1 gap-2 sm:gap-3">
                                @foreach($content['choices'] as $choice)
                                    <div
                                            class="choice-card rounded-[1rem] sm:rounded-[1.2rem] overflow-hidden"
                                            data-choice-id="{{ $choice['id'] }}"
                                            data-choice-label="{{ $choice['label'] }}"
                                            data-choice-title="{{ $choice['title'] }}"
                                            data-choice-image="{{ $choice['image'] }}"
                                    >
                                        <div class="choice-thumb">
                                            <img src="{{ $choice['image'] }}" alt="{{ $choice['title'] }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </div>

        <div id="finishModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-md" id="finishBg"></div>

            <div class="modal-pop relative w-full max-w-xl overflow-hidden rounded-[3rem] border border-white/10 bg-white dark:bg-slate-900 shadow-2xl">
                <div class="absolute inset-0 pointer-events-none opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.16)_0%,transparent_55%)]"></div>

                <div class="relative p-8 sm:p-10 text-center">
                    <div class="mx-auto relative mb-6 h-20 w-20 sm:h-24 sm:w-24">
                        <div class="finish-orb absolute inset-0 rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-blue-500 opacity-20 blur-2xl"></div>
                        <div class="absolute inset-0 grid place-items-center rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-blue-500 text-white shadow-xl">
                            <svg viewBox="0 0 24 24" class="h-10 w-10 sm:h-12 sm:w-12" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.8" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>

                    <p class="text-[11px] font-black uppercase tracking-[0.25em] text-indigo-500">Completed</p>
                    <h2 class="mt-2 text-2xl sm:text-4xl font-black tracking-tight text-slate-900 dark:text-slate-50">
                        Great job!
                    </h2>
                    <p class="mt-3 text-sm sm:text-lg font-semibold text-slate-600 dark:text-slate-300">
                        You matched all the speakers with the correct pictures.
                    </p>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <button id="restartBtn"
                                type="button"
                                class="inline-flex w-full items-center justify-center rounded-2xl border border-slate-200/80 bg-white/85 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-slate-800 shadow-sm transition-transform hover:-translate-y-0.5 hover:bg-white active:translate-y-0 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-100 dark:hover:bg-slate-900/70">
                            Restart
                        </button>

                        <button id="continueBtn"
                                type="button"
                                class="inline-flex w-full items-center justify-center rounded-2xl px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-white shadow-[0_16px_40px_rgba(79,70,229,0.22)] transition-transform hover:-translate-y-0.5 active:translate-y-0"
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
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const root = document.getElementById(@json($uid));
            const CHOICES = @json($content['choices']);
            const SFX = {
                enabled: true,
                sources: {
                    correct: @json($content['sfx']['correct'] ?? '/slider/sounds/correct.wav'),
                    wrong: @json($content['sfx']['wrong'] ?? '/slider/sounds/wrong.wav'),
                    success: @json($content['sfx']['success'] ?? '/slider/sounds/success.wav')
                },
                volume: { correct: 1, wrong: 1, success: 1 }
            };

            const audio = {
                correct: new Audio(SFX.sources.correct),
                wrong: new Audio(SFX.sources.wrong),
                success: new Audio(SFX.sources.success)
            };

            const choicesBank = root.querySelector('#choicesBank');
            const speakerCards = Array.from(root.querySelectorAll('.speaker-card'));
            const answerZones = Array.from(root.querySelectorAll('[data-answer-zone]'));
            const finishModal = root.querySelector('#finishModal');
            const finishBg = root.querySelector('#finishBg');
            const restartBtn = root.querySelector('#restartBtn');
            const continueBtn = root.querySelector('#continueBtn');
            const progressText = root.querySelector('#progressText');
            const allAudioElements = Array.from(root.querySelectorAll('.speaker-audio'));

            let sortableInstances = [];

            function clamp01(value) {
                value = Number(value);
                if (!Number.isFinite(value)) return 0.5;
                return Math.max(0, Math.min(1, value));
            }

            function applyVolumes() {
                audio.correct.volume = clamp01(SFX.volume.correct);
                audio.wrong.volume = clamp01(SFX.volume.wrong);
                audio.success.volume = clamp01(SFX.volume.success);
            }

            function play(sound) {
                if (!SFX.enabled || !sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(function(){});
            }

            function playCorrect() { play(audio.correct); }
            function playWrong() { play(audio.wrong); }
            function playWin() { play(audio.success); }

            function renderChoiceCard(choice) {
                return `
                    <div
                        class="choice-card rounded-[1rem] sm:rounded-[1.2rem] overflow-hidden"
                        data-choice-id="${choice.id}"
                        data-choice-label="${choice.label}"
                        data-choice-title="${choice.title}"
                        data-choice-image="${choice.image}"
                    >
                        <div class="choice-thumb">
                            <img src="${choice.image}" alt="${choice.title}">
                        </div>
                    </div>
                `;
            }

            function updateProgress() {
                const done = speakerCards.filter(card => card.getAttribute('data-locked') === 'true').length;
                progressText.textContent = `${done} / ${speakerCards.length} done`;
            }

            function stopAllAudio() {
                allAudioElements.forEach(audio => {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (e) {}
                });

                window.stopAudioPlayer?.();
            }

            window.stopSlideAudio = stopAllAudio;

            allAudioElements.forEach(audio => {
                audio.addEventListener('play', function() {
                    allAudioElements.forEach(otherAudio => {
                        if (otherAudio !== audio && !otherAudio.paused) {
                            otherAudio.pause();
                            otherAudio.currentTime = 0;
                        }
                    });
                });
            });

            function destroySortableInstances() {
                sortableInstances.forEach(instance => {
                    if (instance && typeof instance.destroy === 'function') {
                        instance.destroy();
                    }
                });
                sortableInstances = [];
            }

            function clearHighlights() {
                answerZones.forEach(zone => zone.classList.remove('can-drop'));
            }

            function getSpeakerCardById(speakerId) {
                return root.querySelector(`.speaker-card[data-speaker-id="${speakerId}"]`);
            }

            function flashWrong(card, zone) {
                playWrong();
                card.classList.add('is-wrong');
                zone.classList.add('wrong');

                setTimeout(function () {
                    card.classList.remove('is-wrong');
                    zone.classList.remove('wrong');
                }, 650);
            }

            function setCorrect(card, zone, choiceCard) {
                playCorrect();
                const choiceId = choiceCard.getAttribute('data-choice-id');
                const image = choiceCard.getAttribute('data-choice-image');
                const title = choiceCard.getAttribute('data-choice-title');

                card.classList.add('is-correct');
                card.setAttribute('data-locked', 'true');
                zone.classList.add('correct');
                zone.innerHTML = `
                    <div class="assigned-thumb">
                        <img src="${image}" alt="${title}">
                    </div>
                `;

                const originalChoice = choicesBank.querySelector(`[data-choice-id="${choiceId}"]`);
                if (originalChoice) {
                    originalChoice.remove();
                }
            }

            function allMatched() {
                return speakerCards.every(card => card.getAttribute('data-locked') === 'true');
            }

            function showFinishModal() {
                finishModal.classList.remove('hidden');
                finishModal.classList.add('flex');
            }

            function hideFinishModal() {
                finishModal.classList.add('hidden');
                finishModal.classList.remove('flex');
            }

            function checkIfBankEmpty() {
                const activeChoices = choicesBank.querySelectorAll('.choice-card');
                if (!activeChoices.length) {
                    choicesBank.innerHTML = `
                        <div class="bank-empty col-span-3 lg:col-span-1 rounded-[1rem] sm:rounded-[1.2rem] min-h-[78px] grid place-items-center text-center px-3 text-xs sm:text-sm font-black uppercase tracking-[0.12em]">
                            All done
                        </div>
                    `;
                }
            }

            function tryMatch(speakerId, draggedEl) {
                const card = getSpeakerCardById(speakerId);
                if (!card) return;

                const zone = card.querySelector('[data-answer-zone]');
                const correctAnswer = card.getAttribute('data-answer');
                const locked = card.getAttribute('data-locked') === 'true';
                const droppedChoiceId = draggedEl.getAttribute('data-choice-id');

                if (locked) return;

                if (correctAnswer !== droppedChoiceId) {
                    flashWrong(card, zone);
                    return;
                }

                setCorrect(card, zone, draggedEl);
                updateProgress();
                checkIfBankEmpty();

                if (allMatched()) {
                    setTimeout(function () {
                        playWin();
                        showFinishModal();
                    }, 280);
                }
            }

            function initializeSortable() {
                destroySortableInstances();

                if (choicesBank.querySelector('.choice-card')) {
                    const bankSortable = new Sortable(choicesBank, {
                        group: {
                            name: 'listen-match',
                            pull: 'clone',
                            put: false
                        },
                        sort: false,
                        animation: 150,
                        draggable: '.choice-card',
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                    });

                    sortableInstances.push(bankSortable);
                }

                answerZones.forEach(zone => {
                    const speakerId = zone.getAttribute('data-speaker-id');
                    const card = getSpeakerCardById(speakerId);

                    if (!card || card.getAttribute('data-locked') === 'true') return;

                    const zoneSortable = new Sortable(zone, {
                        group: {
                            name: 'listen-match',
                            pull: false,
                            put: function (to, from, dragEl) {
                                if (!dragEl) return false;
                                if (card.getAttribute('data-locked') === 'true') return false;
                                return dragEl.classList.contains('choice-card');
                            }
                        },
                        sort: false,
                        animation: 150,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        onMove: function () {
                            clearHighlights();
                            zone.classList.add('can-drop');
                            return true;
                        },
                        onAdd: function (evt) {
                            clearHighlights();
                            const draggedEl = evt.item.cloneNode(true);
                            evt.item.remove();
                            tryMatch(speakerId, draggedEl);
                        },
                        onEnd: function () {
                            clearHighlights();
                        }
                    });

                    sortableInstances.push(zoneSortable);
                });
            }

            function resetGame() {
                stopAllAudio();

                speakerCards.forEach(card => {
                    const zone = card.querySelector('[data-answer-zone]');
                    card.classList.remove('is-correct', 'is-wrong');
                    card.setAttribute('data-locked', 'false');

                    zone.classList.remove('correct', 'wrong', 'can-drop');
                    zone.innerHTML = `
                        <div class="text-center text-slate-500 dark:text-slate-400 text-[9px] sm:text-[10px] font-black uppercase tracking-[0.08em] leading-tight">
                            Drop<br>image
                        </div>
                    `;
                });

                choicesBank.innerHTML = CHOICES.map(renderChoiceCard).join('');
                hideFinishModal();
                updateProgress();
                initializeSortable();
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

            window.resetSlide = resetGame;

            restartBtn.addEventListener('click', resetGame);
            continueBtn.addEventListener('click', goToNextSlide);
            finishBg.addEventListener('click', hideFinishModal);

            applyVolumes();
            updateProgress();
            initializeSortable();
        });
    </script>
@endsection
