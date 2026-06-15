@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Practice 1: Warm-up',
        'subtitle' => 'Read the sentence, then use “wish” for making past wishes. Flip the card to check your answer<br>make sure you use: I wish I had (not) done something ',

        'grid_class' => 'grid-cols-2 md:grid-cols-4 lg:grid-cols-5',



        'items' => [
            [
                'emoji'    => '💇',
                'question' => 'I had my hair cut and it looks awful.',
                'answer'   => 'I wish I hadn’t had my hair cut.',
            ],
            [
                'emoji'    => '😡',
                'question' => 'I had a fight with my parents.',
                'answer'   => 'I wish I hadn’t had a fight with my parents.',
            ],
            [
                'emoji'    => '🍬',
                'question' => 'I ate too much sugar at the party yesterday.',
                'answer'   => 'I wish I hadn’t eaten so much sugar at the party.',
            ],
            [
                'emoji'    => '📺',
                'question' => 'I spent the night watching TV.',
                'answer'   => 'I wish I hadn’t spent the night watching TV.',
            ],
            [
                'emoji'    => '🤥',
                'question' => 'I lied to my best friend.',
                'answer'   => 'I wish I hadn’t lied to my best friend.',
            ],
            [
                'emoji'    => '🎤',
                'question' => 'I screamed too much during the concert.',
                'answer'   => 'I wish I hadn’t screamed so much during the concert.',
            ],
            [
                'emoji'    => '💧',
                'question' => 'I spent the whole day yesterday without drinking water.',
                'answer'   => 'I wish I had drunk water yesterday.',
            ],
            [
                'emoji'    => '🏃',
                'question' => 'I spent the whole semester without practicing physical activities.',
                'answer'   => 'I wish I had practiced physical activities during the semester.',
            ],
            [
                'emoji'    => '💔',
                'question' => 'I put too much expectation on a relationship.',
                'answer'   => 'I wish I hadn’t put too much expectation on a relationship.',
            ],
            [
                'emoji'    => '💸',
                'question' => 'I lent two thousand dollars to someone I don’t trust.',
                'answer'   => 'I wish I hadn’t lent two thousand dollars to that person.',
            ],
        ],
    ];

    $sounds = array_replace([
        'click' => materialAsset('slider/sounds/tap.wav'),
        'done'  => materialAsset('slider/sounds/correct.wav'),
        'skip'  => materialAsset('slider/sounds/click.wav'),
    ], $content['sounds'] ?? []);
@endphp

@section('title', $content['title'] ?? '')

