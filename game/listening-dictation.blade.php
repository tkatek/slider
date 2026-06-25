@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $items = is_array($content['items'] ?? null) ? array_values($content['items']) : [];
    $playerAudio = null;
    foreach ($items as $item) {
        if (!empty($item['audio'])) {
            $playerAudio = $item['audio'];
            break;
        }
    }

    $scriptLines = [];
    $hasScript = false;

    $theme = $theme ?? [];
    $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500'));
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));

    $componentId = str_replace('.', '_', uniqid('dictation_', true));
@endphp

@section('title', $content['page_title'] ?? $content['title'] ?? 'Listening Dictation')

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-3 sm:py-4 lg:py-5">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-3 py-3 sm:px-4 lg:px-6">
            <div
                    id="{{ $componentId }}"
                    class="mx-auto w-full overflow-hidden rounded-[1.35rem] border border-slate-200/90 bg-white/95 p-3 shadow-2xl shadow-slate-900/10 dark:border-slate-700/80 dark:bg-slate-950/80 sm:rounded-[1.75rem] sm:p-4 lg:p-5"
            >
                <div class="pointer-events-none -mx-3 -mt-3 mb-4 h-1.5 {{ $primaryGradient }} sm:-mx-4 sm:-mt-4 lg:-mx-5 lg:-mt-5"></div>

                @if(count($items))
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <button
                                type="button"
                                data-action="prev"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-transparent text-lg font-black text-white shadow-lg shadow-slate-900/15 transition hover:-translate-y-0.5 hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-indigo-400/25 disabled:cursor-not-allowed disabled:opacity-40 {{ $buttonGradient }}"
                                aria-label="Previous sentence"
                        >
                            &larr;
                        </button>

                        <div class="rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-black text-slate-700 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200">
                            <span data-progress>1 / {{ count($items) }}</span>
                        </div>

                        <button
                                type="button"
                                data-action="next"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-transparent text-lg font-black text-white shadow-lg shadow-slate-900/15 transition hover:-translate-y-0.5 hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-indigo-400/25 disabled:cursor-not-allowed disabled:opacity-40 {{ $buttonGradient }}"
                                aria-label="Next sentence"
                        >
                            &rarr;
                        </button>
                    </div>

                    @if($playerAudio)
                        <div data-audio-shell class="mx-auto mb-4 max-w-3xl">
                            @include('slider.components.audio-player')
                        </div>
                    @endif

                    <textarea
                            data-answer-input
                            class="min-h-[8rem] w-full resize-none rounded-2xl border border-slate-300 bg-white px-4 py-4 text-base font-extrabold leading-7 text-slate-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/15 data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-800 data-[state=wrong]:border-rose-500 data-[state=wrong]:bg-rose-50 data-[state=wrong]:text-rose-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:placeholder:text-slate-500 dark:focus:border-indigo-400 dark:focus:ring-indigo-400/15 dark:data-[state=correct]:border-emerald-400 dark:data-[state=correct]:bg-emerald-950/40 dark:data-[state=correct]:text-emerald-100 dark:data-[state=wrong]:border-rose-400 dark:data-[state=wrong]:bg-rose-950/40 dark:data-[state=wrong]:text-rose-100 sm:min-h-[9rem] sm:text-lg"
                            placeholder="{{ $content['placeholder'] ?? 'Type the full sentence...' }}"
                            autocomplete="off"
                            spellcheck="false"
                            aria-label="Type what you hear"
                    ></textarea>

                    <div class="mt-3 grid gap-2 sm:grid-cols-[auto_minmax(0,1fr)] sm:items-center sm:justify-between">
                        <div class="grid grid-cols-2 gap-2 sm:flex sm:items-center">
                            <button
                                    type="button"
                                    data-action="check"
                                    class="inline-flex h-11 items-center justify-center rounded-xl px-5 text-sm font-black text-white shadow-lg shadow-slate-900/15 transition hover:-translate-y-0.5 hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-indigo-400/25 active:translate-y-0 {{ $buttonGradient }}"
                            >
                                Check
                            </button>

                            <button
                                    type="button"
                                    data-action="reveal"
                                    class="inline-flex h-11 items-center justify-center rounded-xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 active:translate-y-0 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800 dark:focus:ring-slate-700"
                            >
                                Reveal answers
                            </button>
                        </div>

                        <p
                                data-feedback
                                data-state="neutral"
                                class="min-h-7 text-sm font-black leading-7 text-slate-500 data-[state=correct]:text-emerald-600 data-[state=wrong]:text-rose-600 dark:text-slate-400 dark:data-[state=correct]:text-emerald-300 dark:data-[state=wrong]:text-rose-300 sm:text-right"
                        ></p>
                    </div>
                @else
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-6 text-center text-sm font-black text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-400">
                        No dictation items added yet.
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const initDictationActivity = () => {
                const root = document.getElementById(@json($componentId));

                if (!root || root.dataset.ready === '1') return;

                root.dataset.ready = '1';

                const items = @json($items);
                const input = root.querySelector('[data-answer-input]');
                const feedback = root.querySelector('[data-feedback]');
                const progress = root.querySelector('[data-progress]');
                const prevBtn = root.querySelector('[data-action="prev"]');
                const nextBtn = root.querySelector('[data-action="next"]');
                const checkBtn = root.querySelector('[data-action="check"]');
                const revealBtn = root.querySelector('[data-action="reveal"]');
                const audio = root.querySelector('[data-audio-shell] audio');

                let index = 0;
                const typedAnswers = Array(items.length).fill('');
                const completed = Array(items.length).fill(false);
                let isRevealed = false;

                const normalize = value => String(value || '')
                    .trim()
                    .toLowerCase()
                    .replace(/[\u2019\u2018]/g, "'")
                    .replace(/[\u201c\u201d]/g, '"')
                    .replace(/[.,!?;:]/g, '')
                    .replace(/\s+/g, ' ');

                const setFeedback = (message = '', state = 'neutral') => {
                    if (!feedback) return;

                    feedback.textContent = message;
                    feedback.dataset.state = state;
                };

                const getItemAnswer = item => String(item?.answer || item?.script || '').trim();

                const setAudioSource = src => {
                    if (!audio) return;

                    audio.pause();
                    audio.currentTime = 0;

                    if (src) {
                        audio.src = src;
                    } else {
                        audio.removeAttribute('src');
                    }

                    audio.querySelectorAll('source').forEach(source => {
                        source.src = src || '';
                    });

                    audio.load();
                };

                const saveCurrentAnswer = () => {
                    if (!input || isRevealed) return;

                    typedAnswers[index] = input.value;
                };

                const updateRevealButton = () => {
                    if (!revealBtn) return;

                    revealBtn.textContent = isRevealed ? 'Retake test' : 'Reveal answers';
                };

                const loadItem = newIndex => {
                    if (!items.length) return;

                    saveCurrentAnswer();
                    index = Math.max(0, Math.min(items.length - 1, newIndex));

                    setAudioSource(items[index]?.audio || '');

                    if (input) {
                        input.value = isRevealed ? getItemAnswer(items[index]) : (typedAnswers[index] || '');
                        input.dataset.state = completed[index] ? 'correct' : 'neutral';
                        input.readOnly = isRevealed;
                    }

                    if (progress) {
                        progress.textContent = `${index + 1} / ${items.length}`;
                    }

                    if (prevBtn) {
                        prevBtn.disabled = index === 0;
                    }

                    if (nextBtn) {
                        nextBtn.disabled = index === items.length - 1;
                    }

                    updateRevealButton();
                    setFeedback(completed[index] ? 'Correct answer saved.' : '', completed[index] ? 'correct' : 'neutral');
                };

                const checkAnswer = () => {
                    if (!input || !items[index]) return;

                    const typed = normalize(input.value);
                    const answer = normalize(getItemAnswer(items[index]));

                    if (typed !== '' && typed === answer) {
                        completed[index] = true;
                        input.dataset.state = 'correct';
                        setFeedback('Correct!', 'correct');
                        return;
                    }

                    input.dataset.state = 'wrong';
                    setFeedback('Try again. Listen one more time.', 'wrong');
                };

                const stopSlideMedia = () => {
                    if (audio) {
                        audio.pause();
                    }

                    window.stopAudioPlayer?.();
                };

                input?.addEventListener('input', () => {
                    if (isRevealed) return;

                    typedAnswers[index] = input.value;
                    input.dataset.state = 'neutral';
                    setFeedback();
                });

                checkBtn?.addEventListener('click', checkAnswer);
                prevBtn?.addEventListener('click', () => loadItem(index - 1));
                nextBtn?.addEventListener('click', () => loadItem(index + 1));

                revealBtn?.addEventListener('click', () => {
                    if (!isRevealed) {
                        items.forEach((item, itemIndex) => {
                            typedAnswers[itemIndex] = getItemAnswer(item);
                            completed[itemIndex] = true;
                        });

                        isRevealed = true;
                        loadItem(index);
                        setFeedback('Answers revealed.', 'correct');
                        return;
                    }

                    stopSlideMedia();
                    typedAnswers.fill('');
                    completed.fill(false);
                    isRevealed = false;
                    loadItem(0);
                    setFeedback();
                });

                window.stopSlideAudio = stopSlideMedia;
                window.destroySlide = stopSlideMedia;
                window.resetSlide = () => {
                    stopSlideMedia();
                    typedAnswers.fill('');
                    completed.fill(false);
                    isRevealed = false;
                    loadItem(0);
                    setFeedback();
                };

                loadItem(0);
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initDictationActivity, { once: true });
            } else {
                initDictationActivity();
            }
        })();
    </script>
@endsection
