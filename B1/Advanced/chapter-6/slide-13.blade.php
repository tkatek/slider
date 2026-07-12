<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'A Listen. What does each person talk about? Choose the correct topic in column B.<br>B Listen again. What examples do they give? Write two examples for each person in column C.',



    'audio' => materialAsset('slider/B1/Advanced/chapter-6/audios/slide13.mp3'),

    'topics' => [
        'electricity',
        'transport',
        'recycling',
        'heating',
        'packaging',
        'food waste',
    ],

    'rows' => [
        [
            'number' => 1,
            'person' => 'Jun',
            'given_topic' => 'recycling',
            'given_examples' => ['paper', ''],
            'answer_topic' => 'recycling',
            'answer_examples' => ['paper', 'cans'],
        ],
        [
            'number' => 2,
            'person' => 'Delia',
            'given_examples' => ['', ''],
            'answer_topic' => 'electricity',
            'answer_examples' => ['turn lights off', "don't leave things on standby"],
        ],
        [
            'number' => 3,
            'person' => 'Henry',
            'given_examples' => ['', ''],
            'answer_topic' => 'transport',
            'answer_examples' => ['walk everywhere', 'never travel by plane'],
        ],
        [
            'number' => 4,
            'person' => 'Olivia',
            'given_examples' => ['', ''],
            'answer_topic' => 'packaging',
            'answer_examples' => ['use paper bags', 'use own bags'],
        ],
    ],
];

?>

@extends('slider.simple-layout')

