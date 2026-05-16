@extends('slider.simple-layout')

@section('content')
    @php
        $theme = $theme ?? [];

        $titleGradient = $theme['title_gradient_class']
            ?? 'bg-gradient-to-r from-indigo-600 via-blue-600 to-sky-500 bg-clip-text text-transparent';

        $buttonGradient = $theme['button_gradient_class']
            ?? 'bg-gradient-to-r from-indigo-600 to-blue-600';

        $ringAccent = $theme['ring_accent_class']
            ?? 'focus:border-indigo-500 focus:ring-indigo-500/10 dark:focus:border-indigo-300';

        $activeTabClasses = $buttonGradient . ' border-transparent text-white shadow-sm shadow-indigo-500/20';

        $inactiveTabClasses = 'border-slate-200 bg-white text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800';
    @endphp

    <main class="flex min-h-[100dvh] w-full items-center justify-center px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 grid gap-4 lg:grid-cols-[0.9fr_1.1fr]">
                <article class="rounded-[1.5rem] border border-slate-200 bg-white/80 p-4 shadow-sm backdrop-blur dark:border-slate-700 dark:bg-slate-900/75 sm:p-5">
                    <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-400 dark:text-slate-500">
                        Reading
                    </p>

                    <h2 class="{{ $titleGradient }} mt-1 text-xl font-black tracking-[-0.02em] sm:text-2xl">
                        {{ $content['reading_title'] ?? 'Reading' }}
                    </h2>

                    <div class="mt-4 space-y-3">
                        @foreach($content['passage'] ?? [] as $paragraph)
                            <p class="rounded-2xl bg-slate-50 px-4 py-3 text-sm font-semibold leading-[1.55] text-slate-600 dark:bg-slate-950/60 dark:text-slate-300 sm:text-base">
                                {{ $paragraph }}
                            </p>
                        @endforeach
                    </div>
                </article>

                <section class="rounded-[1.5rem] border border-slate-200 bg-white/80 p-4 shadow-sm backdrop-blur dark:border-slate-700 dark:bg-slate-900/75 sm:p-5">
                    <div class="mb-4 flex items-center justify-between gap-3">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-400 dark:text-slate-500">
                                Questions
                            </p>

                            <h2 class="text-xl font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-2xl">
                                Write your answer
                            </h2>
                        </div>

                        <button
                                type="button"
                                id="clearAllAnswersBtn"
                                class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-black text-slate-500 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800"
                        >
                            Clear
                        </button>
                    </div>

                    <div class="mb-4 flex gap-2 overflow-x-auto pb-1">
                        @foreach($content['questions'] ?? [] as $index => $question)
                            <button
                                    type="button"
                                    data-question-tab="{{ $index }}"
                                    class="shrink-0 rounded-full border px-4 py-2 text-sm font-black transition {{ $index === 0 ? $activeTabClasses : $inactiveTabClasses }}"
                            >
                                Q{{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>

                    @foreach($content['questions'] ?? [] as $index => $question)
                        <div
                                data-question-panel="{{ $index }}"
                                class="{{ $index === 0 ? 'block' : 'hidden' }}"
                        >
                            <div class="rounded-3xl bg-slate-50 p-4 dark:bg-slate-950/60 sm:p-5">
                                <p class="text-base font-black leading-[1.5] text-slate-900 dark:text-slate-50 sm:text-lg">
                                    {{ $question }}
                                </p>

                                <textarea
                                        name="answer_{{ $index }}"
                                        data-answer-box="{{ $index }}"
                                        rows="7"
                                        placeholder="Type your answer here..."
                                        class="mt-4 min-h-[13rem] w-full resize-none rounded-3xl border-2 border-slate-200 bg-white px-5 py-4 text-base font-bold leading-[1.6] text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-4 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 {{ $ringAccent }}"
                                ></textarea>

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <p class="text-xs font-black text-slate-400 dark:text-slate-500">
                                        Give reasons and examples.
                                    </p>

                                    <span
                                            data-word-counter="{{ $index }}"
                                            class="rounded-full bg-white px-3 py-1 text-xs font-black text-slate-500 dark:bg-slate-900 dark:text-slate-300"
                                    >
                                        0 words
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = `reading-response-${window.location.pathname}`;
            const tabs = Array.from(document.querySelectorAll('[data-question-tab]'));
            const panels = Array.from(document.querySelectorAll('[data-question-panel]'));
            const textareas = Array.from(document.querySelectorAll('[data-answer-box]'));
            const counters = Array.from(document.querySelectorAll('[data-word-counter]'));
            const clearButton = document.getElementById('clearAllAnswersBtn');

            const activeTabClasses = @json(explode(' ', $activeTabClasses));
            const inactiveTabClasses = @json(explode(' ', $inactiveTabClasses));

            const countWords = (text) => text.trim().split(/\s+/).filter(Boolean).length;

            const updateCounter = (textarea) => {
                const index = Number(textarea.dataset.answerBox);
                const words = countWords(textarea.value);
                const counter = counters.find((item) => Number(item.dataset.wordCounter) === index);

                if (counter) {
                    counter.textContent = `${words} ${words === 1 ? 'word' : 'words'}`;
                }
            };

            const saveAnswers = () => {
                const answers = {};

                textareas.forEach((textarea) => {
                    answers[textarea.name] = textarea.value;
                });

                localStorage.setItem(storageKey, JSON.stringify(answers));
            };

            const showQuestion = (activeIndex) => {
                tabs.forEach((tab, index) => {
                    tab.classList.remove(...activeTabClasses, ...inactiveTabClasses);
                    tab.classList.add(...(index === activeIndex ? activeTabClasses : inactiveTabClasses));
                });

                panels.forEach((panel, index) => {
                    panel.classList.toggle('hidden', index !== activeIndex);
                    panel.classList.toggle('block', index === activeIndex);
                });
            };

            try {
                const savedAnswers = JSON.parse(localStorage.getItem(storageKey) || '{}');

                textareas.forEach((textarea) => {
                    textarea.value = savedAnswers[textarea.name] || '';
                    updateCounter(textarea);
                });
            } catch (error) {}

            tabs.forEach((tab) => {
                tab.addEventListener('click', () => {
                    showQuestion(Number(tab.dataset.questionTab));
                });
            });

            textareas.forEach((textarea) => {
                textarea.addEventListener('input', () => {
                    updateCounter(textarea);
                    saveAnswers();
                });
            });

            clearButton?.addEventListener('click', () => {
                textareas.forEach((textarea) => {
                    textarea.value = '';
                    updateCounter(textarea);
                });

                localStorage.removeItem(storageKey);
                showQuestion(0);
            });

            window.resetSlide = () => {
                textareas.forEach((textarea) => {
                    textarea.value = '';
                    updateCounter(textarea);
                });

                localStorage.removeItem(storageKey);
                showQuestion(0);
            };
        });
    </script>
@endsection