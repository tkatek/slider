@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Practice 2',
        'title'      => 'Shopping Habits Survey',
        'subtitle'   => "Let's find out about your shopping habits.",

        'questions' => [
            [
                'text' => 'How often do you buy something for yourself?',
                'options' => [
                    ['label' => 'A', 'text' => 'More than once a week', 'points' => 4],
                    ['label' => 'B', 'text' => 'Once a week', 'points' => 3],
                    ['label' => 'C', 'text' => '2-3 times a month', 'points' => 2],
                    ['label' => 'D', 'text' => 'Once a month or less', 'points' => 1],
                ],
            ],
            [
                'text' => 'Where do you usually shop?',
                'options' => [
                    ['label' => 'A', 'text' => 'Online stores', 'points' => 4],
                    ['label' => 'B', 'text' => 'Shopping malls', 'points' => 3],
                    ['label' => 'C', 'text' => 'Local shops', 'points' => 2],
                    ['label' => 'D', 'text' => 'A mix of all three', 'points' => 1],
                ],
            ],
            [
                'text' => 'What is most important when you buy a product?',
                'options' => [
                    ['label' => 'A', 'text' => 'Price', 'points' => 4],
                    ['label' => 'B', 'text' => 'Quality', 'points' => 3],
                    ['label' => 'C', 'text' => 'Brand name', 'points' => 2],
                    ['label' => 'D', 'text' => 'Recommendations from others', 'points' => 1],
                ],
            ],
            [
                'text' => 'How often do advertisements influence your purchases?',
                'options' => [
                    ['label' => 'A', 'text' => 'Very often', 'points' => 4],
                    ['label' => 'B', 'text' => 'Sometimes', 'points' => 3],
                    ['label' => 'C', 'text' => 'Rarely', 'points' => 2],
                    ['label' => 'D', 'text' => 'Never', 'points' => 1],
                ],
            ],
            [
                'text' => 'Do you read reviews before buying a product?',
                'options' => [
                    ['label' => 'A', 'text' => 'Always', 'points' => 4],
                    ['label' => 'B', 'text' => 'Often', 'points' => 3],
                    ['label' => 'C', 'text' => 'Sometimes', 'points' => 2],
                    ['label' => 'D', 'text' => 'Never', 'points' => 1],
                ],
            ],
            [
                'text' => 'Which type of advertising catches your attention most?',
                'options' => [
                    ['label' => 'A', 'text' => 'Social media ads', 'points' => 4],
                    ['label' => 'B', 'text' => 'TV commercials', 'points' => 3],
                    ['label' => 'C', 'text' => 'Influencer recommendations', 'points' => 2],
                    ['label' => 'D', 'text' => 'Posters and billboards', 'points' => 1],
                ],
            ],
            [
                'text' => 'Have you ever bought a product because an influencer recommended it?',
                'options' => [
                    ['label' => 'A', 'text' => 'Many times', 'points' => 4],
                    ['label' => 'B', 'text' => 'Once or twice', 'points' => 3],
                    ['label' => 'C', 'text' => 'Not sure', 'points' => 2],
                    ['label' => 'D', 'text' => 'Never', 'points' => 1],
                ],
            ],
            [
                'text' => 'Which products do you buy most often?',
                'options' => [
                    ['label' => 'A', 'text' => 'Clothes and fashion items', 'points' => 4],
                    ['label' => 'B', 'text' => 'Technology products', 'points' => 3],
                    ['label' => 'C', 'text' => 'Food and drinks', 'points' => 2],
                    ['label' => 'D', 'text' => 'Beauty and personal care products', 'points' => 1],
                ],
            ],
            [
                'text' => 'Do you prefer famous brands or cheaper alternatives?',
                'options' => [
                    ['label' => 'A', 'text' => 'Famous brands', 'points' => 4],
                    ['label' => 'B', 'text' => 'Mostly famous brands', 'points' => 3],
                    ['label' => 'C', 'text' => 'Mostly cheaper alternatives', 'points' => 2],
                    ['label' => 'D', 'text' => 'Cheaper alternatives', 'points' => 1],
                ],
            ],
            [
                'text' => 'How important is brand reputation when you shop?',
                'options' => [
                    ['label' => 'A', 'text' => 'Very important', 'points' => 4],
                    ['label' => 'B', 'text' => 'Important', 'points' => 3],
                    ['label' => 'C', 'text' => 'Slightly important', 'points' => 2],
                    ['label' => 'D', 'text' => 'Not important', 'points' => 1],
                ],
            ],
        ],

        'results' => [
            [
                'min' => 32,
                'max' => 40,
                'title' => 'Brand-Conscious Consumer',
                'points' => '32-40 Points',
                'items' => [
                    'Strongly influenced by brands and advertising.',
                    'Often values quality and reputation.',
                    'Likely to follow trends and new products.',
                ],
            ],
            [
                'min' => 24,
                'max' => 31,
                'title' => 'Informed Shopper',
                'points' => '24-31 Points',
                'items' => [
                    'Considers brands but also evaluates quality and price.',
                    'Uses reviews and recommendations before purchasing.',
                    'Makes balanced buying decisions.',
                ],
            ],
            [
                'min' => 16,
                'max' => 23,
                'title' => 'Practical Buyer',
                'points' => '16-23 Points',
                'items' => [
                    'Focuses on needs rather than brand image.',
                    'Less influenced by advertising.',
                    'Usually looks for value for money.',
                ],
            ],
            [
                'min' => 10,
                'max' => 15,
                'title' => 'Independent Consumer',
                'points' => '10-15 Points',
                'items' => [
                    'Rarely influenced by advertising or brands.',
                    'Makes purchasing decisions based on personal needs.',
                    'Prefers functionality over popularity.',
                ],
            ],
        ],

        'discussion' => [
            'Do you agree with your consumer profile?',
            'What influences your shopping decisions the most?',
        ],
    ];
@endphp

@section('content')
    <main id="shoppingSurvey" class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1100px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 w-full max-w-3xl overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20">
                <div class="border-b border-slate-200 bg-slate-50 px-5 py-4 dark:border-slate-700 dark:bg-slate-950/45 sm:px-6">
                    <div class="flex items-center justify-between gap-4">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-emerald-600 dark:text-emerald-300">
                            Practice 2
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
                    <p id="resultPoints" class="text-sm font-black text-emerald-700 dark:text-emerald-200"></p>
                    <h3 id="resultTitle" class="mt-1 text-2xl font-black leading-tight text-slate-950 dark:text-white"></h3>
                </div>

                <div class="p-5">
                    <ul id="resultList" class="list-disc space-y-2 pl-5 text-base font-bold leading-snug text-slate-700 dark:text-slate-200"></ul>

                    <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/45">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-emerald-600 dark:text-emerald-300">
                            Discuss
                        </p>

                        <ol class="mt-3 list-decimal space-y-2 pl-5 text-base font-black leading-snug text-slate-900 dark:text-slate-100">
                            @foreach($content['discussion'] as $question)
                                <li>{{ $question }}</li>
                            @endforeach
                        </ol>
                    </div>

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
            const resultPoints = document.getElementById('resultPoints');
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

            function showResult() {
                const total = answers.reduce((sum, answer) => sum + Number(answer.points), 0);
                const result = results.find((item) => total >= item.min && total <= item.max);

                if (!result) return;

                resultPoints.textContent = `${total} points | ${result.points}`;
                resultTitle.textContent = result.title;
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
