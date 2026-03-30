<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEFR Placement Test Reader</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --bg: #faf9f7;
            --bg-secondary: #f3f1ed;
            --fg: #1a1916;
            --fg-muted: #6b6860;
            --accent: #1d5c5c;
            --accent-light: #2a8585;
            --accent-pale: #e8f2f2;
            --card: #ffffff;
            --border: #e5e2dc;
            --shadow: rgba(26, 25, 22, 0.08);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--fg);
            line-height: 1.6;
            min-height: 100vh;
            margin: 0;
        }

        h1, h2, h3, h4 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            line-height: 1.3;
        }

        .font-display { font-family: 'Fraunces', serif; }

        .bg-pattern {
            background-image:
                    radial-gradient(circle at 20% 50%, rgba(29, 92, 92, 0.03) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(29, 92, 92, 0.04) 0%, transparent 40%),
                    radial-gradient(circle at 60% 80%, rgba(180, 83, 9, 0.02) 0%, transparent 40%);
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 4px 24px var(--shadow), 0 1px 3px var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover { box-shadow: 0 8px 32px var(--shadow), 0 2px 6px var(--shadow); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 15px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
            font-family: inherit;
        }

        .btn:focus-visible {
            outline: 3px solid var(--accent-light);
            outline-offset: 2px;
        }

        .btn-primary {
            background: var(--accent);
            color: white;
        }

        .btn-primary:hover {
            background: var(--accent-light);
            transform: translateY(-1px);
        }

        .btn-primary:active { transform: translateY(0); }
        .btn-primary:disabled { background: #ccc; cursor: not-allowed; transform: none; }

        .btn-secondary {
            background: var(--accent-pale);
            color: var(--accent);
            border: 1px solid transparent;
        }

        .btn-secondary:hover { border-color: var(--accent); }

        .btn-outline {
            background: transparent;
            color: var(--fg);
            border: 2px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .btn-outline:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-small { padding: 8px 16px; font-size: 14px; }

        .input {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            border: 2px solid var(--border);
            border-radius: 10px;
            background: var(--card);
            color: var(--fg);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            font-family: inherit;
        }

        .input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px var(--accent-pale);
        }

        textarea.input { resize: vertical; min-height: 120px; }

        .option-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            background: var(--bg-secondary);
            border: 2px solid var(--border);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .option-item:hover {
            border-color: var(--accent-light);
            background: var(--accent-pale);
        }

        .option-item.selected {
            border-color: var(--accent);
            background: var(--accent-pale);
        }

        .option-item input {
            margin-top: 3px;
            width: 20px;
            height: 20px;
            accent-color: var(--accent);
        }

        .progress-track {
            height: 6px;
            background: var(--bg-secondary);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--accent-light));
            border-radius: 3px;
            transition: width 0.4s ease;
        }

        .section-tab {
            padding: 10px 20px;
            font-weight: 500;
            color: var(--fg-muted);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.15s ease;
            border: none;
            background: transparent;
            font-family: inherit;
            font-size: inherit;
        }

        .section-tab:hover {
            color: var(--fg);
            background: var(--bg-secondary);
        }

        .section-tab.active {
            color: var(--accent);
            background: var(--accent-pale);
            font-weight: 600;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { animation: fadeInUp 0.5s ease forwards; }

        .hidden { display: none !important; }

        @media (max-width: 640px) {
            .section-tab { white-space: nowrap; padding: 8px 14px; font-size: 14px; }
        }
    </style>
</head>
<body class="bg-pattern">
<header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-[var(--border)]">
    <div class="max-w-6xl mx-auto px-4 py-4">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="text-xl sm:text-2xl font-display text-[var(--accent)]">CEFR Placement Test</h1>
                <p class="text-sm text-[var(--fg-muted)] hidden sm:block">Comprehensive Language Assessment</p>
            </div>
        </div>
        <div class="mt-4" id="progressArea">
            <div class="flex items-center justify-between text-sm mb-2">
                <span id="progressLabel">Progress: 0%</span>
                <span id="timeRemaining" class="font-semibold text-[var(--accent)]">--:--</span>
            </div>
            <div class="progress-track">
                <div id="progressBar" class="progress-fill" style="width: 0%"></div>
            </div>
        </div>
    </div>
</header>

<main id="testContainer" class="max-w-6xl mx-auto px-4 py-6" data-test-id="{{$test->id}}" data-isRandom="{{$test->isRandom}}" data-test-trial="{{\App\Services\Constantes::TRIALTEST}}" data-note="{{$note??null}}" data-ids="{{$dataIds??null}}">
    <section id="welcomeScreen">
        <div class="card relative overflow-hidden max-w-4xl mx-auto p-6 sm:p-10">
            <div class="pointer-events-none absolute -top-16 -right-16 h-44 w-44 rounded-full bg-[var(--accent-pale)] opacity-80"></div>
            <div class="pointer-events-none absolute -bottom-20 -left-10 h-52 w-52 rounded-full bg-[var(--bg-secondary)] opacity-90"></div>

            <div class="relative">
                <div class="mb-8 text-center">
                    <span class="inline-flex items-center justify-center rounded-full bg-[var(--accent-pale)] p-4 text-[var(--accent)] mb-4">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                            <path d="M8 7h8M8 11h8M8 15h4"/>
                        </svg>
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-display mb-3">{{__('enroll.TipsForTakingATest')}}</h2>
                    <p class="text-base sm:text-lg text-[var(--fg-muted)] max-w-2xl mx-auto">
                        Please ensure you have at least one uninterrupted hour to complete the test. A stable internet connection and a quiet environment are required. Once you begin, you cannot pause or go back, and the test will be submitted automatically when finished.
                    </p>
                </div>

                <ul class="grid gap-3 sm:grid-cols-2 mb-8">
                    <li class="flex items-start gap-3 rounded-xl border border-[var(--border)] bg-[var(--bg-secondary)] px-4 py-3">
                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-[var(--accent)]"></span>
                        <span>Check your internet connection before starting a test.</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-xl border border-[var(--border)] bg-[var(--bg-secondary)] px-4 py-3">
                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-[var(--accent)]"></span>
                        <span>The test will save and submit automatically if you leave the test for any reason.</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-xl border border-[var(--border)] bg-[var(--bg-secondary)] px-4 py-3">
                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-[var(--accent)]"></span>
                        <span>You might double click to clear a previous answer choice.</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-xl border border-[var(--border)] bg-[var(--bg-secondary)] px-4 py-3">
                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-[var(--accent)]"></span>
                        <span>Navigate through questions using next/previous.</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-xl border border-[var(--border)] bg-[var(--bg-secondary)] px-4 py-3 sm:col-span-2">
                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-[var(--accent)]"></span>
                        <span>When you’re finished click submit.</span>
                    </li>
                </ul>

                <div class="flex justify-center">
                    <button id="startTestBtn" class="btn btn-primary text-lg px-10 py-4" type="button">Begin Test</button>
                </div>
            </div>
        </div>
    </section>

    <section id="testInterface" class="hidden">
        <nav class="mb-6 overflow-x-auto" id="sectionNav">
            <div class="flex gap-2 min-w-max">
                @foreach($problems as $key=>$problem)
                    <button class="section-tab {{$key==0?'active':''}}" data-section="{{$problem->id}}" type="button">{{$key+1}}. {{$problem->label}}</button>
                @endforeach
            </div>
        </nav>

        <div id="sectionContainer">
            @foreach($problems as $key=>$problem)
                @foreach($problem->questions as $index=>$question)
                    <div class="question-step {{ $index*$key === 0 ? '' : 'hidden' }}" data-step="{{ $index*$key }}" data-section="{{ $problem->id }}">
                        <div class="card p-6 sm:p-8 animate-fade-in">
                            <p class="mb-4">
                                <span class="inline-flex items-center rounded-full bg-[var(--accent-pale)] px-3 py-1 text-sm font-semibold text-[var(--accent)]">
                                    {{ $question->note }} {{ $question->note === 1 ? 'point' : 'points' }}
                                </span>
                            </p>
                            @if($problem->title)
                                <div class="p-4 bg-[var(--bg-secondary)] rounded-lg mb-6 text-sm leading-relaxed">{!! nl2br($problem->title) !!}</div>
                            @endif
                            @if($problem->hasMedia('audio'))
                                <div class="mb-6">
                                    <audio controls controlslist="nodownload noplaybackrate" oncontextmenu="return false;" preload="none" class="w-full">
                                        <source src="{{ $problem->getFirstMediaUrl('audio') }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                            @if($question->hasMedia('audio'))
                                <div class="mb-6">
                                    <audio controls controlslist="nodownload noplaybackrate" oncontextmenu="return false;" preload="none" class="w-full">
                                        <source src="{{ $question->getFirstMediaUrl('audio') }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                            @if($question->type_question_id!=12)
                                <p class="text-lg font-medium mb-4">{!! nl2br($question->title) !!}</p>
                            @else
                                {{--
                                    fill in the blank / replace numbred variables with boxes to drag answers too

                                    backend submit /student/answerFillBlank/{question_id}/{test_id}
                                    the answer will be array exp: ["matter","runny","fever","should","Allergies"]
                                --}}
                                    <?php
                                    $answers=json_decode($question->correctResponse);
                                    shuffle($answers)
                                    ?>
                                <p class="text-lg font-medium mb-4">
                                    @foreach($answers as $answer)
                                        {{$answer}} |
                                    @endforeach
                                </p>
                                <p class="text-lg font-medium mb-4">{!! nl2br($question->title) !!}</p>

                            @endif
                            @if($question->type_question_id==13)
                                {{--
                                    Unscrumble
                                    backend submit /student/answerUnscramble/{question_id}/{test_id}
                                    the answer will be string exp: "I am going to go to the bank"
                                --}}
                                    <?php
                                    $sentance = $question->correctResponse;
                                    $answers=explode(" ",$sentance);
                                    shuffle($answers);
                                    ?>
                                <p class="text-lg font-medium mb-4">
                                    @foreach($answers as $answer)
                                        {{$answer}} |
                                    @endforeach
                                </p>
                            @endif
                            @if($question->type_question_id==1)
                                {{-- mcq --}}
                                @foreach($question->choices as $choice)
                                    <label class="option-item mb-2" tabindex="0" for="answer_{{$choice->id}}">
                                        <input type="{{$question->correct_choices_count>1?'checkbox':'radio'}}" id="answer_{{$choice->id}}" name="choice-id-{{$question->id}}" value="{{$choice->id}}">
                                        <span>{{ $choice->choice }}</span>
                                    </label>
                                @endforeach
                            @endif
                            @if(in_array($question->type_question_id,[4,10]))
                                {{--Writing editor--}}
                                <textarea id="writingResponse-{{$question->id}}" class="input min-h-[200px]" name="writing" placeholder="Type your response here..."></textarea>
                            @endif

                            @if($question->type_question_id==11)
                                {{--Speaking--}}
                                <div class="rounded-lg bg-[var(--bg-secondary)] p-4 sm:p-6">

                                    <div class="mx-auto flex w-full max-w-[460px] items-center justify-center gap-3">
                                        <span class="startRecordingBtn btn btn-secondary inline-flex cursor-pointer text-[var(--dark-blue)]">
                                             <svg class="svg-inline--fa fa-paper-plane fa-w-16" xmlns="http://www.w3.org/2000/svg" width="24"
                                                  height="24" viewBox="0 0 256 256">
                                                 <path fill="currentColor" d="M80 128V64a48 48 0 0 1 96 0v64a48 48 0 0 1-96 0Zm128 0a8 8 0 0 0-16 0a64 64 0 0 1-128 0a8 8 0 0 0-16 0a80.11 80.11 0 0 0 72 79.6V232a8 8 0 0 0 16 0v-24.4a80.11 80.11 0 0 0 72-79.6Z"/>
                                             </svg>
                                        </span>
                                        <div class="box_recorder hidden z-[3] w-full max-w-[460px] flex items-center justify-center rounded-[10px] border border-transparent bg-[var(--accent-pale)] px-3 py-2 sm:px-6 sm:py-3 text-[var(--accent)]">
                                            <div class="flex w-full items-center justify-between gap-2 sm:gap-3">
                                                <span class="removeRecordBtn inline-flex shrink-0 cursor-pointer text-[#ee6464]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M5 21V6H4V4h5V3h6v1h5v2h-1v15H5Zm2-2h10V6H7v13Zm2-2h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/>
                                                    </svg>
                                                </span>
                                                <div class="flex min-w-0 items-center gap-1.5 sm:gap-2.5">
                                                    <span class="effect_recorder inline-block h-[9px] w-[9px] animate-pulse rounded-full bg-red-500"></span>
                                                    <span class="timer_recorder ml-1 text-sm text-[var(--accent)] sm:ml-2.5 sm:text-base">
                                                        <span class="minute_recorder">00</span>
                                                        <span>:</span>
                                                        <span class="second_recorder">00</span>
                                                    </span>
                                                    <span class="text_recorder hidden h-[34px] text-[15px] tracking-[3px] text-[var(--fg-muted)] sm:inline-block sm:text-[17px]">............</span>
                                                </div>

                                                <span class="sendRecordBtn inline-flex shrink-0 cursor-pointer text-[var(--accent)]"  data-question-id="{{$question->id}}">
                                                    <svg class="svg-inline--fa fa-paper-plane fa-w-12" width="24" height="24" aria-hidden="true" focusable="false"
                                                         data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="audioPreview mx-auto mt-2.5 w-full max-w-[460px]"></div>
                                </div>
                            @endif



                        </div>


                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="flex justify-between mt-8">
            <button id="prevBtn" class="btn btn-outline" type="button">Previous</button>
            <button id="nextBtn" class="btn btn-primary" type="button">Next</button>
        </div>
    </section>
</main>
<div id="submitConfirmModal" class="hidden fixed inset-0 z-[80] flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="submitConfirmTitle">
    <div class="absolute inset-0 bg-black/40" data-modal-close="true"></div>
    <div class="relative card w-full max-w-xl p-6 sm:p-8">
        <form id="testSubmitForm" action="{{($test->isRandom)?route('student.test.storeRandom',['test'=>$test->id]):route('student.test.store',['test'=>$test->id])}}" method="POST">
            @csrf
            <input type="hidden" name="timer_seconds" id="timerSecondsInput" value="0">
            <input type="hidden" name="speaking_recorded" id="speakingRecordedInput" value="0">
            <h3 id="submitConfirmTitle" class="text-2xl font-display mb-3">Submit Test</h3>
            <p class="text-[var(--fg-muted)] mb-8">
                Are you sure you want to send the exam for automatic grading? Once you send it, you can't go back and make changes.
            </p>
            <div class="flex flex-col-reverse sm:flex-row gap-3 sm:justify-end">
                <button id="continueExamBtn" class="btn btn-outline" type="button">Continue Exams</button>
                <button id="confirmSubmitBtn" class="btn btn-primary" type="button">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    const CONFIG = { totalTime: 70 };
    const state = {
        globalStep: 0,
        timerSeconds: 0,
        timerRunning: false,
        submitted: false,
        multiChoiceSnapshots: {},
        writingSnapshots: {}
    };

    let timerInterval = null;

    function formatTime(seconds) {
        const h = Math.floor(seconds / 3600);
        const m = Math.floor((seconds % 3600) / 60);
        const s = seconds % 60;
        return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
    }

    function getSteps() {
        return Array.from(document.querySelectorAll('.question-step'));
    }

    function pauseAllAudio() {
        document.querySelectorAll('audio').forEach(audio => {
            audio.pause();
        });
    }

    function showSubmitModal() {
        const modal = document.getElementById('submitConfirmModal');
        const continueBtn = document.getElementById('continueExamBtn');
        if (!modal) return;
        pauseAllAudio();
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        if (continueBtn) continueBtn.focus();
    }

    function hideSubmitModal() {
        const modal = document.getElementById('submitConfirmModal');
        if (!modal) return;
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    function attachAudioRestrictions() {
        document.querySelectorAll('audio').forEach(audio => {
            audio.playbackRate = 1;
            audio.defaultPlaybackRate = 1;
            audio.addEventListener('ratechange', () => {
                if (audio.playbackRate !== 1) {
                    audio.playbackRate = 1;
                }
            });
            audio.addEventListener('contextmenu', event => {
                event.preventDefault();
            });
        });
    }

    function getTotalTimeSeconds() {
        if (CONFIG.totalTime === null) return null;
        const minutes = Number(CONFIG.totalTime);
        if (!Number.isFinite(minutes) || minutes < 0) return null;
        return Math.floor(minutes * 60);
    }

    function startTimer() {
        if (timerInterval) clearInterval(timerInterval);
        state.timerRunning = true;
        const totalTimeSeconds = getTotalTimeSeconds();

        if (totalTimeSeconds !== null && state.timerSeconds >= totalTimeSeconds) {
            state.timerSeconds = totalTimeSeconds;
            updateTimerDisplay();
            submitTest();
            return;
        }

        timerInterval = setInterval(() => {
            state.timerSeconds++;
            if (totalTimeSeconds !== null && state.timerSeconds >= totalTimeSeconds) {
                state.timerSeconds = totalTimeSeconds;
                updateTimerDisplay();
                submitTest();
                return;
            }
            updateTimerDisplay();
        }, 1000);
    }

    function updateTimerDisplay() {
        const remDisplay = document.getElementById('timeRemaining');
        if (!remDisplay) return;

        const totalTimeSeconds = getTotalTimeSeconds();
        if (totalTimeSeconds === null) {
            remDisplay.textContent = '∞';
            return;
        }

        const totalRemaining = Math.max(totalTimeSeconds - state.timerSeconds, 0);
        remDisplay.textContent = formatTime(totalRemaining);
    }

    function updateProgress(total) {
        const pct = total > 0 ? Math.round(((state.globalStep + 1) / total) * 100) : 0;
        document.getElementById('progressBar').style.width = pct + '%';
        document.getElementById('progressLabel').textContent = `Progress: ${pct}%`;
    }

    function updateNavigationButtons(total) {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        prevBtn.disabled = state.globalStep === 0;
        nextBtn.textContent = state.globalStep >= total - 1 ? 'Submit Test' : 'Next';
    }

    function renderCurrentStep() {
        const steps = getSteps();
        const total = steps.length;
        const current = steps[state.globalStep];
        if (!current) return;

        pauseAllAudio();

        steps.forEach((stepEl, idx) => {
            stepEl.classList.toggle('hidden', idx !== state.globalStep);
        });

        document.querySelectorAll('.section-tab').forEach(tab => {
            tab.classList.toggle('active', tab.dataset.section === current.dataset.section);
        });

        updateNavigationButtons(total);
        updateProgress(total);
        updateTimerDisplay();
    }

    function attachOptionListeners() {
        document.querySelectorAll('.option-item input').forEach(input => {
            input.addEventListener('change', function() {
                const wrapper = this.closest('.option-item');
                if (!wrapper) return;

                if (this.type === 'checkbox') {
                    wrapper.classList.toggle('selected', this.checked);
                    return;
                }

                const name = this.name;
                document.querySelectorAll(`input[name="${name}"]`).forEach(inp => {
                    const optionWrapper = inp.closest('.option-item');
                    if (optionWrapper) {
                        optionWrapper.classList.toggle('selected', inp.checked);
                    }
                });
            });
        });
    }

    function attachSpeakingControls() {
        const speakingRecordedInput = document.getElementById('speakingRecordedInput');
        document.querySelectorAll('.record-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                if (speakingRecordedInput) speakingRecordedInput.value = '1';
            });
        });
    }

    function resetQuestionInputs() {
        document.querySelectorAll('#sectionContainer input[type="radio"]').forEach(input => {
            input.checked = false;
        });
        document.querySelectorAll('#sectionContainer input[type="checkbox"]').forEach(input => {
            input.checked = false;
        });
        document.querySelectorAll('#sectionContainer textarea').forEach(textarea => {
            textarea.value = '';
        });
    }

    async function submitTest() {
        if (state.submitted) return;
        state.submitted = true;
        if (timerInterval) clearInterval(timerInterval);
        pauseAllAudio();
        hideSubmitModal();
        document.getElementById('timerSecondsInput').value = String(state.timerSeconds || 0);
        await submitCurrentStepNavigableAnswers();
        document.getElementById('testSubmitForm').submit();
    }

    function init() {
        const steps = getSteps();
        const total = steps.length;

        attachOptionListeners();
        attachAudioRestrictions();
        attachSpeakingControls();

        document.querySelectorAll('.section-tab').forEach(tab => {
            tab.addEventListener('click', async () => {
                const targetSection = tab.dataset.section;
                const targetStep = steps.findIndex(step => step.dataset.section === targetSection);
                if (targetStep < 0 || targetStep === state.globalStep) return;

                const currentStep = steps[state.globalStep];
                const isChangingSection = currentStep && currentStep.dataset.section !== targetSection;
                if (isChangingSection) {
                    await submitCurrentStepNavigableAnswers();
                }

                state.globalStep = targetStep;
                renderCurrentStep();
            });
        });

        document.getElementById('startTestBtn').addEventListener('click', () => {
            const dataContainer = document.getElementById('testContainer');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const test = {
                id: dataContainer?.dataset.testId,
                isRandom: ['1', 'true', 'yes'].includes(String(dataContainer?.dataset.isRandom || '').toLowerCase())
            };

            if (test.isRandom) {

                fetch('/student/test/startRandomTest/' + test.id, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        note: dataContainer.dataset.note,
                        dataIds: JSON.stringify(JSON.parse(dataContainer.dataset.ids))
                    })
                });

            } else {

                fetch('/student/test/startTest/' + test.id, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({})
                });

            }

            document.getElementById('testSubmitForm').reset();
            document.getElementById('speakingRecordedInput').value = '0';
            resetQuestionInputs();
            document.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
            state.globalStep = 0;
            state.timerSeconds = 0;
            state.submitted = false;
            state.multiChoiceSnapshots = {};
            state.writingSnapshots = {};
            hideSubmitModal();
            document.getElementById('welcomeScreen').classList.add('hidden');
            document.getElementById('testInterface').classList.remove('hidden');
            renderCurrentStep();
            startTimer();
        });

        document.getElementById('prevBtn').addEventListener('click', async () => {
            if (state.globalStep > 0) {
                await submitCurrentStepNavigableAnswers();
                state.globalStep--;
                renderCurrentStep();
            }
        });

        document.getElementById('nextBtn').addEventListener('click', async () => {
            if (state.globalStep < total - 1) {
                await submitCurrentStepNavigableAnswers();
                state.globalStep++;
                renderCurrentStep();
            } else {
                await submitCurrentStepNavigableAnswers();
                showSubmitModal();
            }
        });

        const modal = document.getElementById('submitConfirmModal');
        const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
        const continueExamBtn = document.getElementById('continueExamBtn');

        if (confirmSubmitBtn) {
            confirmSubmitBtn.addEventListener('click', submitTest);
        }

        if (continueExamBtn) {
            continueExamBtn.addEventListener('click', hideSubmitModal);
        }

        if (modal) {
            modal.addEventListener('click', event => {
                const target = event.target;
                if (target instanceof HTMLElement && target.dataset.modalClose === 'true') {
                    hideSubmitModal();
                }
            });
        }

        document.addEventListener('keydown', event => {
            if (event.key !== 'Escape') return;
            const dialog = document.getElementById('submitConfirmModal');
            if (dialog && !dialog.classList.contains('hidden')) {
                hideSubmitModal();
            }
        });

        updateNavigationButtons(total);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