@section('content')
    @php
        $title = $content['title'] ?? 'Listening';
        $subtitle = $content['subtitle'] ?? '';
        $topics = is_array($content['topics'] ?? null) ? $content['topics'] : [];
        $rows = is_array($content['rows'] ?? null) ? $content['rows'] : [];

        $playerAudio = $content['audio'] ?? null;
        $audioPlayerFloating = false;
        $scriptLines = [
            'I’m Jun. How do we help the environment? Well, we recycle lots of things. We recycle paper – newspapers, magazines, cardboard boxes and things like that. And we recycle cans, too. I think that’s important, because a lot of energy is used to make aluminium. But a lot less is used to recycle it.',
            'Hello. My name’s Delia. In our house we try to save electricity. I always turn lights off when I leave a room. Sometimes I forget and then Mum or Dad will say: “Lights!” And I don’t leave things on standby. That wastes a lot of electricity. So I always turn the TV or the computer off at night.',
            'Henry here. How do we help the environment? I suppose transport is the most important thing, because we haven’t got a car. We don’t really need one. We live in the centre of town, so I can walk to the shops and to school. And another thing is that when we go on holiday, we never go by plane. We always take the train. That’s supposed to be better for the environment, but I don’t really like it, because it means that we can’t go to places like Florida and Thailand.',
            'Hello. I’m Olivia. Yes, we try to help the environment. A lot of the rubbish that is thrown away is packaging, so we try to cut down on that. We don’t usually buy things like fruit, vegetables and meat at the supermarket, because everything there is in plastic boxes and bags. We buy those things at the market instead. There they put things in paper bags, which can be recycled. And when we go shopping, we always take our own bags, so we don’t need to use plastic bags.',
        ];
        $hasScript = count($scriptLines) > 0;

        $buttonPrimaryColor = $theme['button_primary_color'] ?? 'bg-gradient-to-tr from-blue-500 via-indigo-500 to-purple-600';
    @endphp

    <main class="flex min-h-[100dvh] w-full flex-col justify-center px-4 py-5 sm:px-6 lg:px-8">
        <div class="mx-auto w-full max-w-6xl">
            @include('slider.components.title-subtitle', [
                'title' => $title,
                'subtitle' => $subtitle,
            ])

            <section class="mx-auto mt-4 w-full max-w-6xl rounded-3xl border border-slate-200/80 bg-white/85 p-4 shadow-[0_22px_60px_-38px_rgba(15,23,42,0.35)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/70 sm:p-5 lg:p-6">
                @if($playerAudio)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3 dark:border-slate-700 dark:bg-slate-950/40 sm:p-4">
                        @include('slider.components.audio-player')
                    </div>
                @endif

                <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-950">
                    <div class="hidden grid-cols-[0.65fr_0.85fr_1.8fr] border-b border-slate-200 bg-slate-50 text-center text-xs font-black uppercase tracking-[0.16em] text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 md:grid">
                        <div class="px-3 py-3">A</div>
                        <div class="border-l border-slate-200 px-3 py-3 dark:border-slate-700">B</div>
                        <div class="border-l border-slate-200 px-3 py-3 dark:border-slate-700">C</div>
                    </div>

                    <div id="listeningPracticeRows">
                        @foreach($rows as $row)
                            @php
                                $givenExamples = is_array($row['given_examples'] ?? null) ? $row['given_examples'] : ['', ''];
                                $answerExamples = is_array($row['answer_examples'] ?? null) ? $row['answer_examples'] : ['', ''];
                            @endphp

                            <div
                                    class="practice-row grid grid-cols-1 gap-3 border-b border-slate-200 p-3 last:border-b-0 dark:border-slate-700 md:grid-cols-[0.65fr_0.85fr_1.8fr] md:gap-0 md:p-0"
                                    data-topic-answer="{{ $row['answer_topic'] }}"
                            >
                                <div class="flex items-center gap-3 rounded-2xl bg-slate-50/80 p-3 dark:bg-slate-900/70 md:rounded-none md:bg-transparent md:px-3 md:py-4 md:dark:bg-transparent">
                                    <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm font-black text-slate-700 dark:bg-slate-800 dark:text-slate-100">
                                        {{ $row['number'] }}
                                    </span>

                                    <span class="text-base font-black text-slate-900 dark:text-slate-50">
                                        {{ $row['person'] }}
                                    </span>
                                </div>

                                <div class="md:border-l md:border-slate-200 md:px-3 md:py-4 md:dark:border-slate-700">
                                    <label class="mb-1 block text-xs font-black uppercase tracking-[0.14em] text-slate-400 md:hidden">
                                        B Topic
                                    </label>

                                    <select
                                            class="topic-input min-h-11 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 text-sm font-extrabold text-slate-900 outline-none transition focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:focus:ring-emerald-500/20"
                                            data-given="{{ $row['given_topic'] ?? '' }}"
                                    >
                                        <option value="">Choose topic</option>
                                        @foreach($topics as $topic)
                                            <option
                                                    value="{{ $topic }}"
                                                    @selected(($row['given_topic'] ?? '') === $topic)
                                            >
                                                {{ $topic }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md:border-l md:border-slate-200 md:px-3 md:py-4 md:dark:border-slate-700">
                                    <label class="mb-1 block text-xs font-black uppercase tracking-[0.14em] text-slate-400 md:hidden">
                                        C Examples
                                    </label>

                                    <div class="grid gap-2 sm:grid-cols-2">
                                        <input
                                                type="text"
                                                value="{{ $givenExamples[0] ?? '' }}"
                                                placeholder="example 1"
                                                data-answer="{{ $answerExamples[0] ?? '' }}"
                                                data-given="{{ $givenExamples[0] ?? '' }}"
                                                class="example-input min-h-11 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 text-sm font-bold text-slate-900 outline-none transition focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:focus:ring-emerald-500/20"
                                        >

                                        <input
                                                type="text"
                                                value="{{ $givenExamples[1] ?? '' }}"
                                                placeholder="example 2"
                                                data-answer="{{ $answerExamples[1] ?? '' }}"
                                                data-given="{{ $givenExamples[1] ?? '' }}"
                                                class="example-input min-h-11 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 text-sm font-bold text-slate-900 outline-none transition focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:focus:ring-emerald-500/20"
                                        >
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3">
                    <button
                            type="button"
                            id="checkAnswersBtn"
                            class="inline-flex min-h-12 items-center justify-center rounded-full px-5 py-3 text-sm font-black text-white shadow-lg transition hover:brightness-105 focus-visible:outline-none focus-visible:ring-4 sm:text-base {{ $buttonPrimaryColor }}"
                    >
                        Check answers
                    </button>

                    <button
                            type="button"
                            id="showAnswersBtn"
                            class="inline-flex min-h-12 items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-black text-slate-700 shadow-sm transition hover:bg-slate-50 hover:text-slate-950 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 sm:text-base"
                    >
                        Show answers
                    </button>
                </div>

                <p id="practiceResult" class="mt-3 hidden text-center text-sm font-black"></p>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const rows = Array.from(document.querySelectorAll(".practice-row"));
            const checkBtn = document.getElementById("checkAnswersBtn");
            const showBtn = document.getElementById("showAnswersBtn");
            const result = document.getElementById("practiceResult");

            const neutralClasses = [
                "border-slate-200",
                "dark:border-slate-700",
            ];

            const correctClasses = [
                "border-emerald-400",
                "bg-emerald-50",
                "text-emerald-900",
                "dark:border-emerald-500",
                "dark:bg-emerald-950/30",
                "dark:text-emerald-100",
            ];

            const wrongClasses = [
                "border-rose-400",
                "bg-rose-50",
                "text-rose-900",
                "dark:border-rose-500",
                "dark:bg-rose-950/30",
                "dark:text-rose-100",
            ];

            function normalize(value) {
                return String(value || "")
                    .toLowerCase()
                    .replace(/[’‘]/g, "'")
                    .replace(/[.,!?]/g, "")
                    .replace(/\s+/g, " ")
                    .trim();
            }

            function clearState(input) {
                input.classList.remove(...correctClasses, ...wrongClasses);
                neutralClasses.forEach(className => input.classList.add(className));
            }

            function setState(input, isCorrect) {
                input.classList.remove(...neutralClasses, ...correctClasses, ...wrongClasses);
                input.classList.add(...(isCorrect ? correctClasses : wrongClasses));
            }

            function checkAnswers() {
                let correct = 0;
                let total = 0;

                rows.forEach(row => {
                    const topicInput = row.querySelector(".topic-input");
                    const topicCorrect = normalize(topicInput.value) === normalize(row.dataset.topicAnswer);

                    total++;
                    setState(topicInput, topicCorrect);
                    if (topicCorrect) correct++;

                    row.querySelectorAll(".example-input").forEach(input => {
                        const inputCorrect = normalize(input.value).includes(normalize(input.dataset.answer));

                        total++;
                        setState(input, inputCorrect);
                        if (inputCorrect) correct++;
                    });
                });

                result.className = "mt-3 text-center text-sm font-black " + (
                    correct === total
                        ? "text-emerald-700 dark:text-emerald-300"
                        : "text-rose-700 dark:text-rose-300"
                );

                result.textContent = `${correct}/${total} correct`;
                result.classList.remove("hidden");
            }

            function showAnswers() {
                rows.forEach(row => {
                    const topicInput = row.querySelector(".topic-input");

                    topicInput.value = row.dataset.topicAnswer;
                    setState(topicInput, true);

                    row.querySelectorAll(".example-input").forEach(input => {
                        input.value = input.dataset.answer;
                        setState(input, true);
                    });
                });

                result.className = "mt-3 text-center text-sm font-black text-emerald-700 dark:text-emerald-300";
                result.textContent = "Answers shown";
                result.classList.remove("hidden");

                showBtn.textContent = "Retake";
                showBtn.dataset.mode = "retake";
            }

            function retake() {
                rows.forEach(row => {
                    const topicInput = row.querySelector(".topic-input");

                    topicInput.value = topicInput.dataset.given || "";
                    clearState(topicInput);

                    row.querySelectorAll(".example-input").forEach(input => {
                        input.value = input.dataset.given || "";
                        clearState(input);
                    });
                });

                result.classList.add("hidden");
                showBtn.textContent = "Show answers";
                showBtn.dataset.mode = "show";
            }

            function stopSlideAudio() {
                if (typeof window.stopAudioPlayer === "function") {
                    window.stopAudioPlayer();
                }
            }

            checkBtn?.addEventListener("click", checkAnswers);

            showBtn?.addEventListener("click", () => {
                if (showBtn.dataset.mode === "retake") {
                    retake();
                    return;
                }

                showAnswers();
            });

            rows.forEach(row => {
                row.querySelectorAll("select, input").forEach(input => {
                    input.addEventListener("input", () => clearState(input));
                    input.addEventListener("change", () => clearState(input));
                });
            });

            window.stopSlideAudio = stopSlideAudio;

            window.resetSlide = () => {
                stopSlideAudio();
                retake();
            };

            window.addEventListener("pagehide", stopSlideAudio);
            window.addEventListener("beforeunload", stopSlideAudio);
            document.addEventListener("visibilitychange", () => {
                if (document.hidden) {
                    stopSlideAudio();
                }
            });
        })();
    </script>
@endsection
