@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Practice 2',
        'title'      => 'What type of sibling are you?',
        'subtitle'   => 'For each question, choose A, B, C, or D that best describes you.',

        'questions' => [
            [
                'text' => 'When your sibling is upset, you usually…',
                'options' => [
                    ['label' => 'A', 'text' => 'Comfort them and listen'],
                    ['label' => 'B', 'text' => 'Try to solve their problem'],
                    ['label' => 'C', 'text' => 'Joke to make them laugh'],
                    ['label' => 'D', 'text' => 'Give them space first'],
                ],
            ],
            [
                'text' => 'In arguments, you…',
                'options' => [
                    ['label' => 'A', 'text' => 'Try to stay calm'],
                    ['label' => 'B', 'text' => 'Want to win the argument'],
                    ['label' => 'C', 'text' => 'Quickly apologize even if unsure'],
                    ['label' => 'D', 'text' => 'Avoid arguments completely'],
                ],
            ],
            [
                'text' => 'Your sibling borrows your things. You…',
                'options' => [
                    ['label' => 'A', 'text' => 'Don’t mind if they ask nicely'],
                    ['label' => 'B', 'text' => 'Get a bit annoyed'],
                    ['label' => 'C', 'text' => 'Let them take anything'],
                    ['label' => 'D', 'text' => 'Set strict rules'],
                ],
            ],
            [
                'text' => 'Your role in the family is usually…',
                'options' => [
                    ['label' => 'A', 'text' => 'The peacemaker'],
                    ['label' => 'B', 'text' => 'The leader'],
                    ['label' => 'C', 'text' => 'The entertainer'],
                    ['label' => 'D', 'text' => 'The quiet observer'],
                ],
            ],
            [
                'text' => 'When planning something together, you…',
                'options' => [
                    ['label' => 'A', 'text' => 'Help organize everything'],
                    ['label' => 'B', 'text' => 'Take charge'],
                    ['label' => 'C', 'text' => 'Go along with whatever'],
                    ['label' => 'D', 'text' => 'Prefer not to be involved'],
                ],
            ],
            [
                'text' => 'Your sibling succeeds at something. You feel…',
                'options' => [
                    ['label' => 'A', 'text' => 'Proud and happy'],
                    ['label' => 'B', 'text' => 'Competitive'],
                    ['label' => 'C', 'text' => 'Inspired'],
                    ['label' => 'D', 'text' => 'Neutral but supportive'],
                ],
            ],
            [
                'text' => 'You express love by…',
                'options' => [
                    ['label' => 'A', 'text' => 'Caring actions'],
                    ['label' => 'B', 'text' => 'Giving advice'],
                    ['label' => 'C', 'text' => 'Making jokes and fun'],
                    ['label' => 'D', 'text' => 'Staying loyal and present'],
                ],
            ],
            [
                'text' => 'When your sibling makes a mistake, you…',
                'options' => [
                    ['label' => 'A', 'text' => 'Help them fix it'],
                    ['label' => 'B', 'text' => 'Criticize them a little'],
                    ['label' => 'C', 'text' => 'Laugh it off'],
                    ['label' => 'D', 'text' => 'Ignore it'],
                ],
            ],
            [
                'text' => 'Your ideal sibling relationship is…',
                'options' => [
                    ['label' => 'A', 'text' => 'Close and emotional'],
                    ['label' => 'B', 'text' => 'Competitive but strong'],
                    ['label' => 'C', 'text' => 'Fun and relaxed'],
                    ['label' => 'D', 'text' => 'Independent but respectful'],
                ],
            ],
            [
                'text' => 'People describe you as…',
                'options' => [
                    ['label' => 'A', 'text' => 'Kind'],
                    ['label' => 'B', 'text' => 'Strong-willed'],
                    ['label' => 'C', 'text' => 'Funny'],
                    ['label' => 'D', 'text' => 'Calm'],
                ],
            ],
        ],

        'results' => [
            'A' => [
                'emoji' => '💙',
                'title' => 'Mostly A — The Caring Sibling',
                'items' => [
                    'You are kind, supportive, and emotionally intelligent.',
                    'You care deeply about your sibling.',
                    'You often put others first.',
                    'You are the “safe place” in the family.',
                    '✨ Strength: empathy',
                    '⚠️ Watch out: don’t forget your own needs',
                ],
            ],
            'B' => [
                'emoji' => '❤️',
                'title' => 'Mostly B — The Boss Sibling',
                'items' => [
                    'You are confident, strong, and protective.',
                    'You like control and structure.',
                    'You can be competitive.',
                    'You push your sibling to do better.',
                    '✨ Strength: leadership',
                    '⚠️ Watch out: avoid being too strict',
                ],
            ],
            'C' => [
                'emoji' => '💛',
                'title' => 'Mostly C — The Fun Sibling',
                'items' => [
                    'You are playful, funny, and easygoing.',
                    'You bring joy to the family.',
                    'You avoid tension.',
                    'You turn problems into jokes.',
                    '✨ Strength: positivity',
                    '⚠️ Watch out: don’t avoid serious talks',
                ],
            ],
            'D' => [
                'emoji' => '💚',
                'title' => 'Mostly D — The Independent Sibling',
                'items' => [
                    'You are calm, private, and self-reliant.',
                    'You value space.',
                    'You avoid drama.',
                    'You care in quiet ways.',
                    '✨ Strength: independence',
                    '⚠️ Watch out: express feelings more often',
                ],
            ],
        ],
    ];
