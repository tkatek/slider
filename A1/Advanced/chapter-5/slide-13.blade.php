@php
    $content = [
        'page_title' => 'Practice 6',
        'title' => 'Practice 6',
        'subtitle' => 'Drag and drop the sentences into their correct order',
        'writing_title' => 'Write 3 questions you ask at the ticket booth. You can use the examples below',
        'writing_subtitle' => 'Example:',
        'writing_examples' => [
            'What time does the bus leave?',
            'How much is the ticket?',
        ],
        'writing_input_count' => 3,
        'sentences' => [
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(14,165,233,.24)]\">1</span> {{1}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">2</span> {{2}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(16,185,129,.24)]\">3</span> {{3}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(245,158,11,.24)]\">4</span> {{4}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(244,63,94,.24)]\">5</span> {{5}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.24)]\">6</span> {{6}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-lime-500 to-green-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(132,204,22,.24)]\">7</span> {{7}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-red-500 to-orange-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(239,68,68,.24)]\">8</span> {{8}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(6,182,212,.24)]\">9</span> {{9}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">10</span> {{10}}",
        ],
        'answers' => [
            'Can I help you?',
            "I'd like a bus ticket to Summerwell, please.",  
            'Sure. Only one ticket?',
            'Yes, one ticket for me. How much is it?',
            "That's four pounds, please.",
            'Here you are.',
            "And here's your ticket.",
            'Thanks. What time does the bus leave?',
            'It leaves in ten minutes. Hurry up!',
            'Oh, thank you! Goodbye!',
        ],
    ];

    $desktopLayoutBreakpoint = 1024;
    $tileClass = '!px-0.5 !py-0.5 !text-[11px] !min-h-[28px] sm:!px-2 sm:!py-1 sm:!text-sm sm:!min-h-[36px]';
    $sentences = array_values($content['sentences'] ?? []);
    $answers = array_values($content['answers'] ?? []);
    $writingTitle = trim((string) ($content['writing_title'] ?? ''));
    $writingSubtitle = trim((string) ($content['writing_subtitle'] ?? ''));
    $playerAudio = !empty($content['audio']) ? $content['audio'] : (!empty($content['audio_src']) ? $content['audio_src'] : null);
    $scriptLines = [];
    $hasScript = false;
    $writingExamples = array_values(array_filter(
        array_map(static fn ($example) => trim((string) $example), $content['writing_examples'] ?? []),
        static fn ($example) => $example !== ''
    ));
    $writingInputCount = max(0, (int) ($content['writing_input_count'] ?? 0));

    $sentenceItems = [];
    $answersForJs = [];
    $placeholderPattern = '/\{\{(\d+)\}\}/';

    foreach ($sentences as $sentence) {
        $parts = preg_split($placeholderPattern, (string) $sentence, -1, PREG_SPLIT_DELIM_CAPTURE);
        $tokens = [];

        foreach ($parts as $partIndex => $part) {
            if ($partIndex % 2 === 0) {
                if ($part !== '') {
                    $tokens[] = ['type' => 'html', 'value' => $part];
                }
                continue;
            }

            $answerIndex = (int) $part;
            $tokens[] = [
                'type' => 'blank',
                'id' => 'blank_' . $answerIndex,
                'answer' => isset($answers[$answerIndex - 1]) ? (string) $answers[$answerIndex - 1] : '',
                'answer_index' => $answerIndex,
            ];
        }

        $sentenceItems[] = ['tokens' => $tokens];
    }

    foreach ($answers as $answerIndex => $answer) {
        $answersForJs[] = [
            'id' => 'answer_' . ($answerIndex + 1),
            'text' => (string) $answer,
            'answerIndex' => $answerIndex + 1,
        ];
    }

    $modalActions = [
        [
            'label' => 'Restart',
            'id' => 'restartBtnModal',
            'class' => 'inline-flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-8 py-3 text-sm font-black text-slate-900 shadow-[0_8px_22px_rgba(2,6,23,.05)] transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700',
        ],
        [
            'label' => 'Continue',
            'id' => 'continueBtnModal',
            'class' => 'inline-flex w-full items-center justify-center rounded-xl border border-white/20 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-8 py-3 text-sm font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.10)] transition hover:scale-[1.02]',
        ],
    ];
@endphp

@extends('slider.simple-layout')