</script>
<script>
    function getCurrentStepMultiChoicePayload() {
        const steps = getSteps();
        const currentStep = steps[state.globalStep];
        if (!currentStep) return null;

        const choiceInput = currentStep.querySelector('input[name^="choice-id-"]');
        if (!choiceInput) return null;

        const match = choiceInput.name.match(/^choice-id-(\d+)$/);
        if (!match) return null;

        const questionId = match[1];
        const checkedInputs = currentStep.querySelectorAll(`input[name="choice-id-${questionId}"]:checked`);
        const answer = Array.from(checkedInputs).map(input => {
            const numericValue = Number(input.value);
            return Number.isNaN(numericValue) ? input.value : numericValue;
        });

        return { questionId, answer };
    }

    async function submitCurrentStepMultiChoiceAnswer() {
        const payload = getCurrentStepMultiChoicePayload();
        if (!payload) return;

        const snapshot = JSON.stringify(payload.answer);
        if (state.multiChoiceSnapshots[payload.questionId] === snapshot) return;

        const dataContainer = document.getElementById('testContainer');
        const testId = dataContainer?.dataset?.testId;
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        if (!testId) return;

        try {
            const response = await fetch(`/student/answerMultiChoice/${payload.questionId}/${testId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                },
                body: JSON.stringify({ answer: payload.answer })
            });

            if (response.ok) {
                state.multiChoiceSnapshots[payload.questionId] = snapshot;
            } else {
                console.error(`answerMultiChoice returned ${response.status} for question ${payload.questionId}`);
            }
        } catch (error) {
            console.error(`answerMultiChoice request failed for question ${payload.questionId}`, error);
        }
    }

    function getCurrentStepWritingPayload() {
        const steps = getSteps();
        const currentStep = steps[state.globalStep];
        if (!currentStep) return null;

        const textarea = currentStep.querySelector('textarea[id^="writingResponse-"]');
        if (!textarea) return null;

        const match = textarea.id.match(/^writingResponse-(\d+)$/);
        if (!match) return null;

        return {
            questionId: match[1],
            answer: textarea.value
        };
    }

    async function submitCurrentStepWritingAnswer() {
        const payload = getCurrentStepWritingPayload();
        if (!payload) return;

        const snapshot = payload.answer;
        if (state.writingSnapshots[payload.questionId] === snapshot) return;

        const dataContainer = document.getElementById('testContainer');
        const testId = dataContainer?.dataset?.testId;
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        if (!testId) return;

        try {
            const response = await fetch(`/student/answerEditor/${payload.questionId}/${testId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
                },
                body: JSON.stringify({ answer: payload.answer })
            });

            if (response.ok) {
                state.writingSnapshots[payload.questionId] = snapshot;
            } else {
                console.error(`answerEditor returned ${response.status} for question ${payload.questionId}`);
            }
        } catch (error) {
            console.error(`answerEditor request failed for question ${payload.questionId}`, error);
        }
    }

    async function submitCurrentStepNavigableAnswers() {
        await Promise.all([
            submitCurrentStepMultiChoiceAnswer(),
            submitCurrentStepWritingAnswer()
        ]);
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {


        const testContainer = document.getElementById('testContainer');
        const testId = testContainer.dataset.testId;
        const isRandom = testContainer.dataset.isRandom;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        let mediaRecorder;
        let mediaStream = null;
        let audioChunks = [];
        let timer = null;
        let seconds = 0;
        let audioBlob = null;
        let activeRecorderContext = null;

        function getRecorderContext(el) {
            const questionStep = el.closest(".question-step");
            if (!questionStep) return null;

            return {
                questionStep,
                startButton: questionStep.querySelector(".startRecordingBtn"),
                recorderBox: questionStep.querySelector(".box_recorder"),
                minuteSpan: questionStep.querySelector(".minute_recorder"),
                secondSpan: questionStep.querySelector(".second_recorder"),
                preview: questionStep.querySelector(".audioPreview")
            };
        }

        function updateTimer() {
            if (!activeRecorderContext || !activeRecorderContext.minuteSpan || !activeRecorderContext.secondSpan) return;
            const mins = String(Math.floor(seconds / 60)).padStart(2, '0');
            const secs = String(seconds % 60).padStart(2, '0');
            activeRecorderContext.minuteSpan.textContent = mins;
            activeRecorderContext.secondSpan.textContent = secs;
        }

        function startTimer() {
            seconds = 0;
            updateTimer();
            timer = setInterval(() => {
                seconds++;
                updateTimer();
            }, 1000);
        }

        function stopTimer() {
            clearInterval(timer);
            timer = null;
        }

        // START RECORDING
        document.querySelectorAll(".startRecordingBtn").forEach(btn => {
            btn.addEventListener("click", function () {
                const context = getRecorderContext(btn);
                if (!context || !context.recorderBox) return;

                activeRecorderContext = context;
                if (context.startButton) context.startButton.classList.add("hidden");
                if (context.preview) {
                    const existingPreviewHtml = context.preview.innerHTML.trim();
                    if (existingPreviewHtml) {
                        context.questionStep.dataset.previousPreviewHtml = existingPreviewHtml;
                    } else {
                        delete context.questionStep.dataset.previousPreviewHtml;
                    }
                    context.preview.classList.add("hidden");
                }
                context.recorderBox.classList.remove("hidden");
                audioChunks = [];

                navigator.mediaDevices.getUserMedia({ audio: true })
                    .then(stream => {
                        mediaStream = stream;

                        const mimeType =
                            MediaRecorder.isTypeSupported('audio/wav') ? 'audio/wav' :
                                MediaRecorder.isTypeSupported('audio/ogg') ? 'audio/ogg' :
                                    'audio/webm';

                        mediaRecorder = new MediaRecorder(stream, { mimeType });

                        mediaRecorder.ondataavailable = e => {
                            audioChunks.push(e.data);
                        };

                        mediaRecorder.start();
                        startTimer();
                    })
                    .catch(() => {
                        alert("Microphone access denied or not supported.");
                        if (context.startButton) context.startButton.classList.remove("hidden");
                        if (context.preview && context.preview.childElementCount > 0) context.preview.classList.remove("hidden");
                        context.recorderBox.classList.add("hidden");
                    });
            });
        });

        // REMOVE RECORD
        document.querySelectorAll(".removeRecordBtn").forEach(btn => {
            btn.addEventListener("click", function () {
                const context = getRecorderContext(btn);
                if (!context || !context.recorderBox) return;
                activeRecorderContext = context;

                if (mediaRecorder && mediaRecorder.state !== "inactive") {
                    mediaRecorder.stop();
                }
                if (mediaStream) {
                    mediaStream.getTracks().forEach(track => track.stop());
                    mediaStream = null;
                }

                stopTimer();
                seconds = 0;
                updateTimer();
                context.recorderBox.classList.add("hidden");
                if (context.startButton) context.startButton.classList.remove("hidden");

                if (context.preview) {
                    const previousPreviewHtml = context.questionStep.dataset.previousPreviewHtml || "";
                    if (previousPreviewHtml) {
                        context.preview.innerHTML = previousPreviewHtml;
                        context.preview.classList.remove("hidden");
                    } else {
                        context.preview.innerHTML = "";
                        context.preview.classList.add("hidden");
                    }
                }
            });
        });

        // SEND RECORD
        document.querySelectorAll(".sendRecordBtn").forEach(btn => {
            btn.addEventListener("click", function () {
                const context = getRecorderContext(btn);
                if (!context || !context.recorderBox || !context.preview) return;
                activeRecorderContext = context;

                if (!mediaRecorder || mediaRecorder.state === "inactive") return;

                const questionId = btn.dataset.questionId;

                mediaRecorder.stop();
                stopTimer();

                mediaRecorder.onstop = function () {

                    audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
                    const audioURL = URL.createObjectURL(audioBlob);

                    const audioElement = document.createElement("audio");
                    audioElement.controls = true;
                    audioElement.src = audioURL;
                    audioElement.setAttribute("controlslist", "nodownload noplaybackrate");
                    audioElement.setAttribute("oncontextmenu", "return false;");
                    audioElement.defaultPlaybackRate = 1;
                    audioElement.playbackRate = 1;
                    audioElement.addEventListener("ratechange", () => {
                        if (audioElement.playbackRate !== 1) {
                            audioElement.playbackRate = 1;
                        }
                    });
                    audioElement.addEventListener("contextmenu", event => event.preventDefault());

                    context.preview.innerHTML = "";
                    context.preview.appendChild(audioElement);
                    context.preview.classList.remove("hidden");
                    context.questionStep.dataset.previousPreviewHtml = context.preview.innerHTML;

                    const formData = new FormData();
                    formData.append("record", audioBlob, "voice.webm");
                    console.log(questionId);
                    console.log(testId);

                    fetch(`/student/answerRecord/${questionId}/${testId}`, {
                        method: "POST",
                        headers: csrfToken ? { "X-CSRF-TOKEN": csrfToken } : {},
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            console.log("Upload success", data);
                        })
                        .catch(err => {
                            console.log(err.message)
                            console.error("Upload failed", err);
                        });

                    if (mediaStream) {
                        mediaStream.getTracks().forEach(track => track.stop());
                        mediaStream = null;
                    }
                    context.recorderBox.classList.add("hidden");
                    if (context.startButton) context.startButton.classList.remove("hidden");
                };
            });
        });

    });
</script>
</body>
</html>
