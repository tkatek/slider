@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $gridClass = (string) ($content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4');
    $items = is_array($content['items'] ?? null) ? $content['items'] : [];

    $normalizeCols = static fn ($cols) => max(1, min(6, (int) $cols));

    $extractCols = static function (?string $breakpoint, string $classString, int $fallback) use ($normalizeCols) {
        $pattern = $breakpoint
            ? '/(?:^|\s)' . preg_quote($breakpoint, '/') . ':grid-cols-(\d+)/'
            : '/(?:^|\s)grid-cols-(\d+)/';

        if (preg_match($pattern, $classString, $match)) {
            return $normalizeCols($match[1]);
        }

        return $fallback;
    };

    $baseCols = $extractCols(null, $gridClass, 1);
    $smCols = $extractCols('sm', $gridClass, $baseCols);
    $lgCols = $extractCols('lg', $gridClass, $smCols);
    $xlCols = $extractCols('xl', $gridClass, $lgCols);

    $storageKey = 'missing-sign-words-' . md5(request()->path());
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        .missing-words-shell{
            min-height:100dvh;
            width:100%;
            overflow-x:hidden;
            font-family:"Plus Jakarta Sans", sans-serif;
            background:
                    linear-gradient(180deg, rgba(255,255,255,.65) 0%, rgba(248,250,252,.88) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(79,70,229,.08), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.08), transparent 55%);
        }

        .dark .missing-words-shell{
            background:
                    linear-gradient(180deg, rgba(2,6,23,.88) 0%, rgba(15,23,42,.96) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(99,102,241,.16), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.14), transparent 55%);
        }

        .missing-words-inner{
            min-height:100dvh;
            width:100%;
            max-width:1320px;
            margin:0 auto;
            padding:20px 16px 28px;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .missing-words-main{
            width:100%;
        }

        .top-actions{
            width:100%;
            max-width:80rem;
            margin:0 auto 16px;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:12px;
            flex-wrap:wrap;
        }

        .top-actions-buttons{
            display:flex;
            align-items:center;
            gap:.75rem;
            flex-wrap:wrap;
        }

        .mca-btn-primary{
            appearance:none;
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.55rem .85rem;
            font-size:.8rem;
            font-weight:900;
            color:#fff;
            border:1px solid rgba(255,255,255,.2);
            background:linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow:0 10px 24px rgba(79,70,229,.10);
            transition:transform .2s ease, box-shadow .2s ease, opacity .2s ease, background-color .2s ease;
        }

        .mca-btn-primary:hover{
            transform:scale(1.05);
        }

        .mca-btn-primary:active{
            transform:scale(.95);
        }

        .mca-btn-reveal{
            color:rgb(154 52 18);
            border-color:rgb(253 186 116);
            background:rgb(255 237 213);
            box-shadow:0 8px 22px rgba(234,88,12,.10);
        }

        .mca-btn-reveal:hover{
            background:rgb(254 215 170);
            box-shadow:0 10px 24px rgba(234,88,12,.14);
        }

        .dark .mca-btn-reveal{
            color:rgb(254 215 170);
            border-color:rgba(194, 65, 12, .45);
            background:rgba(154, 52, 18, .35);
        }

        .dark .mca-btn-reveal:hover{
            background:rgba(154, 52, 18, .5);
        }

        .mca-btn-check{
            background:linear-gradient(135deg, #4f46e5, #3b82f6);
            box-shadow:0 10px 24px rgba(59,130,246,.14);
        }

        .mca-btn-check:hover{
            box-shadow:0 12px 28px rgba(59,130,246,.20);
        }

        .mca-btn-secondary{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.55rem .85rem;
            font-size:.8rem;
            font-weight:900;
            color:rgb(15 23 42);
            border:1px solid rgb(226 232 240);
            background:#fff;
            box-shadow:0 8px 22px rgba(2,6,23,.05);
            transition:transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease, color .2s ease, border-color .2s ease;
        }

        .mca-btn-secondary:hover{
            transform:scale(1.05);
            background:rgb(248 250 252);
        }

        .mca-btn-secondary:active{
            transform:scale(.98);
        }

        .dark .mca-btn-secondary{
            color:rgb(241 245 249);
            border-color:rgba(71,85,105,.8);
            background:rgba(15,23,42,.92);
            box-shadow:0 8px 22px rgba(2,6,23,.18);
        }

        .dark .mca-btn-secondary:hover{
            background:rgba(30,41,59,.96);
        }

        .missing-words-grid{
            display:grid;
            width:100%;
            max-width:1240px;
            margin:0 auto;
            gap:14px;
            grid-template-columns:repeat(1, minmax(0, 1fr));
        }

        .missing-words-grid[data-base-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
        .missing-words-grid[data-base-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
        .missing-words-grid[data-base-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
        .missing-words-grid[data-base-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
        .missing-words-grid[data-base-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}

        .sign-word-card{
            display:flex;
            flex-direction:column;
            min-height:100%;
            border-radius:24px;
            border:1px solid rgba(217,226,241,.9);
            background:linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.94) 100%);
            box-shadow:0 12px 28px -24px rgba(15,23,42,.12);
            padding:16px;
            transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .dark .sign-word-card{
            border-color:rgba(71,85,105,.8);
            background:linear-gradient(180deg, rgba(15,23,42,.94) 0%, rgba(17,24,39,.94) 100%);
            box-shadow:0 12px 28px -24px rgba(2,6,23,.35);
        }

        .sign-word-card:hover{
            transform:translateY(-2px);
            border-color:rgba(99,102,241,.28);
            box-shadow:0 18px 40px -28px rgba(37,99,235,.18);
        }

        .sign-word-image-frame{
            min-height:180px;
            padding:8px;
            border-radius:18px;
            background:rgba(238,242,255,.72);
            border:1px solid rgba(199,210,254,.65);
        }

        .dark .sign-word-image-frame{
            background:rgba(30,41,59,.72);
            border-color:rgba(99,102,241,.18);
        }

        .sign-word-image{
            display:flex;
            align-items:center;
            justify-content:center;
            width:100%;
            height:100%;
            object-fit:contain;
        }

        .sign-word-image-empty{
            display:flex;
            align-items:center;
            justify-content:center;
            width:100%;
            min-height:170px;
            border-radius:16px;
            border:1px dashed rgba(148,163,184,.7);
            color:#94a3b8;
            font-size:.95rem;
            line-height:1.35;
            font-weight:800;
            text-align:center;
            padding:12px;
            background:rgba(255,255,255,.45);
        }

        .dark .sign-word-image-empty{
            border-color:rgba(100,116,139,.75);
            color:#94a3b8;
            background:rgba(15,23,42,.35);
        }

        .sign-word-answer{
            margin-top:14px;
            display:flex;
            align-items:center;
            gap:8px;
            flex-wrap:wrap;
            font-size:1.04rem;
            line-height:1.4;
            font-weight:900;
            color:#0f172a;
        }

        .dark .sign-word-answer{
            color:#f8fafc;
        }

        .sign-word-prefix,
        .sign-word-suffix{
            letter-spacing:.01em;
        }

        .sign-word-input{
            width:112px;
            min-width:112px;
            height:42px;
            border-radius:12px;
            border:1.5px solid #cbd5e1;
            background:rgba(255,255,255,.96);
            color:#0f172a;
            padding:8px 10px;
            font-size:1rem;
            line-height:1;
            font-weight:900;
            text-align:center;
            text-transform:uppercase;
            outline:none;
            transition:border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .sign-word-input:focus{
            border-color:#6366f1;
            box-shadow:0 0 0 4px rgba(99,102,241,.12);
        }

        .dark .sign-word-input{
            border-color:#334155;
            background:rgba(15,23,42,.98);
            color:#f8fafc;
        }

        .sign-word-input.is-correct{
            border-color:#16a34a;
            background:rgba(220,252,231,.9);
            color:#166534;
        }

        .sign-word-input.is-wrong{
            border-color:#dc2626;
            background:rgba(254,226,226,.95);
            color:#991b1b;
        }

        .dark .sign-word-input.is-correct{
            background:rgba(20,83,45,.34);
            color:#bbf7d0;
        }

        .dark .sign-word-input.is-wrong{
            background:rgba(127,29,29,.34);
            color:#fecaca;
        }

        .sign-word-result{
            min-width:22px;
            font-size:1.1rem;
            font-weight:900;
            line-height:1;
        }

        .sign-word-result.is-correct{
            color:#16a34a;
        }

        .sign-word-result.is-wrong{
            color:#dc2626;
        }

        .check-actions{
            display:flex;
            justify-content:center;
            margin-top:20px;
        }

        .check-btn{
            appearance:none;
            border:0;
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.6rem;
            min-width:190px;
            min-height:52px;
            padding:0 20px;
            border-radius:999px;
            background:linear-gradient(135deg, #4f46e5, #3b82f6);
            color:#fff;
            font-size:1rem;
            line-height:1;
            font-weight:900;
            box-shadow:0 18px 34px -20px rgba(79,70,229,.52);
            transition:transform .18s ease, box-shadow .18s ease, opacity .18s ease;
        }

        .check-btn:hover{
            transform:translateY(-1px);
            box-shadow:0 22px 40px -22px rgba(59,130,246,.52);
        }

        .check-btn:active{
            transform:translateY(0);
        }

        @media (min-width: 640px){
            .missing-words-inner{
                padding:24px 20px 32px;
            }

            .missing-words-grid{
                gap:16px;
            }

            .missing-words-grid[data-sm-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .missing-words-grid[data-sm-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .missing-words-grid[data-sm-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .missing-words-grid[data-sm-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .missing-words-grid[data-sm-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .missing-words-grid[data-sm-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1024px){
            .missing-words-grid{
                gap:18px;
            }

            .missing-words-grid[data-lg-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .missing-words-grid[data-lg-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .missing-words-grid[data-lg-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .missing-words-grid[data-lg-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .missing-words-grid[data-lg-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .missing-words-grid[data-lg-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1280px){
            .missing-words-grid[data-xl-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .missing-words-grid[data-xl-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .missing-words-grid[data-xl-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .missing-words-grid[data-xl-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .missing-words-grid[data-xl-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .missing-words-grid[data-xl-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (max-width: 639px){
            .sign-word-card{
                padding:14px;
                border-radius:24px;
            }

            .sign-word-image-frame{
                min-height:150px;
            }

            .sign-word-image{
                max-height:140px;
            }

            .sign-word-answer{
                font-size:.98rem;
            }

            .sign-word-input{
                width:96px;
                min-width:96px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="missing-words-shell">
        <div class="missing-words-inner">
            <main class="missing-words-main">
                <div class="header-spacing text-center space-y-6 my-8">
                    @if($title !== '')
                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $title }}
                            </span>
                        </h1>
                    @endif

                    @if($subtitle !== '')
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100 max-w-5xl mx-auto">
                            {{ $subtitle }}
                        </p>
                    @endif
                </div>

                <div id="statusRow" class="w-full max-w-3xl mx-auto rounded-3xl border border-slate-200/70 dark:border-slate-800 bg-transparent shadow-none overflow-hidden mb-4">
                    <div class="grid grid-cols-4">
                        <div class="px-2 py-2 sm:px-4 sm:py-4 border-r border-slate-200/70 dark:border-slate-800">
                            <div class="font-black text-xs sm:text-lg">
                                <span id="qCount">1/{{ count($items) }}</span>
                            </div>
                        </div>
                        <div class="px-2 py-2 sm:px-4 sm:py-4 border-r border-slate-200/70 dark:border-slate-800">
                            <div class="font-black text-xs sm:text-lg">
                                &#x2705; <span id="correctCount">0</span>
                            </div>
                        </div>
                        <div class="px-2 py-2 sm:px-4 sm:py-4 border-r border-slate-200/70 dark:border-slate-800">
                            <div class="font-black text-xs sm:text-lg">
                                &#x274C; <span id="mistakesCount">0</span>
                            </div>
                        </div>
                        <div class="px-2 py-2 sm:px-4 sm:py-4">
                            <div class="font-black text-xs sm:text-lg">
                                &#x23F1;&#xFE0F; <span id="timer">00:00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="top-actions">
                    <div class="top-actions-buttons">
                        <button type="button" class="mca-btn-primary mca-btn-reveal" id="btnRevealAnswers">Reveal answers</button>
                        <button type="button" class="mca-btn-secondary hidden" id="btnRetakeTest">Retake test</button>
                        <button type="button" class="mca-btn-primary mca-btn-check" id="checkAnswersBtn">Check Answers</button>
                    </div>
                </div>

                <section
                        class="missing-words-grid"
                        data-base-cols="{{ $baseCols }}"
                        data-sm-cols="{{ $smCols }}"
                        data-lg-cols="{{ $lgCols }}"
                        data-xl-cols="{{ $xlCols }}"
                >
                    @foreach($items as $index => $item)
                        @php
                            $fieldId = 'missing-word-' . $index;
                            $maxLength = mb_strlen((string) ($item['answer'] ?? ''));
                        @endphp

                        <article class="sign-word-card">
                            @if(!empty($item['image']))
                                <img
                                        src="{{ $item['image'] }}"
                                        alt="Sign {{ $item['number'] ?? ($index + 1) }}"
                                        loading="lazy"
                                        class="sign-word-image sign-word-image-frame"
                                />
                            @else
                                <div class="sign-word-image-empty sign-word-image-frame">Image not available</div>
                            @endif

                            <div class="sign-word-answer">
                                <span class="sign-word-prefix">{{ $item['prefix'] ?? '' }}</span>

                                <input
                                        id="{{ $fieldId }}"
                                        type="text"
                                        class="sign-word-input js-missing-word-input"
                                        maxlength="{{ $maxLength }}"
                                        placeholder="{{ $item['placeholder'] ?? '' }}"
                                        data-index="{{ $index }}"
                                        data-answer="{{ strtoupper($item['answer'] ?? '') }}"
                                        autocomplete="off"
                                        autocapitalize="characters"
                                        spellcheck="false"
                                />

                                <span class="sign-word-suffix">{{ $item['suffix'] ?? '' }}</span>
                                <span class="sign-word-result js-word-result" aria-live="polite"></span>
                            </div>
                        </article>
                    @endforeach
                </section>

            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = @json($storageKey);
            const inputs = Array.from(document.querySelectorAll('.js-missing-word-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const btnRevealAnswers = document.getElementById('btnRevealAnswers');
            const btnRetakeTest = document.getElementById('btnRetakeTest');
            const qCountEl = document.getElementById('qCount');
            const correctCountEl = document.getElementById('correctCount');
            const mistakesCountEl = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('timer');

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };

            Object.values(audio).forEach((sound) => {
                sound.preload = 'auto';
                sound.volume = 1;
            });

            const play = (sound) => {
                if (!sound) return;
                try {
                    sound.pause();
                    sound.currentTime = 0;
                    sound.play().catch(() => {});
                } catch (e) {}
            };

            let savedData = {};
            let wrongTries = 0;
            let startTime = Date.now();
            let timerInt = null;

            try {
                savedData = JSON.parse(localStorage.getItem(storageKey) || '{}') || {};
            } catch (e) {
                savedData = {};
            }

            const saveAll = () => {
                const payload = {};
                inputs.forEach((input) => {
                    payload[input.dataset.index] = input.value || '';
                });
                localStorage.setItem(storageKey, JSON.stringify(payload));
            };

            const normalizeValue = (value) => {
                return (value || '')
                    .toUpperCase()
                    .replace(/[^A-Z]/g, '');
            };

            const formatTime = (seconds) => {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            };

            const updateTimer = () => {
                if (!timerEl) return;
                timerEl.textContent = formatTime((Date.now() - startTime) / 1000);
            };

            const startTimer = () => {
                clearInterval(timerInt);
                updateTimer();
                timerInt = setInterval(updateTimer, 1000);
            };

            const clearFeedback = (input) => {
                const card = input.closest('.sign-word-card');
                const result = card.querySelector('.js-word-result');

                input.classList.remove('is-correct', 'is-wrong');
                result.textContent = '';
                result.classList.remove('is-correct', 'is-wrong');
            };

            const getCorrectTotal = () => {
                return inputs.filter((input) => input.classList.contains('is-correct')).length;
            };

            const updateStatusUI = () => {
                const correctTotal = getCorrectTotal();
                const nextQuestion = correctTotal >= inputs.length ? inputs.length : (correctTotal + 1);

                if (qCountEl) qCountEl.textContent = `${nextQuestion}/${inputs.length}`;
                if (correctCountEl) correctCountEl.textContent = String(correctTotal);
                if (mistakesCountEl) mistakesCountEl.textContent = String(wrongTries);
            };

            const updateActionButtons = ({ revealed = false } = {}) => {
                if (btnRevealAnswers) {
                    btnRevealAnswers.classList.toggle('hidden', revealed);
                }
                if (btnRetakeTest) {
                    btnRetakeTest.classList.toggle('hidden', !revealed);
                }
            };

            inputs.forEach((input) => {
                const index = input.dataset.index;
                const answer = (input.dataset.answer || '').toUpperCase();

                if (typeof savedData[index] === 'string') {
                    input.value = normalizeValue(savedData[index]).slice(0, answer.length);
                }

                input.addEventListener('input', () => {
                    input.value = normalizeValue(input.value).slice(0, answer.length);
                    clearFeedback(input);
                    saveAll();
                    updateStatusUI();
                });

                input.addEventListener('blur', () => {
                    input.value = normalizeValue(input.value).slice(0, answer.length);
                    saveAll();
                });
            });

            checkBtn.addEventListener('click', () => {
                let hasWrong = false;
                let hasCorrect = false;
                let allCorrect = true;

                inputs.forEach((input) => {
                    const userValue = normalizeValue(input.value);
                    const correctValue = (input.dataset.answer || '').toUpperCase();
                    const card = input.closest('.sign-word-card');
                    const result = card.querySelector('.js-word-result');

                    input.classList.remove('is-correct', 'is-wrong');
                    result.classList.remove('is-correct', 'is-wrong');

                    if (userValue !== '' && userValue === correctValue) {
                        input.classList.add('is-correct');
                        result.textContent = '\u2713';
                        result.classList.add('is-correct');
                        hasCorrect = true;
                    } else {
                        input.classList.add('is-wrong');
                        result.textContent = '\u2715';
                        result.classList.add('is-wrong');
                        hasWrong = true;
                        allCorrect = false;
                    }
                });

                if (hasWrong) {
                    wrongTries += 1;
                    play(audio.wrong);
                } else if (hasCorrect) {
                    play(audio.correct);
                }

                if (allCorrect) {
                    play(audio.success);
                    clearInterval(timerInt);
                }

                updateStatusUI();
                saveAll();
            });

            btnRevealAnswers?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    const correctValue = (input.dataset.answer || '').toUpperCase();
                    const card = input.closest('.sign-word-card');
                    const result = card.querySelector('.js-word-result');

                    input.value = correctValue;
                    input.classList.remove('is-wrong');
                    input.classList.add('is-correct');
                    result.textContent = '\u2713';
                    result.classList.remove('is-wrong');
                    result.classList.add('is-correct');
                });

                saveAll();
                updateStatusUI();
                updateActionButtons({ revealed: true });
                play(audio.success);
                clearInterval(timerInt);
            });

            btnRetakeTest?.addEventListener('click', () => {
                window.resetSlide?.();
            });

            updateActionButtons({ revealed: false });
            updateStatusUI();
            startTimer();

            window.resetSlide = () => {
                inputs.forEach((input) => {
                    input.value = '';
                    clearFeedback(input);
                });

                wrongTries = 0;
                startTime = Date.now();
                localStorage.removeItem(storageKey);
                updateActionButtons({ revealed: false });
                updateStatusUI();
                startTimer();
            };

            window.stopSlideAudio = () => {
                clearInterval(timerInt);
                Object.values(audio).forEach((sound) => {
                    try {
                        sound.pause();
                        sound.currentTime = 0;
                    } catch (e) {}
                });
            };
        });
    </script>
@endsection