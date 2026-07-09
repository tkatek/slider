@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $uid = $content['uid'] ?? ('listen_match_' . substr(md5(uniqid('', true)), 0, 10));
    $speakers = array_values($content['speakers'] ?? []);
    $choices = array_values($content['choices'] ?? []);
    $speakerCount = count($speakers);

    $sfx = [
        'click'   => materialAsset('slider/sounds/tap.wav'),
        'correct' => materialAsset('slider/sounds/correct.wav'),
        'wrong'   => materialAsset('slider/sounds/wrong.wav'),
        'success' => materialAsset('slider/sounds/success.wav'),
    ];
@endphp

@section('title', $content['page_title'] ?? $content['title'] ?? '')

@section('content')
    <main id="{{ $uid }}" class="min-h-[100dvh] w-full overflow-x-hidden pb-32 sm:pb-36 md:pb-0">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-start px-3 py-4 sm:px-5 sm:py-5 md:px-6 lg:items-center lg:px-8 lg:py-6">
            <section class="w-full">
                <div class="mx-auto w-full max-w-4xl text-center">
                    @include('slider.components.title-subtitle')
                </div>

                <div class="mx-auto mt-3 grid w-full max-w-7xl grid-cols-1 gap-3 sm:mt-4 md:grid-cols-[9rem_minmax(0,1fr)] md:items-start md:gap-4 lg:grid-cols-[10rem_minmax(0,1fr)] lg:gap-5 xl:grid-cols-[11rem_minmax(0,1fr)]">
                    <aside class="fixed inset-x-0 bottom-0 z-40 px-3 pb-2 sm:px-5 sm:pb-3 md:sticky md:inset-auto md:top-4 md:z-20 md:self-start md:px-0 md:pb-0">
                        <section class="mx-auto w-full max-w-[22rem] rounded-t-[1.35rem] border border-slate-200/80 bg-white/96 p-2 shadow-[0_-16px_42px_rgba(15,23,42,0.14)] ring-1 ring-white/80 backdrop-blur-xl dark:border-white/10 dark:bg-slate-950/94 dark:ring-white/10 sm:max-w-[28rem] sm:rounded-[1.5rem] sm:p-2.5 md:max-w-none md:rounded-[1.6rem] md:p-3 md:shadow-[0_18px_48px_rgba(15,23,42,0.10)] lg:p-3.5">
                            <div class="mb-1.5 flex items-center justify-between gap-2 px-0.5 sm:mb-2 md:flex-col md:items-stretch md:px-0">


                                <button
                                        id="resetInlineBtn"
                                        type="button"
                                        class="inline-flex shrink-0 items-center justify-center rounded-full border border-slate-200 bg-white px-2.5 py-1 text-[9px] font-black uppercase tracking-[0.1em] text-slate-700 shadow-sm transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 sm:px-3 sm:text-[10px] md:w-full md:py-1.5"
                                >
                                    Reset
                                </button>
                            </div>

                            <div id="choicesBank" class="grid grid-cols-3 place-items-center gap-2 sm:gap-2.5 md:grid-cols-1 md:gap-3 lg:gap-3.5">
                                @foreach($choices as $choice)
                                    <button
                                            type="button"
                                            class="choice-card group relative aspect-square w-[4.25rem] overflow-hidden rounded-[0.9rem] border-2 border-slate-200 bg-white shadow-[0_8px_20px_rgba(15,23,42,0.10)] transition duration-200 hover:-translate-y-0.5 hover:border-indigo-300 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-300/35 dark:border-white/10 dark:bg-slate-900 sm:w-20 sm:rounded-[1rem] md:w-28 md:rounded-[1.15rem] lg:w-32 xl:w-36"
                                            data-choice-id="{{ $choice['id'] }}"
                                            data-choice-label="{{ $choice['label'] }}"
                                            data-choice-title="{{ $choice['title'] }}"
                                            data-choice-image="{{ $choice['image'] }}"
                                            aria-label="{{ $choice['label'] }}. {{ $choice['title'] }}"
                                    >
                                        <img
                                                src="{{ $choice['image'] }}"
                                                alt="{{ $choice['title'] }}"
                                                class="h-full w-full object-cover transition duration-200 group-hover:scale-105"
                                                loading="lazy"
                                                decoding="async"
                                        >
                                        <span class="absolute left-1.5 top-1.5 grid h-5 w-5 place-items-center rounded-full bg-white/95 text-[9px] font-black text-slate-900 shadow-md backdrop-blur-sm dark:bg-slate-950/85 dark:text-white sm:h-6 sm:w-6 sm:text-[10px] md:h-7 md:w-7 md:text-xs">
                                            {{ $choice['label'] }}
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        </section>
                    </aside>

                    <section class="w-full rounded-[1.45rem] border border-slate-200/70 bg-white/85 p-3 shadow-[0_18px_48px_rgba(15,23,42,0.08)] ring-1 ring-white/80 backdrop-blur-xl dark:border-white/10 dark:bg-slate-900/75 dark:ring-white/10 sm:rounded-[1.8rem] sm:p-4 lg:p-5">
                        <div class="flex flex-col gap-2 text-left sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                            <div class="min-w-0">
                                <h2 class="text-sm font-black tracking-[-0.02em] text-slate-900 dark:text-white sm:text-base">
                                    Listen And Match
                                </h2>
                                <p class="mt-0.5 text-xs font-bold leading-snug text-slate-500 dark:text-slate-400 sm:text-sm">
                                    Tap a picture, then tap a drop box. You can also drag the pictures.
                                </p>
                            </div>

                            <div id="progressText" class="inline-flex w-fit shrink-0 items-center rounded-full bg-indigo-50 px-3 py-1 text-[10px] font-black uppercase tracking-[0.14em] text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-300 sm:text-xs">
                                0 / {{ $speakerCount }} Done
                            </div>
                        </div>

                        <div id="speakerList" class="mt-3 grid grid-cols-1 gap-2.5 sm:mt-4 sm:gap-3 lg:gap-4">
                            @foreach($speakers as $index => $speaker)
                                <article
                                        class="speaker-card grid grid-cols-[3.75rem_minmax(0,1fr)_4.75rem] items-center gap-2.5 rounded-[1.25rem] border-2 border-slate-200/85 bg-white p-2.5 shadow-[0_12px_30px_rgba(15,23,42,0.07)] transition duration-200 dark:border-white/10 dark:bg-slate-950/50 sm:grid-cols-[4.5rem_minmax(0,1fr)_5.5rem] sm:gap-3 sm:rounded-[1.45rem] sm:p-3 md:grid-cols-[5rem_minmax(0,1fr)_6.25rem] lg:p-3.5"
                                        data-speaker-id="{{ $speaker['id'] }}"
                                        data-answer="{{ $speaker['answer'] }}"
                                        data-locked="false"
                                >
                                    <div class="relative aspect-square overflow-hidden rounded-[1rem] bg-slate-100 ring-1 ring-slate-200/80 dark:bg-slate-800 dark:ring-white/10 sm:rounded-[1.15rem]">
                                        <img
                                                src="{{ $speaker['photo'] }}"
                                                alt="{{ $speaker['name'] }}"
                                                class="h-full w-full object-cover"
                                                loading="lazy"
                                                decoding="async"
                                        >
                                        <div class="absolute left-1.5 top-1.5 grid h-6 w-6 place-items-center rounded-full bg-white/95 text-[10px] font-black text-slate-900 shadow-md backdrop-blur-sm dark:bg-slate-950/85 dark:text-white sm:h-7 sm:w-7 sm:text-xs">
                                            {{ $index + 1 }}
                                        </div>
                                    </div>

                                    <div class="min-w-0 text-left">
                                        <h3 class="truncate text-base font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-lg lg:text-xl">
                                            {{ $speaker['name'] }}
                                        </h3>

                                        @if(!empty($speaker['audio']))
                                            <div class="mt-1.5 max-w-full sm:mt-2">
                                                @php
                                                    $scriptLines = array_values($speaker['script'] ?? $speaker['transcript'] ?? []);

                                                    if ($scriptLines === [] && $speakerCount === 1 && is_array($content['transcript'] ?? null)) {
                                                        $scriptLines = array_values($content['transcript']);
                                                    }
                                                @endphp

                                                @include('slider.components.audio-player', [
                                                    'playerAudio' => $speaker['audio'],
                                                    'scriptLines' => $scriptLines,
                                                    'hasScript' => count($scriptLines) > 0,
                                                    'audioPlayerFloating' => false,
                                                ])
                                            </div>
                                        @elseif(!empty($speaker['note']))
                                            <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                                                {{ $speaker['note'] }}
                                            </p>
                                        @endif
                                    </div>

                                    <button
                                            type="button"
                                            class="answer-zone grid aspect-square w-full place-items-center overflow-hidden rounded-[1rem] border-2 border-dashed border-indigo-300/70 bg-indigo-50/70 p-1.5 text-center transition duration-200 dark:border-indigo-400/30 dark:bg-indigo-500/10 sm:rounded-[1.15rem] sm:p-2"
                                            data-answer-zone
                                            data-speaker-id="{{ $speaker['id'] }}"
                                            aria-label="Drop image for {{ $speaker['name'] }}"
                                    >
                                        <span class="pointer-events-none text-[9px] font-black uppercase leading-tight tracking-[0.1em] text-slate-500 dark:text-slate-400 sm:text-[10px]">
                                            Drop<br>Image
                                        </span>
                                    </button>
                                </article>
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
        </div>

        <div id="finishModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
            <button id="finishBg" type="button" class="absolute inset-0 bg-slate-950/70 backdrop-blur-md" aria-label="Close result"></button>

            <section class="relative w-full max-w-xl overflow-hidden rounded-[2rem] border border-white/10 bg-white shadow-2xl dark:bg-slate-900 sm:rounded-[3rem]">
                <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.16)_0%,transparent_55%)] opacity-80"></div>

                <div class="relative p-7 text-center sm:p-10">
                    <div class="mx-auto grid h-20 w-20 place-items-center rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-blue-500 text-white shadow-xl shadow-indigo-500/20 sm:h-24 sm:w-24">
                        <svg viewBox="0 0 24 24" class="h-10 w-10 sm:h-12 sm:w-12" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.8" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <p class="mt-6 text-[11px] font-black uppercase tracking-[0.25em] text-indigo-500">
                        Completed
                    </p>
                    <h2 class="mt-2 text-2xl font-black tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        Great job!
                    </h2>
                    <p class="mx-auto mt-3 max-w-md text-sm font-semibold leading-[1.7] text-slate-600 dark:text-slate-300 sm:text-lg">
                        You matched all the speakers with the correct pictures.
                    </p>

                    <div class="mt-8 grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <button
                                id="restartBtn"
                                type="button"
                                class="inline-flex w-full items-center justify-center rounded-2xl border border-slate-200/80 bg-white/85 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:bg-white active:translate-y-0 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-100 dark:hover:bg-slate-900/70"
                        >
                            Restart
                        </button>

                        <button
                                id="continueBtn"
                                type="button"
                                class="inline-flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-white shadow-[0_16px_40px_rgba(79,70,229,0.22)] transition hover:-translate-y-0.5 hover:brightness-110 active:translate-y-0"
                        >
                            Continue
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var root = document.getElementById(@json($uid));
            if (!root) return;

            var CHOICES = @json($choices);
            var SFX_SOURCES = @json($sfx);

            var choicesBank = root.querySelector('#choicesBank');
            var speakerCards = Array.prototype.slice.call(root.querySelectorAll('.speaker-card'));
            var answerZones = Array.prototype.slice.call(root.querySelectorAll('[data-answer-zone]'));
            var finishModal = root.querySelector('#finishModal');
            var finishBg = root.querySelector('#finishBg');
            var restartBtn = root.querySelector('#restartBtn');
            var continueBtn = root.querySelector('#continueBtn');
            var resetInlineBtn = root.querySelector('#resetInlineBtn');
            var progressText = root.querySelector('#progressText');

            var selectedChoiceId = null;
            var sortableInstances = [];
            var soundPlayers = {};

            Object.keys(SFX_SOURCES || {}).forEach(function (key) {
                if (!SFX_SOURCES[key]) return;
                soundPlayers[key] = new Audio(SFX_SOURCES[key]);
                soundPlayers[key].preload = 'auto';
            });

            function playSound(key) {
                var player = soundPlayers[key];
                if (!player) return;

                try {
                    player.pause();
                    player.currentTime = 0;
                    player.play().catch(function () {});
                } catch (error) {}
            }

            function stopAllAudio() {
                Object.keys(soundPlayers).forEach(function (key) {
                    try {
                        soundPlayers[key].pause();
                        soundPlayers[key].currentTime = 0;
                    } catch (error) {}
                });

                Array.prototype.slice.call(root.querySelectorAll('audio')).forEach(function (audio) {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (error) {}
                });

                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }
            }

            window.stopSlideAudio = stopAllAudio;

            function escapeHtml(value) {
                var div = document.createElement('div');
                div.textContent = String(value || '');
                return div.innerHTML;
            }

            function getChoiceData(choiceId) {
                for (var i = 0; i < CHOICES.length; i += 1) {
                    if (String(CHOICES[i].id) === String(choiceId)) return CHOICES[i];
                }

                return null;
            }

            function getChoiceCard(choiceId) {
                var cards = Array.prototype.slice.call(choicesBank.querySelectorAll('.choice-card'));

                for (var i = 0; i < cards.length; i += 1) {
                    if (String(cards[i].dataset.choiceId) === String(choiceId)) return cards[i];
                }

                return null;
            }

            function getSpeakerCardById(speakerId) {
                for (var i = 0; i < speakerCards.length; i += 1) {
                    if (String(speakerCards[i].dataset.speakerId) === String(speakerId)) return speakerCards[i];
                }

                return null;
            }

            function createChoiceCard(choice) {
                var button = document.createElement('button');

                button.type = 'button';
                button.className = 'choice-card group relative aspect-square w-[4.25rem] overflow-hidden rounded-[0.9rem] border-2 border-slate-200 bg-white shadow-[0_8px_20px_rgba(15,23,42,0.10)] transition duration-200 hover:-translate-y-0.5 hover:border-indigo-300 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-300/35 dark:border-white/10 dark:bg-slate-900 sm:w-20 sm:rounded-[1rem] md:w-28 md:rounded-[1.15rem] lg:w-32 xl:w-36';
                button.dataset.choiceId = choice.id;
                button.dataset.choiceLabel = choice.label;
                button.dataset.choiceTitle = choice.title;
                button.dataset.choiceImage = choice.image;
                button.setAttribute('aria-label', (choice.label || '') + '. ' + (choice.title || ''));
                button.innerHTML = '' +
                    '<img src="' + escapeHtml(choice.image) + '" alt="' + escapeHtml(choice.title) + '" class="h-full w-full object-cover transition duration-200 group-hover:scale-105" loading="lazy" decoding="async">' +
                    '<span class="absolute left-1.5 top-1.5 grid h-5 w-5 place-items-center rounded-full bg-white/95 text-[9px] font-black text-slate-900 shadow-md backdrop-blur-sm dark:bg-slate-950/85 dark:text-white sm:h-6 sm:w-6 sm:text-[10px] md:h-7 md:w-7 md:text-xs">' + escapeHtml(choice.label) + '</span>';

                return button;
            }

            function clearSelectedChoice() {
                selectedChoiceId = null;

                Array.prototype.slice.call(choicesBank.querySelectorAll('.choice-card')).forEach(function (card) {
                    card.classList.remove('border-indigo-500', 'ring-4', 'ring-indigo-300/35', '-translate-y-1');
                    card.classList.add('border-slate-200', 'dark:border-white/10');
                });
            }

            function selectChoice(card) {
                if (!card || !card.dataset.choiceId) return;

                if (selectedChoiceId === card.dataset.choiceId) {
                    clearSelectedChoice();
                    return;
                }

                clearSelectedChoice();
                selectedChoiceId = card.dataset.choiceId;
                card.classList.remove('border-slate-200', 'dark:border-white/10');
                card.classList.add('border-indigo-500', 'ring-4', 'ring-indigo-300/35', '-translate-y-1');
                playSound('click');
            }

            function clearDropHighlights() {
                answerZones.forEach(function (zone) {
                    zone.classList.remove('scale-[1.02]', 'border-indigo-500', 'bg-indigo-100', 'dark:bg-indigo-500/20');
                });
            }

            function updateProgress() {
                var done = speakerCards.filter(function (card) {
                    return card.dataset.locked === 'true';
                }).length;

                if (progressText) {
                    progressText.textContent = done + ' / ' + speakerCards.length + ' Done';
                }
            }

            function allMatched() {
                return speakerCards.every(function (card) {
                    return card.dataset.locked === 'true';
                });
            }

            function setWrongFeedback(card, zone) {
                playSound('wrong');
                card.classList.add('border-rose-400', 'ring-4', 'ring-rose-300/25');
                zone.classList.add('border-rose-500', 'bg-rose-50', 'dark:bg-rose-950/30');

                window.setTimeout(function () {
                    card.classList.remove('border-rose-400', 'ring-4', 'ring-rose-300/25');
                    zone.classList.remove('border-rose-500', 'bg-rose-50', 'dark:bg-rose-950/30');
                }, 650);
            }

            function setCorrectFeedback(card, zone, choiceData) {
                playSound('correct');

                card.dataset.locked = 'true';
                card.classList.remove('border-slate-200/85', 'dark:border-white/10');
                card.classList.add('border-emerald-400/70', 'ring-4', 'ring-emerald-300/20');

                zone.classList.remove('border-indigo-300/70', 'bg-indigo-50/70', 'dark:border-indigo-400/30', 'dark:bg-indigo-500/10');
                zone.classList.add('border-emerald-400/70', 'bg-emerald-50/80', 'dark:border-emerald-400/40', 'dark:bg-emerald-500/10');
                zone.innerHTML = '' +
                    '<span class="relative block aspect-square h-full w-full overflow-hidden rounded-[0.8rem] sm:rounded-[0.95rem]">' +
                    '<img src="' + escapeHtml(choiceData.image) + '" alt="' + escapeHtml(choiceData.title) + '" class="h-full w-full object-cover">' +
                    '<span class="absolute right-1.5 top-1.5 grid h-5 w-5 place-items-center rounded-full bg-emerald-500 text-[10px] font-black text-white shadow-lg">âœ“</span>' +
                    '<span class="absolute left-1.5 top-1.5 grid h-5 w-5 place-items-center rounded-full bg-white/95 text-[9px] font-black text-slate-900 shadow-md backdrop-blur-sm dark:bg-slate-950/85 dark:text-white">' + escapeHtml(choiceData.label) + '</span>' +
                    '</span>';

                var originalChoice = getChoiceCard(choiceData.id);
                if (originalChoice) originalChoice.remove();
                if (selectedChoiceId === choiceData.id) selectedChoiceId = null;
            }

            function showFinishModal() {
                playSound('success');
                finishModal.classList.remove('hidden');
                finishModal.classList.add('flex');
            }

            function hideFinishModal() {
                finishModal.classList.add('hidden');
                finishModal.classList.remove('flex');
            }

            function showBankEmpty() {
                if (choicesBank.querySelector('.choice-card')) return;

                choicesBank.innerHTML = '' +
                    '<div class="col-span-3 grid h-16 w-full place-items-center rounded-[0.9rem] border-2 border-dashed border-indigo-200 bg-indigo-50/60 px-4 text-center text-[10px] font-black uppercase tracking-[0.16em] text-indigo-600 dark:border-indigo-400/25 dark:bg-indigo-500/10 dark:text-indigo-300 sm:h-20 md:col-span-1 md:h-24">' +
                    'All Done' +
                    '</div>';
            }

            function tryMatch(speakerId, choiceId) {
                var card = getSpeakerCardById(speakerId);
                var choiceData = getChoiceData(choiceId);
                if (!card || !choiceData) return;

                var zone = card.querySelector('[data-answer-zone]');
                var expectedAnswer = card.dataset.answer;

                if (card.dataset.locked === 'true' || !zone) return;

                if (expectedAnswer !== choiceData.id) {
                    setWrongFeedback(card, zone);
                    return;
                }

                setCorrectFeedback(card, zone, choiceData);
                clearSelectedChoice();
                updateProgress();
                showBankEmpty();

                if (allMatched()) {
                    window.setTimeout(showFinishModal, 260);
                }
            }

            function destroySortableInstances() {
                sortableInstances.forEach(function (instance) {
                    if (instance && typeof instance.destroy === 'function') instance.destroy();
                });

                sortableInstances = [];
            }

            function initializeSortable() {
                destroySortableInstances();

                if (!window.Sortable || !choicesBank.querySelector('.choice-card')) return;

                sortableInstances.push(new Sortable(choicesBank, {
                    group: { name: 'listen-match', pull: 'clone', put: false },
                    sort: false,
                    animation: 150,
                    draggable: '.choice-card',
                    fallbackOnBody: true,
                    swapThreshold: 0.65,
                    onStart: clearSelectedChoice
                }));

                answerZones.forEach(function (zone) {
                    var speakerId = zone.dataset.speakerId;
                    var card = getSpeakerCardById(speakerId);

                    if (!card || card.dataset.locked === 'true') return;

                    sortableInstances.push(new Sortable(zone, {
                        group: {
                            name: 'listen-match',
                            pull: false,
                            put: function (to, from, dragEl) {
                                return !!dragEl && dragEl.classList.contains('choice-card') && card.dataset.locked !== 'true';
                            }
                        },
                        sort: false,
                        animation: 150,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        onMove: function () {
                            clearDropHighlights();
                            zone.classList.add('scale-[1.02]', 'border-indigo-500', 'bg-indigo-100', 'dark:bg-indigo-500/20');
                            return true;
                        },
                        onAdd: function (event) {
                            clearDropHighlights();
                            var choiceId = event.item ? event.item.dataset.choiceId : '';
                            if (event.item) event.item.remove();
                            tryMatch(speakerId, choiceId);
                        },
                        onEnd: clearDropHighlights
                    }));
                });
            }

            function renderChoicesBank() {
                choicesBank.innerHTML = '';
                CHOICES.forEach(function (choice) {
                    choicesBank.appendChild(createChoiceCard(choice));
                });
            }

            function resetGame() {
                stopAllAudio();
                hideFinishModal();
                clearSelectedChoice();

                speakerCards.forEach(function (card) {
                    var zone = card.querySelector('[data-answer-zone]');

                    card.dataset.locked = 'false';
                    card.classList.remove('border-emerald-400/70', 'ring-4', 'ring-emerald-300/20', 'border-rose-400', 'ring-rose-300/25');
                    card.classList.add('border-slate-200/85', 'dark:border-white/10');

                    if (!zone) return;

                    zone.className = 'answer-zone grid aspect-square w-full place-items-center overflow-hidden rounded-[1rem] border-2 border-dashed border-indigo-300/70 bg-indigo-50/70 p-1.5 text-center transition duration-200 dark:border-indigo-400/30 dark:bg-indigo-500/10 sm:rounded-[1.15rem] sm:p-2';
                    zone.innerHTML = '<span class="pointer-events-none text-[9px] font-black uppercase leading-tight tracking-[0.1em] text-slate-500 dark:text-slate-400 sm:text-[10px]">Drop<br>Image</span>';
                });

                renderChoicesBank();
                updateProgress();
                initializeSortable();
            }

            function isEmbedded() {
                try {
                    return window.top !== window.self;
                } catch (error) {
                    return true;
                }
            }

            function goToNextSlide() {
                stopAllAudio();

                if (!isEmbedded()) return;

                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (error) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (error) {}
            }

            choicesBank.addEventListener('click', function (event) {
                var card = event.target.closest('.choice-card');
                if (!card || !choicesBank.contains(card)) return;
                selectChoice(card);
            });

            answerZones.forEach(function (zone) {
                zone.addEventListener('click', function () {
                    if (!selectedChoiceId) return;
                    tryMatch(zone.dataset.speakerId, selectedChoiceId);
                });
            });

            Array.prototype.slice.call(root.querySelectorAll('audio')).forEach(function (audio) {
                audio.addEventListener('play', function () {
                    Array.prototype.slice.call(root.querySelectorAll('audio')).forEach(function (otherAudio) {
                        if (otherAudio !== audio && !otherAudio.paused) {
                            otherAudio.pause();
                            otherAudio.currentTime = 0;
                        }
                    });
                });
            });

            if (restartBtn) restartBtn.addEventListener('click', resetGame);
            if (resetInlineBtn) resetInlineBtn.addEventListener('click', resetGame);
            if (continueBtn) continueBtn.addEventListener('click', goToNextSlide);
            if (finishBg) finishBg.addEventListener('click', hideFinishModal);

            window.resetSlide = resetGame;
            window.listenMatchReset = resetGame;

            updateProgress();
            initializeSortable();
        });
    </script>
@endsection