@section('content')
    <main data-wish-game class="relative flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-5 dark:text-slate-100 sm:px-6 lg:px-8">
        <section class="w-full max-w-[94rem]">
            <div class="grid place-items-center gap-5 text-center">
                @include('slider.components.title-subtitle')

                <section class="w-full rounded-[2rem] border border-slate-200 bg-white/80 p-4 shadow-xl shadow-slate-900/10 backdrop-blur dark:border-slate-700 dark:bg-slate-900/80 sm:p-5 lg:p-6">
                    <div id="quizGrid" class="grid {{ $content['grid_class'] }} gap-3 sm:gap-4">
                        @foreach($content['items'] as $idx => $item)
                            <button
                                    type="button"
                                    data-idx="{{ $idx }}"
                                    class="wish-card group relative flex min-h-[8.5rem] flex-col items-center justify-center gap-2 rounded-[1.5rem] border border-slate-200 bg-slate-50 p-4 text-center shadow-md shadow-slate-900/5 transition duration-300 hover:-translate-y-1 hover:border-purple-300 hover:bg-purple-50 hover:shadow-lg dark:border-slate-700 dark:bg-slate-800/70 dark:hover:border-purple-500/60 dark:hover:bg-purple-500/10"
                            >
                                <div
                                        data-card-number
                                        class="absolute right-3 top-3 flex h-8 w-8 items-center justify-center rounded-full bg-white text-sm font-black text-slate-700 shadow-sm dark:bg-slate-900 dark:text-slate-200"
                                >
                                    {{ $idx + 1 }}
                                </div>

                                <div data-card-emoji class="text-4xl sm:text-5xl">
                                    {{ $item['emoji'] }}
                                </div>

                                <p data-card-text class="text-sm font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-base lg:text-lg">
                                    {{ $item['question'] }}
                                </p>
                            </button>
                        @endforeach
                    </div>
                </section>
            </div>
        </section>

        <div id="modal" class="fixed inset-0 z-50 hidden">
            <div id="modalBg" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

            <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                <div class="max-h-[85dvh] w-full max-w-4xl overflow-y-auto rounded-3xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center justify-between gap-4">
                            <div class="text-[11px] font-black uppercase tracking-[0.25em] text-slate-500 dark:text-slate-400">
                                Situation
                            </div>

                            <button
                                    id="modalClose"
                                    type="button"
                                    class="rounded-full p-2 text-slate-500 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800"
                            >
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <div class="mt-5 grid gap-5">
                            <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-6 text-center dark:border-slate-700 dark:bg-slate-800/60">
                                <div id="mEmoji" class="mb-4 text-6xl"></div>

                                <h2 id="mQuestion" class="text-2xl font-black leading-tight text-slate-900 dark:text-white sm:text-3xl"></h2>
                            </div>

                            <button
                                    id="checkBtn"
                                    type="button"
                                    class="w-full rounded-2xl bg-purple-600 px-6 py-4 text-base font-black text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500 sm:text-lg"
                            >
                                Reveal Wish Sentence
                            </button>

                            <div id="mAnswerContainer" class="hidden">
                                <div class="rounded-2xl border border-purple-200 bg-purple-50 p-5 text-center dark:border-purple-500/30 dark:bg-purple-500/10">
                                    <div class="text-xs font-black uppercase tracking-[0.2em] text-purple-600 dark:text-purple-300">
                                        Wish Sentence
                                    </div>

                                    <p id="mAnswerText" class="mt-3 text-2xl font-black leading-relaxed text-slate-900 dark:text-slate-100 sm:text-3xl"></p>
                                </div>

                                <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
                                    <button
                                            id="oopsBtn"
                                            type="button"
                                            class="w-full rounded-2xl border border-rose-200 bg-rose-50 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-rose-700 transition hover:bg-rose-100 dark:border-rose-500/30 dark:bg-rose-500/10 dark:text-rose-300"
                                    >
                                        Oops
                                    </button>

                                    <button
                                            id="correctBtn"
                                            type="button"
                                            class="w-full rounded-2xl border border-emerald-200 bg-emerald-50 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-emerald-700 transition hover:bg-emerald-100 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300"
                                    >
                                        Correct
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="resultsOverlay" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

            <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                <div class="w-full max-w-md rounded-3xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
                    <div class="p-6 text-center sm:p-8">
                        <div class="mb-3 text-6xl">🎉</div>

                        <h2 class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">
                            Done!
                        </h2>

                        <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <button
                                    id="btnRestartPopup"
                                    type="button"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-8 py-3 font-black text-slate-900 shadow transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700"
                            >
                                Restart 🔁
                            </button>

                            <button
                                    id="btnContinue"
                                    type="button"
                                    class="w-full rounded-2xl bg-purple-600 px-8 py-3 font-black text-white shadow transition hover:bg-purple-500"
                            >
                                Continue ⚡
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.querySelector('[data-wish-game]');
            if (!root) return;

            const ITEMS = @json($content['items']);
            const SOUNDS = @json($sounds);

            const state = {
                done: Array(ITEMS.length).fill(null),
                current: null,
            };

            const sfx = new Audio();

            const elements = {
                modal: root.querySelector('#modal'),
                modalBg: root.querySelector('#modalBg'),
                modalClose: root.querySelector('#modalClose'),
                mEmoji: root.querySelector('#mEmoji'),
                mQuestion: root.querySelector('#mQuestion'),
                mAnswerContainer: root.querySelector('#mAnswerContainer'),
                mAnswerText: root.querySelector('#mAnswerText'),
                checkBtn: root.querySelector('#checkBtn'),
                resultsOverlay: root.querySelector('#resultsOverlay'),
                btnRestartPopup: root.querySelector('#btnRestartPopup'),
                btnContinue: root.querySelector('#btnContinue'),
                cards: Array.from(root.querySelectorAll('.wish-card')),
            };

            function stopAllAudio() {
                try {
                    sfx.pause();
                    sfx.currentTime = 0;
                } catch (error) {}
            }

            window.stopSlideAudio = stopAllAudio;

            function playSound(key) {
                if (!SOUNDS?.[key]) return;

                try {
                    sfx.pause();
                    sfx.currentTime = 0;
                    sfx.src = SOUNDS[key];
                    sfx.play().catch(() => {});
                } catch (error) {}
            }

            function hideQuestionModal() {
                elements.modal.classList.add('hidden');
                state.current = null;
            }

            function hideResultsOverlay() {
                elements.resultsOverlay.classList.add('hidden');
            }

            function showResultsOverlay() {
                elements.resultsOverlay.classList.remove('hidden');
                playSound('done');
            }

            function isComplete() {
                return state.done.every((value) => value !== null);
            }

            function openQuestion(idx) {
                if (state.done[idx] !== null) return;

                state.current = idx;
                const item = ITEMS[idx];

                elements.mEmoji.textContent = item.emoji || '';
                elements.mQuestion.textContent = item.question;
                elements.mAnswerText.textContent = item.answer || '...';

                elements.checkBtn.classList.remove('hidden');
                elements.mAnswerContainer.classList.add('hidden');
                elements.modal.classList.remove('hidden');

                playSound('click');
            }

            function setCardResult(card, status) {
                card.classList.add('pointer-events-none');

                const text = card.querySelector('[data-card-text]');
                const number = card.querySelector('[data-card-number]');

                if (status === 'correct') {
                    card.classList.remove('bg-slate-50', 'dark:bg-slate-800/70');
                    card.classList.add('bg-emerald-500', 'border-emerald-300');

                    text?.classList.remove('text-slate-900', 'dark:text-slate-100');
                    text?.classList.add('text-white');

                    number?.classList.remove('bg-white', 'text-slate-700', 'dark:bg-slate-900', 'dark:text-slate-200');
                    number?.classList.add('bg-white/20', 'text-white');
                }

                if (status === 'oops') {
                    card.classList.remove('bg-slate-50', 'dark:bg-slate-800/70');
                    card.classList.add('bg-rose-500', 'border-rose-300');

                    text?.classList.remove('text-slate-900', 'dark:text-slate-100');
                    text?.classList.add('text-white');

                    number?.classList.remove('bg-white', 'text-slate-700', 'dark:bg-slate-900', 'dark:text-slate-200');
                    number?.classList.add('bg-white/20', 'text-white');
                }
            }

            function resetCard(card) {
                card.classList.remove(
                    'pointer-events-none',
                    'bg-emerald-500',
                    'border-emerald-300',
                    'bg-rose-500',
                    'border-rose-300'
                );

                card.classList.add('bg-slate-50', 'dark:bg-slate-800/70');

                const text = card.querySelector('[data-card-text]');
                const number = card.querySelector('[data-card-number]');

                text?.classList.remove('text-white');
                text?.classList.add('text-slate-900', 'dark:text-slate-100');

                number?.classList.remove('bg-white/20', 'text-white');
                number?.classList.add('bg-white', 'text-slate-700', 'dark:bg-slate-900', 'dark:text-slate-200');
            }

            function grade(status) {
                const idx = state.current;
                if (idx === null || state.done[idx] !== null) return;

                state.done[idx] = status;

                const card = root.querySelector(`.wish-card[data-idx="${idx}"]`);
                setCardResult(card, status);

                playSound(status === 'correct' ? 'done' : 'skip');

                hideQuestionModal();

                if (isComplete()) {
                    setTimeout(showResultsOverlay, 280);
                }
            }

            function resetGame() {
                state.done = Array(ITEMS.length).fill(null);
                state.current = null;

                hideQuestionModal();
                hideResultsOverlay();
                stopAllAudio();

                elements.cards.forEach(resetCard);
            }

            function isEmbedded() {
                try {
                    return window.top !== window.self;
                } catch (error) {
                    return true;
                }
            }

            function goNextSlide() {
                resetGame();

                if (isEmbedded()) {
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
            }

            window.resetSlide = resetGame;

            elements.cards.forEach((card) => {
                card.addEventListener('click', () => openQuestion(parseInt(card.dataset.idx, 10)));
            });

            elements.checkBtn.addEventListener('click', () => {
                elements.checkBtn.classList.add('hidden');
                elements.mAnswerContainer.classList.remove('hidden');
                playSound('click');
            });

            root.querySelector('#oopsBtn').addEventListener('click', () => grade('oops'));
            root.querySelector('#correctBtn').addEventListener('click', () => grade('correct'));

            elements.modalClose.addEventListener('click', hideQuestionModal);
            elements.modalBg.addEventListener('click', hideQuestionModal);

            elements.btnRestartPopup.addEventListener('click', resetGame);
            elements.btnContinue.addEventListener('click', goNextSlide);
        });
    </script>
@endsection