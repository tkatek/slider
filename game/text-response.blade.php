@extends('slider.simple-layout')

@section('content')
    @php
        $theme = $theme ?? [];
        $buttonGradient = trim((string)($theme['button_primary_color'] ?? 'bg-gradient-to-tr from-blue-500 via-indigo-500 to-purple-600'));
        $items = is_array($content['items'] ?? null) ? $content['items'] : [];
    @endphp

    <main class="flex min-h-[100dvh] w-full flex-col justify-center px-4 py-4 sm:px-6 lg:px-8">
        @include('slider.components.title-subtitle', [
            'title' => $content['title'] ?? '',
            'subtitle' => $content['subtitle'] ?? '',
        ])

        <section class="mx-auto mt-4 w-full max-w-4xl xl:mt-5 xl:max-w-5xl">
            <div class="overflow-hidden rounded-[1.5rem] border border-white/80 bg-white/85 p-3 shadow-[0_18px_50px_-34px_rgba(15,23,42,0.35)] backdrop-blur-xl dark:border-white/10 dark:bg-slate-900/70 sm:p-4 xl:p-5">
                <div class="grid gap-2.5 sm:gap-3">
                    @foreach($items as $item)
                        <article class="rounded-2xl border border-slate-200/70 bg-white/90 px-3 py-2.5 shadow-sm dark:border-slate-700/70 dark:bg-slate-950/35 sm:px-4 sm:py-3 xl:px-5 xl:py-4">
                            <div class="flex items-center gap-3 lg:gap-4">
                                <div class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-slate-100 text-lg shadow-inner dark:bg-white/10 sm:h-10 sm:w-10 sm:text-xl">
                                    {{ $item['emoji'] ?? '✎' }}
                                </div>

                                <div class="flex min-w-0 flex-1 flex-wrap items-center gap-x-1.5 gap-y-1 text-sm font-bold leading-snug text-slate-900 dark:text-slate-50 sm:gap-x-2 sm:text-base lg:text-lg xl:text-xl">
                                    @if(!empty($item['prefix']))
                                        <span>{{ $item['prefix'] }}</span>
                                    @endif

                                    <input
                                            type="text"
                                            class="answer-input h-9 min-w-[6.5rem] max-w-full rounded-xl border border-slate-300 bg-slate-50 px-2.5 text-center text-sm font-bold text-slate-950 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-50 dark:focus:ring-emerald-900/40 sm:h-10 sm:min-w-[7rem] sm:text-base lg:min-w-[7.5rem] lg:text-base xl:h-11 xl:min-w-[8.5rem] xl:text-lg"
                                            data-answer="{{ $item['answer'] ?? '' }}"
                                            data-answers='@json($item['answers'] ?? [$item['answer'] ?? ''])'
                                            placeholder="..."
                                            autocomplete="off"
                                            style="width: 7.5rem;"
                                    >

                                    @if(!empty($item['hint']))
                                        <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[0.68rem] font-black text-slate-500 dark:bg-white/10 dark:text-slate-300 sm:text-xs">
                                            ({{ $item['hint'] }})
                                        </span>
                                    @endif

                                    @if(!empty($item['suffix']))
                                        <span>{{ $item['suffix'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-3 grid grid-cols-2 gap-2.5 sm:mt-4 sm:gap-3">
                    <button
                            type="button"
                            id="checkAnswersBtn"
                            class="min-h-10 rounded-full px-4 py-2 text-xs font-black text-white shadow-md transition hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-slate-300/60 dark:focus:ring-slate-600 sm:min-h-11 sm:text-sm {{ $buttonGradient }}"
                    >
                        Check answers
                    </button>

                    <button
                            type="button"
                            id="revealAnswersBtn"
                            class="min-h-10 rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 dark:focus:ring-slate-700 sm:min-h-11 sm:text-sm"
                    >
                        Show answers
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const inputs = Array.from(document.querySelectorAll('.answer-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');

            let isRevealed = false;

            const sfx = {
                tap: new Audio('/slider/sounds/tap.wav'),
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            function normalize(value) {
                return String(value || '')
                    .trim()
                    .toLowerCase()
                    .replace(/\s+/g, ' ');
            }

            function getAnswers(input) {
                try {
                    return JSON.parse(input.dataset.answers || '[]');
                } catch (e) {
                    return [input.dataset.answer || ''];
                }
            }

            function playSfx(type) {
                const sound = sfx[type];

                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function resizeInput(input) {
                const value = input.value || input.placeholder || '';

                const minCh = window.innerWidth >= 1280
                    ? 9
                    : window.innerWidth >= 1024
                        ? 8
                        : window.innerWidth >= 640
                            ? 8
                            : 7;

                const maxCh = window.innerWidth >= 1280
                    ? 24
                    : window.innerWidth >= 1024
                        ? 20
                        : window.innerWidth >= 640
                            ? 18
                            : 16;

                const widthCh = Math.min(Math.max(value.length + 2, minCh), maxCh);

                input.style.width = `${widthCh}ch`;
            }

            const neutralInputClasses = [
                'border-slate-300',
                'bg-slate-50',
                'text-slate-950',
                'dark:border-slate-700',
                'dark:bg-slate-950/60',
                'dark:text-slate-50',
            ];

            const correctInputClasses = [
                'border-emerald-500',
                'bg-emerald-50',
                'text-emerald-800',
                'dark:border-emerald-400',
                'dark:bg-emerald-950/45',
                'dark:text-emerald-100',
            ];

            const wrongInputClasses = [
                'border-rose-500',
                'bg-rose-50',
                'text-rose-800',
                'dark:border-rose-400',
                'dark:bg-rose-950/45',
                'dark:text-rose-100',
            ];

            const allStateClasses = [
                ...neutralInputClasses,
                ...correctInputClasses,
                ...wrongInputClasses,
            ];

            function setInputState(input, state = 'neutral') {
                input.classList.remove(...allStateClasses);

                if (state === 'correct') {
                    input.classList.add(...correctInputClasses);
                    return;
                }

                if (state === 'wrong') {
                    input.classList.add(...wrongInputClasses);
                    return;
                }

                input.classList.add(...neutralInputClasses);
            }

            function checkAnswers() {
                let correctCount = 0;

                inputs.forEach((input) => {
                    const answers = getAnswers(input);
                    const isCorrect = answers.some(answer => normalize(input.value) === normalize(answer));

                    setInputState(input, isCorrect ? 'correct' : 'wrong');

                    if (isCorrect) correctCount++;
                });

                playSfx(correctCount === inputs.length && inputs.length > 0 ? 'success' : 'wrong');
            }

            function revealAnswers() {
                inputs.forEach((input) => {
                    input.value = input.dataset.answer || '';
                    resizeInput(input);
                    setInputState(input, 'correct');
                });

                isRevealed = true;
                revealBtn.textContent = 'Try again';
                playSfx('success');
            }

            function resetAnswers(playSound = true) {
                inputs.forEach((input) => {
                    input.value = '';
                    resizeInput(input);
                    setInputState(input, 'neutral');
                });

                isRevealed = false;
                revealBtn.textContent = 'Show answers';

                if (playSound) playSfx('tap');
            }

            inputs.forEach((input) => {
                input.addEventListener('focus', () => playSfx('tap'));

                input.addEventListener('input', () => {
                    resizeInput(input);
                    setInputState(input, 'neutral');
                });

                resizeInput(input);
                setInputState(input, 'neutral');
            });

            window.addEventListener('resize', () => {
                inputs.forEach(resizeInput);
            });

            checkBtn?.addEventListener('click', checkAnswers);

            revealBtn?.addEventListener('click', () => {
                if (isRevealed) {
                    resetAnswers(true);
                    return;
                }

                revealAnswers();
            });

            window.resetSlide = () => resetAnswers(false);
            window.destroySlide = () => {};
            window.stopSlideAudio = () => {};
        })();
    </script>
@endsection