@section('content')
    <main id="ticketBoothPractice" class="flex min-h-[100dvh] w-full flex-col items-center">
        @include('slider.components.title-subtitle')
        @include('slider.components.game-status')

        <div class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-4 px-4 pb-4 sm:px-6 lg:px-8">
            <section id="ddbPoolRail" class="order-[-1] w-full max-w-full flex-none self-stretch">
                <div id="ddbPoolBar" class="relative w-full max-w-full p-0">
                    <div class="relative overflow-hidden rounded-3xl border border-slate-200/70 bg-white/90 shadow-[0_18px_45px_rgba(2,6,23,0.10)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/75">
                        <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                        <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 xl:px-6">
                        <div class="flex items-center justify-center">
                            <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                        </div>

                        <div class="mt-3 flex items-center justify-between gap-1.5 sm:gap-2">
                            <div class="flex shrink-0 items-center gap-1 sm:gap-2">
                                <button id="ddbPrevWordsBtn" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] sm:h-8 sm:w-8 xl:hidden" aria-label="Previous words">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/></svg>
                                </button>

                                <div id="ddbPoolCount" class="inline-flex items-center gap-1 rounded-full border border-slate-200/70 bg-white/80 px-2 py-1 text-[10px] font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100 sm:gap-1.5 sm:px-3 sm:py-1.5 sm:text-xs">0/0</div>

                                <button id="ddbNextWordsBtn" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] sm:h-8 sm:w-8 xl:hidden" aria-label="Next words">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 1 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/></svg>
                                </button>
                            </div>

                            <div class="flex shrink-0 items-center justify-end gap-1 sm:gap-2">
                                <button id="ddbCheckAnswersBtn" type="button" class="inline-flex items-center justify-center rounded-lg border border-white/20 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-2 py-1.5 text-[11px] font-black leading-none text-white shadow-[0_10px_24px_rgba(79,70,229,.10)] transition hover:scale-[1.02] disabled:cursor-not-allowed disabled:opacity-40 sm:px-3 sm:py-2 sm:text-xs">
                                    <span class="sm:hidden">Check</span>
                                    <span class="hidden sm:inline">Check answers</span>
                                </button>

                                <button id="ddbRevealAnswersBtn" type="button" class="inline-flex items-center justify-center rounded-lg border border-orange-200 bg-orange-100 px-2 py-1.5 text-[11px] font-black leading-none text-orange-900 shadow-[0_8px_22px_rgba(234,88,12,.10)] transition hover:scale-[1.02] disabled:cursor-not-allowed disabled:opacity-40 dark:border-orange-900/40 dark:bg-orange-950/40 dark:text-orange-200 sm:px-3 sm:py-2 sm:text-xs">
                                    <span class="sm:hidden">Reveal</span>
                                    <span class="hidden sm:inline">Reveal answers</span>
                                </button>

                                <button id="ddbRetakeTestBtn" type="button" class="hidden items-center justify-center rounded-lg border border-slate-200 bg-white px-2 py-1.5 text-[11px] font-black leading-none text-slate-900 shadow-[0_8px_22px_rgba(2,6,23,.05)] transition hover:scale-[1.02] dark:border-slate-700 dark:bg-slate-800 dark:text-white sm:px-3 sm:py-2 sm:text-xs">
                                    <span class="sm:hidden">Retake</span>
                                    <span class="hidden sm:inline">Retake test</span>
                                </button>
                            </div>
                        </div>

                        <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>
                        <div id="ddbPoolContent" class="mt-3 flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 xl:w-full"></div>
                    </div>
                </div>
                </div>
            </section>

            <section class="grid gap-4 lg:grid-cols-2 lg:items-start">
                <div id="ticketBoothDialogueCard" class="overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/80 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/70">
                    <div class="space-y-4 px-3 py-3 sm:px-4 sm:py-3.5">
                        @include('slider.components.audio-player')

                        <div class="rounded-[1.2rem] border border-slate-200/70 bg-white/70 px-3 py-3 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/25">
                            <div class="flex flex-col gap-2.5">
                                @foreach($sentenceItems as $item)
                                    <div class="w-full max-w-full">
                                        <div class="flex w-full max-w-full items-stretch gap-2 px-1.5 py-0.5 text-base font-semibold leading-[1.45] text-slate-900 sm:gap-3 sm:text-lg lg:text-[1.15rem] dark:text-slate-100">
                                            @foreach($item['tokens'] as $token)
                                                @if($token['type'] === 'html')
                                                    <span class="inline-flex shrink-0 items-center">{!! $token['value'] !!}</span>
                                                @else
                                                    <span
                                                        class="ddb-blank-slot flex min-h-[50px] w-full flex-1 items-center justify-center rounded-xl border border-dashed border-slate-300/90 bg-white/70 px-2 py-2 text-slate-700 transition-colors duration-200 dark:border-slate-600/70 dark:bg-slate-900/25 dark:text-slate-200"
                                                        data-blank="{{ $token['id'] }}"
                                                        data-answer-index="{{ $token['answer_index'] }}"
                                                        data-accept="{{ $token['answer'] }}"
                                                        data-width-mode="full"
                                                    ></span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-[1.2rem] border border-slate-200/80 bg-gradient-to-br from-stone-50 via-white to-slate-100 px-4 py-4 shadow-sm dark:border-slate-700/70 dark:bg-gradient-to-br dark:from-slate-900 dark:via-slate-900 dark:to-slate-800">
                    @if($writingTitle !== '')
                        <h3 class="text-base font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">{{ $writingTitle }}</h3>
                    @endif

                    @if($writingSubtitle !== '' || !empty($writingExamples))
                        <div class="mt-3 rounded-2xl border border-slate-200/80 bg-white/85 px-3 py-3 text-sm leading-6 text-slate-700 shadow-inner dark:border-slate-700/70 dark:bg-slate-950/70 dark:text-slate-200">
                            @if($writingSubtitle !== '')
                                <p class="font-black text-slate-800 dark:text-slate-100">{{ $writingSubtitle }}</p>
                            @endif

                            @foreach($writingExamples as $example)
                                <p>{{ $example }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if($writingInputCount > 0)
                        <div class="mt-4 space-y-3">
                            @foreach(range(1, $writingInputCount) as $inputIndex)
                                <input type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm outline-none transition focus:border-slate-400 focus:ring-2 focus:ring-slate-200 dark:border-slate-600 dark:bg-slate-950/90 dark:text-slate-100 dark:focus:border-slate-500 dark:focus:ring-slate-500/20">
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

            @include('slider.components.game-win-modal', ['modalActions' => $modalActions])
        </div>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            var ANSWERS = @json($answersForJs);
            var DESKTOP_LAYOUT_BREAKPOINT = Number(@json($desktopLayoutBreakpoint));
            var TILE_CLASS = @json($tileClass);
            var SFX = {
                enabled: true,
                sources: {
                    correct: @json($content['sfx']['correct'] ?? '/slider/sounds/correct.wav'),
                    wrong: @json($content['sfx']['wrong'] ?? '/slider/sounds/wrong.wav'),
                    success: @json($content['sfx']['success'] ?? '/slider/sounds/success.wav')
                },
                volume: { correct: 1, wrong: 1, success: 1 }
            };

            var audio = {
                correct: new Audio(SFX.sources.correct),
                wrong: new Audio(SFX.sources.wrong),
                success: new Audio(SFX.sources.success)
            };

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

            function playWrong() { play(audio.wrong); }
            function playWin() { play(audio.success); }

            function normalizeAnswerText(value) {
                return String(value || '').replace(/\s+/g, ' ').trim();
            }

            function isEmbedded() {
                try { return window.top !== window.self; }
                catch (error) { return true; }
            }

            window.dragDropBlanksGoNext = function () {
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
            };

            window.stopSlideAudio = function () {
                Object.keys(audio).forEach(function(key) {
                    if (audio[key]) {
                        audio[key].pause();
                        audio[key].currentTime = 0;
                    }
                });

                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }
            };

            function TicketBoothGame() {
                this.poolRail = document.getElementById('ddbPoolRail');
                this.poolBar = document.getElementById('ddbPoolBar');
                this.poolContent = document.getElementById('ddbPoolContent');
                this.poolCount = document.getElementById('ddbPoolCount');
                this.prevWordsBtn = document.getElementById('ddbPrevWordsBtn');
                this.nextWordsBtn = document.getElementById('ddbNextWordsBtn');
                this.checkAnswersBtn = document.getElementById('ddbCheckAnswersBtn');
                this.revealAnswersBtn = document.getElementById('ddbRevealAnswersBtn');
                this.retakeTestBtn = document.getElementById('ddbRetakeTestBtn');
                this.restartBtnModal = document.getElementById('restartBtnModal');
                this.continueBtnModal = document.getElementById('continueBtnModal');
                this.winModal = document.getElementById('winModal');

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this.dragFrame = null;
                this.dragX = 0;
                this.dragY = 0;
                this.poolStickyTimer = null;

                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.timerInt = null;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.hasCheckedAnswers = false;

                this.tileDeck = { all: [], active: [], waiting: [], history: [] };
                this.tileSkins = [
                    'bg-gradient-to-br from-sky-500 to-blue-600',
                    'bg-gradient-to-br from-rose-500 to-fuchsia-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-indigo-500 to-violet-600',
                    'bg-gradient-to-br from-cyan-500 to-sky-600'
                ];

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handleResize = this.handleResize.bind(this);
                this.handleScroll = this.handleScroll.bind(this);
                this.showPrevWords = this.showPrevWords.bind(this);
                this.showNextWords = this.showNextWords.bind(this);
                this.handleCheckAnswers = this.handleCheckAnswers.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);

                this.bindEvents();
            }

            TicketBoothGame.prototype.bindEvents = function() {
                if (this.prevWordsBtn) this.prevWordsBtn.addEventListener('click', this.showPrevWords);
                if (this.nextWordsBtn) this.nextWordsBtn.addEventListener('click', this.showNextWords);
                if (this.checkAnswersBtn) this.checkAnswersBtn.addEventListener('click', this.handleCheckAnswers);
                if (this.revealAnswersBtn) this.revealAnswersBtn.addEventListener('click', this.handleRevealAnswers);
                if (this.retakeTestBtn) this.retakeTestBtn.addEventListener('click', this.handleRetakeTest);
                if (this.restartBtnModal) this.restartBtnModal.addEventListener('click', this.handleRetakeTest);
                if (this.continueBtnModal) this.continueBtnModal.addEventListener('click', window.dragDropBlanksGoNext);
                window.addEventListener('resize', this.handleResize, { passive: true });
                window.addEventListener('scroll', this.handleScroll, { passive: true });
                document.addEventListener('scroll', this.handleScroll, { passive: true, capture: true });
            };

            TicketBoothGame.prototype.getBlanks = function() {
                return Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot'));
            };

            TicketBoothGame.prototype.getFilledBlankCount = function() {
                return this.getBlanks().filter(function(blank) {
                    return !!blank.querySelector('.ddb-draggable-item');
                }).length;
            };

            TicketBoothGame.prototype.getRemainingTileCount = function() {
                return ANSWERS.length - this.getFilledBlankCount();
            };

            TicketBoothGame.prototype.formatElapsedTime = function() {
                var elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                var mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                var secs = String(elapsed % 60).padStart(2, '0');
                return mins + ':' + secs;
            };

            TicketBoothGame.prototype.updateTimer = function() {
                var timerEl = document.getElementById('gameTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            };

            TicketBoothGame.prototype.startTimer = function() {
                var self = this;

                clearInterval(this.timerInt);
                this.timerInt = setInterval(function() {
                    self.updateTimer();
                }, 1000);
                this.updateTimer();
            };

            TicketBoothGame.prototype.updateStats = function() {
                var progressEl = document.getElementById('tilesCount');
                var correctEl = document.getElementById('correctCount');
                var mistakesEl = document.getElementById('mistakesCount');
                var filled = this.getFilledBlankCount();

                if (progressEl) progressEl.textContent = filled + '/' + ANSWERS.length;
                if (correctEl) correctEl.textContent = String(this.correctCount);
                if (mistakesEl) mistakesEl.textContent = String(this.mistakeCount);
            };

            TicketBoothGame.prototype.updatePoolCount = function() {
                if (this.poolCount) {
                    this.poolCount.textContent = this.getRemainingTileCount() + '/' + ANSWERS.length;
                }
            };

            TicketBoothGame.prototype.updateNavButtons = function() {
                if (this.prevWordsBtn) this.prevWordsBtn.disabled = this.tileDeck.history.length === 0;
                if (this.nextWordsBtn) this.nextWordsBtn.disabled = this.tileDeck.waiting.length === 0;
            };

            TicketBoothGame.prototype.schedulePoolStickyUpdate = function(delay) {
                var self = this;

                clearTimeout(this.poolStickyTimer);
                this.poolStickyTimer = setTimeout(function() {
                    self.updatePoolSticky();
                }, typeof delay === 'number' ? delay : 120);
            };

            TicketBoothGame.prototype.getPoolStickyTop = function() {
                var width = window.innerWidth || document.documentElement.clientWidth || 0;
                if (width >= DESKTOP_LAYOUT_BREAKPOINT) return 16;
                if (width >= 640) return 12;
                return 8;
            };

            TicketBoothGame.prototype.updatePoolSticky = function() {
                var top;
                var railRect;
                var barHeight;

                if (!this.poolRail || !this.poolBar) return;

                top = this.getPoolStickyTop();
                railRect = this.poolRail.getBoundingClientRect();
                barHeight = Math.ceil(this.poolBar.offsetHeight || 0);

                if (railRect.top > top) {
                    this.poolRail.style.removeProperty('min-height');
                    this.poolBar.style.removeProperty('position');
                    this.poolBar.style.removeProperty('z-index');
                    this.poolBar.style.removeProperty('top');
                    this.poolBar.style.removeProperty('left');
                    this.poolBar.style.removeProperty('width');
                    return;
                }

                this.poolRail.style.minHeight = barHeight + 'px';
                this.poolBar.style.position = 'fixed';
                this.poolBar.style.zIndex = '1500';
                this.poolBar.style.top = top + 'px';
                this.poolBar.style.left = Math.round(railRect.left) + 'px';
                this.poolBar.style.width = Math.round(railRect.width) + 'px';
            };

            TicketBoothGame.prototype.updateActionButtons = function() {
                var allFilled = this.getRemainingTileCount() === 0;
                var canCheck = allFilled && !this.hasUsedReveal && !this.gameCompleted;
                var canReveal = !this.hasUsedReveal && !this.gameCompleted;

                if (this.checkAnswersBtn) {
                    this.checkAnswersBtn.disabled = !canCheck;
                    this.checkAnswersBtn.classList.toggle('hidden', this.hasUsedReveal || this.gameCompleted);
                    this.checkAnswersBtn.classList.toggle('inline-flex', !this.hasUsedReveal && !this.gameCompleted);
                }

                if (this.revealAnswersBtn) {
                    this.revealAnswersBtn.disabled = !canReveal;
                    this.revealAnswersBtn.classList.toggle('hidden', this.hasUsedReveal || this.gameCompleted);
                    this.revealAnswersBtn.classList.toggle('inline-flex', !this.hasUsedReveal && !this.gameCompleted);
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.classList.toggle('hidden', !this.hasUsedReveal);
                    this.retakeTestBtn.classList.toggle('inline-flex', this.hasUsedReveal);
                }
            };

            TicketBoothGame.prototype.getVisibleWordLimit = function() {
                var width = window.innerWidth || document.documentElement.clientWidth || 0;
                if (width >= DESKTOP_LAYOUT_BREAKPOINT) return Number.MAX_SAFE_INTEGER;
                if (width < 640) return 5;
                return 9;
            };

            TicketBoothGame.prototype.shuffle = function(items) {
                var copy = items.slice();
                var index;

                for (index = copy.length - 1; index > 0; index--) {
                    var swapIndex = Math.floor(Math.random() * (index + 1));
                    var temp = copy[index];
                    copy[index] = copy[swapIndex];
                    copy[swapIndex] = temp;
                }

                return copy;
            };

            TicketBoothGame.prototype.createTileNode = function(itemData, index) {
                var self = this;
                var node = document.createElement('div');

                node.textContent = itemData.text;
                node.dataset.id = itemData.id;
                node.dataset.answerIndex = itemData.answerIndex;
                node.dataset.accept = itemData.text;
                node.className = [
                    'ddb-draggable-item',
                    'select-none',
                    'touch-none',
                    'cursor-grab',
                    'rounded-xl',
                    'border',
                    'border-white/20',
                    'text-white',
                    'shadow-[0_10px_20px_rgba(2,6,23,0.16)]',
                    'transition-transform',
                    'duration-150',
                    'hover:-translate-y-0.5',
                    'active:translate-y-0',
                    'inline-flex',
                    'min-h-[42px]',
                    'w-auto',
                    'max-w-full',
                    'shrink-0',
                    'items-center',
                    'justify-center',
                    'text-center',
                    'leading-snug',
                    'font-black',
                    TILE_CLASS
                ].join(' ');

                this.tileSkins[index % this.tileSkins.length].split(' ').forEach(function(className) {
                    node.classList.add(className);
                });

                node.style.touchAction = 'none';
                node.addEventListener('pointerdown', function(event) {
                    self.handlePointerDown(event, node);
                });

                return node;
            };

            TicketBoothGame.prototype.ensureActiveTileCount = function() {
                var desired = this.getVisibleWordLimit();

                while (this.tileDeck.active.length < desired && this.tileDeck.waiting.length > 0) {
                    this.tileDeck.active.push(this.tileDeck.waiting.shift());
                }

                while (this.tileDeck.active.length > desired) {
                    this.tileDeck.waiting.unshift(this.tileDeck.active.pop());
                }
            };

            TicketBoothGame.prototype.renderActiveTiles = function() {
                var self = this;

                this.poolContent.innerHTML = '';

                this.tileDeck.active.forEach(function(itemData, index) {
                    self.poolContent.appendChild(self.createTileNode(itemData, index));
                });

                this.updateNavButtons();
                this.updatePoolCount();
                this.updatePoolSticky();
                this.schedulePoolStickyUpdate();
            };

            TicketBoothGame.prototype.loadTiles = function() {
                this.tileDeck.all = this.shuffle(ANSWERS);
                this.tileDeck.active = [];
                this.tileDeck.waiting = this.tileDeck.all.slice();
                this.tileDeck.history = [];
                this.ensureActiveTileCount();
                this.renderActiveTiles();
            };

            TicketBoothGame.prototype.showNextWords = function() {
                var desired = this.getVisibleWordLimit();

                if (this.draggedItem || this.tileDeck.waiting.length === 0) return;

                this.tileDeck.history.push(this.tileDeck.active.slice());

                while (this.tileDeck.active.length > 0) {
                    this.tileDeck.waiting.push(this.tileDeck.active.shift());
                }

                while (this.tileDeck.active.length < desired && this.tileDeck.waiting.length > 0) {
                    this.tileDeck.active.push(this.tileDeck.waiting.shift());
                }

                this.renderActiveTiles();
            };

            TicketBoothGame.prototype.showPrevWords = function() {
                if (this.draggedItem || this.tileDeck.history.length === 0) return;

                while (this.tileDeck.active.length > 0) {
                    this.tileDeck.waiting.unshift(this.tileDeck.active.pop());
                }

                this.tileDeck.active = this.tileDeck.history.pop();
                this.renderActiveTiles();
            };

            TicketBoothGame.prototype.handleResize = function() {
                if (this.draggedItem) return;
                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.schedulePoolStickyUpdate();
            };

            TicketBoothGame.prototype.handleScroll = function() {
                this.updatePoolSticky();
            };

            TicketBoothGame.prototype.resetBlankState = function(blank) {
                blank.classList.remove(
                    'ring-2',
                    'ring-indigo-500/40',
                    'bg-indigo-50/60',
                    'dark:bg-indigo-500/10',
                    'scale-[1.02]',
                    'border-emerald-500/55',
                    'bg-emerald-50/90',
                    'dark:bg-emerald-950/35',
                    'dark:border-emerald-500/45',
                    'border-rose-500/55',
                    'bg-rose-50/90',
                    'dark:bg-rose-950/30',
                    'dark:border-rose-500/40'
                );
            };

            TicketBoothGame.prototype.setBlankState = function(blank, state) {
                this.resetBlankState(blank);

                if (state === 'correct') {
                    blank.classList.add('border-emerald-500/55', 'bg-emerald-50/90', 'dark:bg-emerald-950/35', 'dark:border-emerald-500/45');
                } else if (state === 'wrong') {
                    blank.classList.add('border-rose-500/55', 'bg-rose-50/90', 'dark:bg-rose-950/30', 'dark:border-rose-500/40');
                }
            };

            TicketBoothGame.prototype.normalizeTileForBlank = function(tile, blank) {
                var shouldFillWidth = blank && blank.dataset.widthMode === 'full';

                tile.classList.remove(
                    'hover:-translate-y-0.5',
                    'ring-2',
                    'ring-emerald-400/70',
                    'ring-rose-400/70',
                    'border-rose-300',
                    'bg-rose-50',
                    'text-rose-700',
                    'dark:bg-rose-900/25',
                    'dark:border-rose-900/40',
                    'dark:text-rose-200',
                    'w-fit',
                    'w-full'
                );

                tile.classList.add('inline-flex', 'max-w-full', 'items-center', 'justify-center', 'text-center', 'px-2', 'py-1.5', 'leading-tight', 'rounded-lg');
                tile.classList.add(shouldFillWidth ? 'w-full' : 'w-fit');
                tile.style.cursor = this.gameCompleted || this.hasUsedReveal ? 'default' : 'grab';
            };

            TicketBoothGame.prototype.setTileState = function(tile, state) {
                tile.classList.remove(
                    'ring-2',
                    'ring-emerald-400/70',
                    'ring-rose-400/70',
                    'border-rose-300',
                    'bg-rose-50',
                    'text-rose-700',
                    'dark:bg-rose-900/25',
                    'dark:border-rose-900/40',
                    'dark:text-rose-200'
                );

                if (state === 'correct') {
                    tile.classList.add('ring-2', 'ring-emerald-400/70');
                } else if (state === 'wrong') {
                    tile.classList.add('ring-2', 'ring-rose-400/70', 'border-rose-300', 'bg-rose-50', 'text-rose-700', 'dark:bg-rose-900/25', 'dark:border-rose-900/40', 'dark:text-rose-200');
                }
            };

            TicketBoothGame.prototype.clearCheckedFeedback = function() {
                var self = this;

                this.getBlanks().forEach(function(blank) {
                    self.setBlankState(blank, null);

                    var tile = blank.querySelector('.ddb-draggable-item');
                    if (tile) {
                        self.normalizeTileForBlank(tile, blank);
                    }
                });

                this.correctCount = 0;
                this.hasCheckedAnswers = false;
                this.updateStats();
            };

            TicketBoothGame.prototype.handlePointerDown = function(event, item) {
                var rect;

                if (this.gameCompleted || this.hasUsedReveal) return;
                if (this.hasCheckedAnswers) this.clearCheckedFeedback();

                event.preventDefault();
                if (item.setPointerCapture) item.setPointerCapture(event.pointerId);

                this.draggedItem = item;
                this.originalParent = item.parentElement;

                rect = item.getBoundingClientRect();
                this.placeholder = document.createElement('div');
                this.placeholder.className = 'rounded-xl border border-dashed border-slate-300/80 bg-slate-200/35 dark:border-slate-700/70 dark:bg-slate-800/30';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';
                this.originalParent.insertBefore(this.placeholder, item);

                item.style.position = 'fixed';
                item.style.left = rect.left + 'px';
                item.style.top = rect.top + 'px';
                item.style.width = rect.width + 'px';
                item.style.zIndex = '9999';
                item.style.pointerEvents = 'none';
                item.style.transform = 'scale(1.05) rotate(-2deg)';

                this.offsetX = event.clientX - rect.left;
                this.offsetY = event.clientY - rect.top;

                document.body.appendChild(item);
                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
                document.addEventListener('pointercancel', this.handlePointerUp, { passive: false });
            };

            TicketBoothGame.prototype.handlePointerMove = function(event) {
                var self = this;

                if (!this.draggedItem) return;

                event.preventDefault();
                this.dragX = event.clientX - this.offsetX;
                this.dragY = event.clientY - this.offsetY;

                if (!this.dragFrame) {
                    this.dragFrame = requestAnimationFrame(function() {
                        if (!self.draggedItem) {
                            self.dragFrame = null;
                            return;
                        }

                        self.draggedItem.style.left = self.dragX + 'px';
                        self.draggedItem.style.top = self.dragY + 'px';
                        self.dragFrame = null;
                    });
                }

                this.highlightBlank(event.clientX, event.clientY);
            };

            TicketBoothGame.prototype.handlePointerUp = function(event) {
                var blank;

                if (!this.draggedItem) return;

                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerUp);

                if (this.dragFrame) {
                    cancelAnimationFrame(this.dragFrame);
                    this.dragFrame = null;
                }

                blank = this.getBlankTarget(event.clientX, event.clientY);

                if (blank) this.handlePlaceDrop(blank);
                else this.returnDraggedItem();

                this.draggedItem = null;
            };

            TicketBoothGame.prototype.highlightBlank = function(x, y) {
                var blank = this.getBlankTarget(x, y);
                var self = this;

                this.getBlanks().forEach(function(target) {
                    self.resetBlankState(target);
                });

                if (blank) {
                    blank.classList.add('ring-2', 'ring-indigo-500/40', 'bg-indigo-50/60', 'dark:bg-indigo-500/10', 'scale-[1.02]');
                }
            };

            TicketBoothGame.prototype.getBlankTarget = function(x, y) {
                var dragged = this.draggedItem;
                var below;

                if (!dragged) return null;

                dragged.hidden = true;
                below = document.elementFromPoint(x, y);
                dragged.hidden = false;

                return below ? below.closest('.ddb-blank-slot') : null;
            };

            TicketBoothGame.prototype.removeActiveTileById = function(id) {
                this.tileDeck.active = this.tileDeck.active.filter(function(item) { return item.id !== id; });
                this.tileDeck.history = this.tileDeck.history
                    .map(function(page) { return page.filter(function(item) { return item.id !== id; }); })
                    .filter(function(page) { return page.length > 0; });
                this.tileDeck.waiting = this.tileDeck.waiting.filter(function(item) { return item.id !== id; });
            };

            TicketBoothGame.prototype.lockTileIntoBlank = function(item, blank) {
                var shouldFillWidth = blank.dataset.widthMode === 'full';

                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.pointerEvents = '';
                item.style.transform = '';

                blank.innerHTML = '';
                blank.appendChild(item);
                blank.style.width = shouldFillWidth ? '100%' : '';
                this.normalizeTileForBlank(item, blank);
                this.resetBlankState(blank);
            };

            TicketBoothGame.prototype.handlePlaceDrop = function(blank) {
                var item = this.draggedItem;
                var sourceBlank = this.originalParent && this.originalParent.classList.contains('ddb-blank-slot') ? this.originalParent : null;
                var existingItem = blank.querySelector('.ddb-draggable-item');
                var tileId = item.dataset.id;

                this.getBlanks().forEach(this.resetBlankState.bind(this));

                if (this.placeholder && this.placeholder.parentNode) this.placeholder.remove();
                this.placeholder = null;

                if (blank === sourceBlank) {
                    this.lockTileIntoBlank(item, blank);
                    this.updateStats();
                    this.updateActionButtons();
                    return;
                }

                if (existingItem && sourceBlank && sourceBlank !== blank) {
                    sourceBlank.innerHTML = '';
                    blank.innerHTML = '';
                    this.lockTileIntoBlank(existingItem, sourceBlank);
                    this.lockTileIntoBlank(item, blank);
                    this.updatePoolCount();
                    this.updateStats();
                    this.updateActionButtons();
                    return;
                }

                if (existingItem) {
                    this.returnDraggedItem();
                    return;
                }

                this.lockTileIntoBlank(item, blank);

                if (!sourceBlank) {
                    this.removeActiveTileById(tileId);
                    this.ensureActiveTileCount();
                    this.renderActiveTiles();
                } else {
                    this.updatePoolCount();
                }

                this.updateStats();
                this.updateActionButtons();
            };

            TicketBoothGame.prototype.returnDraggedItem = function() {
                var item = this.draggedItem;
                var placeholderRect;

                if (!item) return;

                if (this.placeholder) {
                    placeholderRect = this.placeholder.getBoundingClientRect();
                    item.style.transition = 'top .3s ease, left .3s ease, transform .3s ease';
                    item.style.left = placeholderRect.left + 'px';
                    item.style.top = placeholderRect.top + 'px';
                    item.style.transform = 'scale(1)';
                }

                setTimeout(function() {
                    item.style.transition = '';
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.pointerEvents = '';
                    item.style.transform = '';
                }, 320);

                if (this.originalParent && this.placeholder) {
                    this.originalParent.insertBefore(item, this.placeholder);
                    this.placeholder.remove();
                }

                this.placeholder = null;
                this.getBlanks().forEach(this.resetBlankState.bind(this));
            };

            TicketBoothGame.prototype.handleCheckAnswers = function() {
                var self = this;
                var hasWrong = false;

                if (this.draggedItem || this.gameCompleted || this.hasUsedReveal) return;
                if (this.getRemainingTileCount() > 0) return;

                this.correctCount = 0;

                this.getBlanks().forEach(function(blank) {
                    var item = blank.querySelector('.ddb-draggable-item');
                    var expectedIndex = Number(blank.dataset.answerIndex || 0);
                    var gotIndex = item ? Number(item.dataset.answerIndex || 0) : 0;
                    var expectedText = normalizeAnswerText(blank.dataset.accept || '');
                    var gotText = item ? normalizeAnswerText(item.dataset.accept || item.textContent || '') : '';
                    var isCorrect = !!item && (((expectedIndex && gotIndex === expectedIndex) || (expectedText && expectedText === gotText)));

                    self.setBlankState(blank, isCorrect ? 'correct' : 'wrong');

                    if (item) {
                        self.normalizeTileForBlank(item, blank);
                        self.setTileState(item, isCorrect ? 'correct' : 'wrong');
                    }

                    if (isCorrect) {
                        self.correctCount += 1;
                    } else {
                        hasWrong = true;
                    }
                });

                this.hasCheckedAnswers = true;

                if (hasWrong) {
                    playWrong();
                    this.mistakeCount += 1;
                } else {
                    this.gameCompleted = true;
                    playWin();
                    clearInterval(this.timerInt);
                    this.poolContent.innerHTML = '';
                    this.updatePoolCount();
                    this.updateActionButtons();

                    var finalCorrect = document.getElementById('finalCorrect');
                    var finalTime = document.getElementById('finalTime');
                    var finalMistakes = document.getElementById('finalMistakes');

                    if (finalCorrect) finalCorrect.textContent = this.correctCount + '/' + ANSWERS.length;
                    if (finalTime) finalTime.textContent = this.formatElapsedTime();
                    if (finalMistakes) finalMistakes.textContent = String(this.mistakeCount);
                    if (this.winModal) this.winModal.classList.remove('hidden');
                }

                this.updateStats();
            };

            TicketBoothGame.prototype.handleRevealAnswers = function() {
                var self = this;

                if (this.draggedItem || this.gameCompleted || this.hasUsedReveal) return;

                this.hasUsedReveal = true;
                this.hasCheckedAnswers = false;
                this.correctCount = ANSWERS.length;

                this.getBlanks().forEach(function(blank) {
                    var answerData = ANSWERS.find(function(answer) {
                        return Number(answer.answerIndex) === Number(blank.dataset.answerIndex || 0);
                    });
                    var item;

                    if (!answerData) return;

                    blank.innerHTML = '';
                    self.setBlankState(blank, null);

                    item = self.createTileNode(answerData, Number(answerData.answerIndex));
                    self.lockTileIntoBlank(item, blank);
                });

                this.poolContent.innerHTML = '';
                clearInterval(this.timerInt);
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
            };

            TicketBoothGame.prototype.handleRetakeTest = function() {
                if (this.winModal) this.winModal.classList.add('hidden');

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.hasCheckedAnswers = false;

                this.getBlanks().forEach(function(blank) {
                    blank.innerHTML = '';
                    blank.style.width = '';
                    blank.classList.remove(
                        'ring-2',
                        'ring-indigo-500/40',
                        'bg-indigo-50/60',
                        'dark:bg-indigo-500/10',
                        'scale-[1.02]',
                        'border-emerald-500/55',
                        'bg-emerald-50/90',
                        'dark:bg-emerald-950/35',
                        'dark:border-emerald-500/45',
                        'border-rose-500/55',
                        'bg-rose-50/90',
                        'dark:bg-rose-950/30',
                        'dark:border-rose-500/40'
                    );
                });

                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }

                this.loadTiles();
                this.startTimer();
                this.updateStats();
                this.updateActionButtons();
                this.updatePoolSticky();
                this.schedulePoolStickyUpdate();
            };

            document.addEventListener('DOMContentLoaded', function() {
                applyVolumes();
                window.ticketBoothGame = new TicketBoothGame();
                window.ticketBoothGame.handleRetakeTest();
            });
        })(); 
    </script>
@endsection