@endphp

@section('content')
    <main id="siblingPersonalityTest" class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1100px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 w-full max-w-3xl overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20">
                <div class="border-b border-slate-200 bg-slate-50 px-5 py-4 dark:border-slate-700 dark:bg-slate-950/45 sm:px-6">
                    <div class="flex items-center justify-between gap-4">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-emerald-600 dark:text-emerald-300">
                            👨‍👩‍👧‍👦 Personality Test
                        </p>

                        <p id="surveyCounter" class="rounded-full bg-white px-3 py-1 text-xs font-black text-slate-600 shadow-sm dark:bg-slate-900 dark:text-slate-200">
                            1 / {{ count($content['questions']) }}
                        </p>
                    </div>

                    <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-800">
                        <div id="surveyProgress" class="h-full rounded-full bg-emerald-600 transition-all duration-300" style="width: 10%"></div>
                    </div>
                </div>

                <div class="p-5 sm:p-6 lg:p-8">
                    <p id="surveyMessage" class="mb-4 hidden rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm font-black text-amber-800 dark:border-amber-400/30 dark:bg-amber-500/10 dark:text-amber-200">
                        Choose an answer first.
                    </p>

                    <h2 id="questionText" class="text-2xl font-black leading-tight text-slate-950 dark:text-white sm:text-3xl"></h2>

                    <div id="optionsWrap" class="mt-6 grid gap-3"></div>

                    <div class="mt-7 flex items-center justify-between gap-3">
                        <button
                                id="prevBtn"
                                type="button"
                                class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-black text-slate-700 transition hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-40 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800"
                        >
                            Previous
                        </button>

                        <button
                                id="nextBtn"
                                type="button"
                                class="rounded-xl bg-emerald-600 px-7 py-3 text-sm font-black text-white shadow-sm transition hover:bg-emerald-500"
                        >
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <div id="resultModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
            <div class="w-full max-w-xl overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
                <div class="border-b border-slate-200 bg-emerald-50 px-5 py-4 dark:border-slate-700 dark:bg-emerald-500/10">
                    <p id="resultCounts" class="text-sm font-black text-emerald-700 dark:text-emerald-200"></p>
                    <h3 id="resultTitle" class="mt-1 text-2xl font-black leading-tight text-slate-950 dark:text-white"></h3>
                </div>

                <div class="p-5">
                    <ul id="resultList" class="list-disc space-y-2 pl-5 text-base font-bold leading-snug text-slate-700 dark:text-slate-200"></ul>

                    <div class="mt-6">
                        <button
                                id="retakeBtn"
                                type="button"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-black text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800"
                        >
                            Retake
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
            const questions = @json($content['questions']);
            const results = @json($content['results']);

            const counter = document.getElementById('surveyCounter');
            const progress = document.getElementById('surveyProgress');
            const message = document.getElementById('surveyMessage');
            const questionText = document.getElementById('questionText');
            const optionsWrap = document.getElementById('optionsWrap');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const resultModal = document.getElementById('resultModal');
            const resultCounts = document.getElementById('resultCounts');
            const resultTitle = document.getElementById('resultTitle');
            const resultList = document.getElementById('resultList');
            const retakeBtn = document.getElementById('retakeBtn');

            let currentIndex = 0;
            let answers = Array(questions.length).fill(null);

            function renderQuestion() {
                const question = questions[currentIndex];
                const selected = answers[currentIndex];

                counter.textContent = `${currentIndex + 1} / ${questions.length}`;
                progress.style.width = `${((currentIndex + 1) / questions.length) * 100}%`;
                questionText.textContent = `${currentIndex + 1}. ${question.text}`;
                prevBtn.disabled = currentIndex === 0;
                nextBtn.textContent = currentIndex === questions.length - 1 ? 'Show result' : 'Next';
                message.classList.add('hidden');
                optionsWrap.innerHTML = '';

                question.options.forEach((option) => {
                    const isSelected = selected && selected.label === option.label;
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.className = [
                        'flex w-full items-center gap-3 rounded-xl border px-4 py-3 text-left text-base font-black leading-snug transition',
                        isSelected
                            ? 'border-emerald-500 bg-emerald-50 text-emerald-950 ring-2 ring-emerald-500/20 dark:border-emerald-400 dark:bg-emerald-500/15 dark:text-emerald-100'
                            : 'border-slate-200 bg-slate-50 text-slate-800 hover:border-emerald-300 hover:bg-emerald-50/60 dark:border-slate-700 dark:bg-slate-950/45 dark:text-slate-100 dark:hover:border-emerald-500/50 dark:hover:bg-emerald-500/10',
                    ].join(' ');

                    button.innerHTML = `
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full ${isSelected ? 'bg-emerald-600 text-white' : 'bg-white text-slate-800 dark:bg-slate-900 dark:text-slate-100'} shadow-sm">
                            ${option.label}
                        </span>
                        <span>${option.text}</span>
                    `;

                    button.addEventListener('click', () => {
                        answers[currentIndex] = option;
                        renderQuestion();
                    });

                    optionsWrap.appendChild(button);
                });
            }

            function getCounts() {
                return answers.reduce((counts, answer) => {
                    if (answer && answer.label) {
                        counts[answer.label] = (counts[answer.label] || 0) + 1;
                    }

                    return counts;
                }, { A: 0, B: 0, C: 0, D: 0 });
            }

            function getTopLetter(counts) {
                return Object.entries(counts).sort((a, b) => b[1] - a[1])[0][0];
            }

            function showResult() {
                const counts = getCounts();
                const topLetter = getTopLetter(counts);
                const result = results[topLetter];

                if (!result) return;

                resultCounts.textContent = `A: ${counts.A} | B: ${counts.B} | C: ${counts.C} | D: ${counts.D}`;
                resultTitle.textContent = `${result.emoji} ${result.title}`;
                resultList.innerHTML = '';

                result.items.forEach((item) => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    resultList.appendChild(li);
                });

                resultModal.classList.remove('hidden');
                resultModal.classList.add('flex');
            }

            function closeResult() {
                resultModal.classList.add('hidden');
                resultModal.classList.remove('flex');
            }

            function resetSurvey() {
                currentIndex = 0;
                answers = Array(questions.length).fill(null);
                closeResult();
                renderQuestion();
            }

            prevBtn.addEventListener('click', () => {
                if (currentIndex === 0) return;
                currentIndex -= 1;
                renderQuestion();
            });

            nextBtn.addEventListener('click', () => {
                if (!answers[currentIndex]) {
                    message.classList.remove('hidden');
                    return;
                }

                if (currentIndex === questions.length - 1) {
                    showResult();
                    return;
                }

                currentIndex += 1;
                renderQuestion();
            });

            retakeBtn.addEventListener('click', resetSurvey);

            resultModal.addEventListener('click', (event) => {
                if (event.target === resultModal) closeResult();
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeResult();
                }
            });

            window.resetSlide = resetSurvey;

            renderQuestion();
        });
    </script>
@endsection