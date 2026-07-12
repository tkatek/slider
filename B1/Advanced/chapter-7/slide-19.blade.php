@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Put the Events in Order',
        'subtitle' => '',

        'instruction' => 'Tap the events in order.',

        'events' => [
            [
                'text'             => 'The customer asks for a mirror.',
                'correct_position' => 3,
            ],
            [
                'text'             => 'The beautician offers a special package.',
                'correct_position' => 2,
            ],
            [
                'text'             => 'The customer arrives at the salon.',
                'correct_position' => 1,
            ],
            [
                'text'             => 'The customer complains about his purple hair.',
                'correct_position' => 6,
            ],
            [
                'text'             => 'The customer gets shampoo in his eyes.',
                'correct_position' => 5,
            ],
            [
                'text'             => "The beautician dries the customer's hair.",
                'correct_position' => 4,
            ],
        ],
    ];
@endphp

@section('content')
    <style>
        .order-game-shell {
            box-shadow: 0 18px 48px -32px rgba(5, 150, 105, 0.48);
        }

        .order-game-card {
            min-height: 58px;
            border: 2px solid #e2e8f0;
            background: #fbfefc;
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.055);
            transition:
                    border-color 180ms ease,
                    background-color 180ms ease,
                    box-shadow 180ms ease,
                    transform 180ms ease;
        }

        .order-game-card:hover {
            border-color: #6ee7b7;
            background: #f8fffb;
            box-shadow: 0 6px 15px rgba(5, 150, 105, 0.09);
            transform: translateY(-1px);
        }

        .order-game-card:focus-visible {
            outline: none;
            box-shadow:
                    0 0 0 4px rgba(16, 185, 129, 0.2),
                    0 6px 15px rgba(5, 150, 105, 0.1);
        }

        .order-game-number {
            width: 44px;
            height: 44px;
            border: 2px solid #a7f3d0;
            background: #ecfdf5;
            color: #047857;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.55);
            transition:
                    border-color 180ms ease,
                    background-color 180ms ease,
                    color 180ms ease,
                    box-shadow 180ms ease,
                    transform 180ms ease;
        }

        .order-game-card.is-selected {
            border-color: #a7f3d0;
            background: linear-gradient(90deg, #ecfdf5 0%, #f8fffb 72%);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.08);
        }

        .order-game-card.is-selected:hover {
            border-color: #6ee7b7;
            background: linear-gradient(90deg, #d1fae5 0%, #ffffff 72%);
        }

        .order-game-card.is-current {
            border-color: #10b981;
            box-shadow:
                    0 0 0 3px rgba(16, 185, 129, 0.1),
                    0 6px 15px rgba(5, 150, 105, 0.1);
        }

        .order-game-card.is-selected .order-game-number {
            border-color: #059669;
            background: #059669;
            color: #ffffff;
            box-shadow: 0 4px 11px rgba(5, 150, 105, 0.27);
            transform: scale(1.02);
        }

        .order-game-card.is-correct {
            border-color: #059669;
            background: linear-gradient(90deg, #d1fae5 0%, #f0fdf4 100%);
            box-shadow: 0 7px 18px rgba(5, 150, 105, 0.16);
        }

        .order-game-card.is-correct .order-game-number {
            border-color: #047857;
            background: #047857;
            color: #ffffff;
            box-shadow: 0 4px 11px rgba(4, 120, 87, 0.25);
        }

        .dark .order-game-shell {
            box-shadow: 0 20px 52px -34px rgba(16, 185, 129, 0.35);
        }

        .dark .order-game-card {
            border-color: #334155;
            background: #0f172a;
            box-shadow: 0 4px 12px rgba(2, 6, 23, 0.25);
        }

        .dark .order-game-card:hover {
            border-color: rgba(52, 211, 153, 0.62);
            background: #12221f;
            box-shadow: 0 7px 18px rgba(2, 6, 23, 0.32);
        }

        .dark .order-game-number {
            border-color: rgba(52, 211, 153, 0.38);
            background: rgba(16, 185, 129, 0.12);
            color: #6ee7b7;
            box-shadow: none;
        }

        .dark .order-game-card.is-selected {
            border-color: rgba(52, 211, 153, 0.42);
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.1) 0%, #0f172a 75%);
            box-shadow: 0 4px 12px rgba(2, 6, 23, 0.28);
        }

        .dark .order-game-card.is-selected:hover {
            border-color: rgba(110, 231, 183, 0.68);
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.15) 0%, #0f172a 75%);
        }

        .dark .order-game-card.is-current {
            border-color: #34d399;
            box-shadow:
                    0 0 0 3px rgba(52, 211, 153, 0.08),
                    0 6px 15px rgba(2, 6, 23, 0.32);
        }

        .dark .order-game-card.is-selected .order-game-number,
        .dark .order-game-card.is-correct .order-game-number {
            border-color: #10b981;
            background: #10b981;
            color: #ffffff;
            box-shadow: 0 4px 11px rgba(16, 185, 129, 0.22);
        }

        .dark .order-game-card.is-correct {
            border-color: #34d399;
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.2) 0%, rgba(5, 150, 105, 0.08) 100%);
            box-shadow: 0 7px 18px rgba(2, 6, 23, 0.35);
        }


        .order-game-feedback.is-success {
            border-color: #86efac;
            background: #f0fdf4;
            color: #166534;
        }

        .order-game-feedback.is-success .order-game-feedback-icon {
            background: #059669;
            color: #ffffff;
        }

        .order-game-feedback.is-retry {
            border-color: #fcd34d;
            background: #fffbeb;
            color: #78350f;
        }

        .order-game-feedback.is-retry .order-game-feedback-icon {
            background: #f59e0b;
            color: #451a03;
        }

        .dark .order-game-feedback.is-success {
            border-color: rgba(52, 211, 153, 0.42);
            background: rgba(16, 185, 129, 0.1);
            color: #a7f3d0;
        }

        .dark .order-game-feedback.is-success .order-game-feedback-icon {
            background: #10b981;
            color: #ffffff;
        }

        .dark .order-game-feedback.is-retry {
            border-color: rgba(251, 191, 36, 0.45);
            background: rgba(245, 158, 11, 0.1);
            color: #fde68a;
        }

        .dark .order-game-feedback.is-retry .order-game-feedback-icon {
            background: #fbbf24;
            color: #451a03;
        }

        @media (max-width: 640px) {
            .order-game-card {
                min-height: 56px;
            }

            .order-game-number {
                width: 40px;
                height: 40px;
                border-radius: 11px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .order-game-card,
            .order-game-number {
                transition: none;
            }

            .order-game-card:hover {
                transform: none;
            }
        }
    </style>

    <main class="flex min-h-[100dvh] w-full items-center overflow-x-hidden px-3 py-2 text-slate-950 dark:text-slate-50 sm:px-5 sm:py-3 lg:px-8">
        <section class="mx-auto flex w-full max-w-[1160px] flex-col">

            @include('slider.components.title-subtitle')

            <section
                    class="order-game-shell mx-auto mt-2 w-full overflow-hidden rounded-[1.4rem] border border-emerald-200/80 bg-white dark:border-emerald-500/25 dark:bg-slate-900"
            >
                <div class="border-b border-emerald-100 bg-gradient-to-r from-emerald-50 via-white to-teal-50 px-3.5 py-3 dark:border-emerald-500/20 dark:from-emerald-500/10 dark:via-slate-900 dark:to-teal-500/10 sm:px-4">
                    <div class="flex flex-wrap items-center justify-between gap-2.5">
                        <div class="flex min-w-0 items-center gap-3">
                            <span
                                    class="hidden h-10 w-10 shrink-0 place-items-center rounded-xl bg-emerald-600 text-sm font-black text-white shadow-[0_5px_12px_rgba(5,150,105,0.24)] sm:grid"
                                    aria-hidden="true"
                            >
                                1→6
                            </span>

                            <div class="min-w-0">
                                <p class="text-base font-black leading-tight text-slate-900 dark:text-white sm:text-lg">
                                    {{ $content['instruction'] }}
                                </p>
                                <p class="mt-0.5 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                                    Tap an event to change its position.
                                </p>
                            </div>
                        </div>

                        <div class="flex shrink-0 items-center gap-2">
                            <div
                                    id="progressBadge"
                                    class="rounded-full border border-emerald-200 bg-white px-3 py-1.5 text-xs font-black text-emerald-700 shadow-[0_3px_8px_rgba(5,150,105,0.08)] dark:border-emerald-500/35 dark:bg-slate-900 dark:text-emerald-300 sm:text-sm"
                                    aria-live="polite"
                            >
                                <span id="selectedCount">0</span> / {{ count($content['events']) }}
                            </div>

                            <button
                                    id="resetActivityButton"
                                    type="button"
                                    class="rounded-xl border border-slate-300 bg-white px-3 py-1.5 text-xs font-black text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.05)] transition hover:border-emerald-400 hover:bg-emerald-50 hover:text-emerald-700 focus:outline-none focus-visible:ring-4 focus-visible:ring-emerald-200 disabled:cursor-not-allowed disabled:opacity-40 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-emerald-400 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-300 dark:focus-visible:ring-emerald-500/25 sm:text-sm"
                                    disabled
                            >
                                Reset
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-3 sm:p-3.5">
                    <div
                            id="feedbackMessage"
                            class="order-game-feedback mb-2.5 hidden items-center gap-2 rounded-xl border px-3 py-2 text-sm font-black leading-snug"
                            role="status"
                            aria-live="polite"
                    >
                        <span
                                id="feedbackIcon"
                                class="order-game-feedback-icon grid h-6 w-6 shrink-0 place-items-center rounded-full text-sm font-black"
                                aria-hidden="true"
                        ></span>
                        <span id="feedbackText"></span>
                    </div>

                    <div id="eventList" class="grid gap-2.5">
                        @foreach($content['events'] as $event)
                            <button
                                    type="button"
                                    class="order-game-card group flex w-full items-center gap-3 rounded-[0.95rem] px-3 py-2 text-left sm:px-3.5 sm:py-2"
                                    data-correct-position="{{ $event['correct_position'] }}"
                                    aria-pressed="false"
                            >
                                <span
                                        class="order-game-number grid shrink-0 place-items-center rounded-xl text-lg font-black"
                                        aria-hidden="true"
                                >
                                    –
                                </span>

                                <span
                                        class="min-w-0 flex-1 text-[0.98rem] font-black leading-snug text-slate-900 dark:text-white sm:text-[1.05rem]"
                                >
                                    {{ $event['text'] }}
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const list = document.getElementById('eventList');
            const feedback = document.getElementById('feedbackMessage');
            const feedbackIcon = document.getElementById('feedbackIcon');
            const feedbackText = document.getElementById('feedbackText');
            const selectedCount = document.getElementById('selectedCount');
            const resetButton = document.getElementById('resetActivityButton');

            if (
                !list ||
                !feedback ||
                !feedbackIcon ||
                !feedbackText ||
                !selectedCount ||
                !resetButton
            ) {
                return;
            }

            const cards = Array.from(list.querySelectorAll('.order-game-card'));
            const totalCards = cards.length;

            let selectedCards = [];
            let activityComplete = false;

            function setFeedback(type, message) {
                feedback.classList.remove('is-success', 'is-retry');

                if (!message) {
                    feedback.classList.add('hidden');
                    feedback.classList.remove('flex');
                    feedbackIcon.textContent = '';
                    feedbackText.textContent = '';
                    return;
                }

                feedback.classList.remove('hidden');
                feedback.classList.add('flex');
                feedback.classList.add(type === 'success' ? 'is-success' : 'is-retry');
                feedbackIcon.textContent = type === 'success' ? '✓' : '↻';
                feedbackText.textContent = message;
            }

            function renderCards() {
                cards.forEach(function (card) {
                    const number = card.querySelector('.order-game-number');
                    const selectedIndex = selectedCards.indexOf(card);
                    const isSelected = selectedIndex !== -1;

                    card.classList.toggle('is-selected', isSelected && !activityComplete);
                    card.classList.toggle(
                        'is-current',
                        isSelected && !activityComplete && selectedIndex === selectedCards.length - 1
                    );
                    card.classList.toggle('is-correct', activityComplete);
                    card.setAttribute('aria-pressed', isSelected ? 'true' : 'false');
                    card.disabled = activityComplete;

                    if (number) {
                        number.textContent = isSelected ? selectedIndex + 1 : '–';
                    }
                });

                selectedCount.textContent = selectedCards.length;
                resetButton.disabled = selectedCards.length === 0;
            }

            function checkAnswer() {
                const isCorrect = selectedCards.every(function (card, index) {
                    return Number(card.dataset.correctPosition) === index + 1;
                });

                if (isCorrect) {
                    activityComplete = true;
                    setFeedback('success', 'Correct! Well done.');
                    renderCards();
                    return;
                }

                setFeedback('retry', 'Try again. Tap an event to change its position.');
            }

            function selectCard(card) {
                if (!card || activityComplete) return;

                setFeedback('', '');

                const selectedIndex = selectedCards.indexOf(card);

                if (selectedIndex !== -1) {
                    selectedCards = selectedCards.slice(0, selectedIndex);
                } else {
                    selectedCards.push(card);
                }

                renderCards();

                if (selectedCards.length === totalCards) {
                    window.setTimeout(checkAnswer, 180);
                }
            }

            function resetActivity() {
                selectedCards = [];
                activityComplete = false;

                setFeedback('', '');
                renderCards();
            }

            list.addEventListener('click', function (event) {
                const card = event.target.closest('.order-game-card'); 
                selectCard(card);
            });

            resetButton.addEventListener('click', resetActivity); 

            renderCards();

            // Keeps the activity compatible with the slider's global reset control.
            window.resetSlide = resetActivity;
        })();
    </script>
@endsection
