<?php

$content = [
    'title'       => 'Listening task: Strange stories',
    'subtitle'    => '',
    'type'        => 'audio',
    'audio'       => materialAsset("slider/B1/Advanced/chapter-3/audios/slide11.mp3"),

    'instruction'      => 'Listen. People are telling strange stories. Which book or magazine does each story come from?',
    'instruction_note' => 'Number the covers from 1 to 4. Leave the extra cover empty.',

    'script' => [
        '1',
        "A few years ago, my wife and I were driving home after a party. Suddenly, we saw a bright green light in the sky. We stopped the car to look at it.",
        "The object stayed above us. It looked different from any plane or helicopter. For a moment, we thought we saw strange creatures looking down at us.",
        "We became very scared. We tried to drive away, but the car wouldn't start. Then a bright light came towards us, and everything became very hot.",
        "The next thing I remember was waking up in our car. We were at home in our driveway. We couldn't remember how we got there. Later, we discovered that two whole days had passed.",

        '2',
        "About ten years ago, my wife and I moved into a new house. Our friend Bill came to stay with us for a few days. He slept in the guest room upstairs.",
        "Around midnight, Bill woke us up. He said he had heard a strange noise coming from the closet in his room.",
        "He got out of bed and carefully opened the closet door. At first, he thought he was dreaming. Then he saw a woman standing inside the closet. She didn't move or speak.",
        "Bill closed his eyes for a second. When he looked again, she had disappeared.",
        "Bill still believes that what he saw was real.",

        '3',
        "A few years ago, I had a very strange experience. I usually sleep well, but one night I couldn't fall asleep until about three o'clock in the morning.",
        "At five o'clock, I suddenly woke up. I was sitting in bed, calling for my mother. I don't remember having a bad dream, but I felt that I really needed her.",
        "After a while, I calmed down and went back to sleep.",
        "At seven o'clock, the phone rang. It was my mother. She told me she had been awake since five because she was worried about me. She didn't know why, but she wanted to check that I was safe.",
        "I've never forgotten that strange coincidence.",
    ],

    'covers' => [
        [
            'image'   => materialAsset("slider/B1/Advanced/chapter-3/img/slide11/esp-illustrated.webp"),
            'alt'     => 'ESP Illustrated cover',
            'correct' => '4',
        ],
        [
            'image'   => materialAsset("slider/B1/Advanced/chapter-3/img/slide11/creatures-from-beyond.webp"),
            'alt'     => 'Creatures From Beyond cover',
            'correct' => '1',
        ],
        [
            'image'   => materialAsset("slider/B1/Advanced/chapter-3/img/slide11/tales-from-outer-space.webp"),
            'alt'     => 'Tales From Outer Space cover',
            'correct' => '2',
        ],
        [
            'image'   => materialAsset("slider/B1/Advanced/chapter-3/img/slide11/animal-psychics.webp"),
            'alt'     => 'Animal Psychics cover',
            'correct' => '',
        ],
        [
            'image'   => materialAsset("slider/B1/Advanced/chapter-3/img/slide11/phantom-weekly.webp"),
            'alt'     => 'Phantom Weekly cover',
            'correct' => '3',
        ],
    ],
];

?>

{{-- resources/views/slider/game/number-the-covers.blade.php --}}

@extends('slider.simple-layout')

@php
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    $rawScriptLines = $content['transcript'] ?? ($content['script'] ?? []);

    $scriptLines = is_array($rawScriptLines)
        ? array_values(array_filter(
            array_map(static fn ($line) => trim((string) $line), $rawScriptLines),
            static fn ($line) => $line !== ''
        ))
        : [];

    $hasScript = $scriptLines !== [];

    $covers = is_array($content['covers'] ?? null) ? $content['covers'] : [];

    $theme = $theme ?? [];
    $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500'));
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));

    $sounds = array_replace(
        is_array($content['sounds'] ?? null) ? $content['sounds'] : [],
        is_array($content['sfx'] ?? null) ? $content['sfx'] : []
    );
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-7xl px-4 py-5 sm:px-8">
            @if($playerAudio)
                <div class="mx-auto mb-5 max-w-3xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="relative overflow-hidden rounded-[1.75rem] border border-slate-200/90 bg-white/95 p-4 shadow-[0_22px_58px_rgba(15,23,42,0.09)] dark:border-slate-700/80 dark:bg-slate-900/90 sm:p-6">
                <div class="pointer-events-none absolute inset-x-0 top-0 h-1.5 {{ $primaryGradient }}"></div>

                <div class="mb-5 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                    <div class="relative min-w-0 flex-1 overflow-hidden rounded-[1.25rem] border border-slate-200 bg-slate-50/80 px-4 py-3 dark:border-slate-700 dark:bg-slate-950/35">
                        <div class="pointer-events-none absolute bottom-0 left-0 top-0 w-1.5 {{ $primaryGradient }}"></div>

                        <h2 class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-lg">
                            {{ $content['instruction'] ?? 'Listen and number the covers from 1 to 4. There is one extra cover.' }}
                        </h2>

                        <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                            {{ $content['instruction_note'] ?? 'Leave the extra cover empty.' }}
                        </p>
                    </div>

                    <div class="grid w-full grid-cols-2 gap-1.5 sm:gap-2 lg:w-auto lg:flex lg:flex-wrap lg:items-center lg:justify-end">
                        <button
                                id="checkAnswersBtn"
                                type="button"
                                class="min-w-0 rounded-xl border border-white/20 px-2 py-2 text-[10px] font-black leading-tight text-white shadow-md transition hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-slate-300/60 dark:focus:ring-slate-600 sm:rounded-2xl sm:px-4 sm:py-2.5 sm:text-xs {{ $buttonGradient }}"
                        >
                            Check Answers
                        </button>

                        <button
                                id="revealAnswersBtn"
                                type="button"
                                data-mode="reveal"
                                class="min-w-0 rounded-xl border border-slate-200 bg-white px-2 py-2 text-[10px] font-black leading-tight text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800 dark:focus:ring-slate-700 sm:rounded-2xl sm:px-4 sm:py-2.5 sm:text-xs"
                        >
                            Reveal
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-5">
                    @foreach($covers as $index => $cover)
                        <article
                                data-cover-card
                                data-correct="{{ $cover['correct'] ?? '' }}"
                                class="group relative aspect-[3/4] overflow-hidden rounded-[1.5rem] border border-slate-200 bg-slate-100 shadow-sm transition data-[state=correct]:border-emerald-500 data-[state=wrong]:border-red-500 dark:border-slate-700 dark:bg-slate-800 dark:data-[state=correct]:border-emerald-500 dark:data-[state=wrong]:border-red-500"
                        >
                            <img
                                    src="{{ $cover['image'] ?? '' }}"
                                    alt="{{ $cover['alt'] ?? 'Book cover' }}"
                                    class="absolute inset-0 h-full w-full object-cover"
                            >

                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/35 via-transparent to-slate-950/10"></div>

                            <div class="absolute bottom-3 left-1/2 z-10 -translate-x-1/2">
                                <input
                                        type="text"
                                        maxlength="1"
                                        inputmode="numeric"
                                        class="cover-answer h-11 w-12 rounded-2xl border border-white/70 bg-white/90 text-center text-lg font-black uppercase text-slate-950 shadow-xl backdrop-blur outline-none transition placeholder:text-slate-400 focus:border-white focus:ring-4 focus:ring-white/40 data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-800 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-red-50 data-[state=wrong]:text-red-800 dark:border-white/40 dark:bg-slate-950/85 dark:text-white dark:focus:ring-white/20 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:bg-emerald-950/80 dark:data-[state=correct]:text-emerald-100 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:bg-red-950/80 dark:data-[state=wrong]:text-red-100 sm:h-12 sm:w-14 sm:text-xl"
                                        placeholder="-"
                                        aria-label="Answer for cover {{ $index + 1 }}"
                                >
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = Array.from(document.querySelectorAll('[data-cover-card]'));
            const inputs = Array.from(document.querySelectorAll('.cover-answer'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');

            const sounds = @json($sounds);
            const sfx = {
                tap: new Audio(sounds.tap || '/slider/sounds/tap.wav'),
                correct: new Audio(sounds.correct || '/slider/sounds/correct.wav'),
                wrong: new Audio(sounds.wrong || '/slider/sounds/wrong.wav'),
                success: new Audio(sounds.success || '/slider/sounds/success.wav'),
            };

            function playSfx(type) {
                const sound = sfx[type];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function normalize(value) {
                return String(value || '').trim().toUpperCase();
            }

            function clearCard(card) {
                delete card.dataset.state;

                const input = card.querySelector('.cover-answer');

                if (input) {
                    delete input.dataset.state;
                    input.removeAttribute('aria-invalid');
                }
            }

            function markCard(card) {
                clearCard(card);

                const input = card.querySelector('.cover-answer');
                const correct = normalize(card.dataset.correct);
                const answer = normalize(input?.value);

                const isCorrect = correct === ''
                    ? answer === ''
                    : answer === correct;

                card.dataset.state = isCorrect ? 'correct' : 'wrong';

                if (input) {
                    input.dataset.state = isCorrect ? 'correct' : 'wrong';
                    input.setAttribute('aria-invalid', isCorrect ? 'false' : 'true');
                }

                return isCorrect;
            }

            function setRevealButtonMode(mode = 'reveal') {
                if (!revealBtn) return;

                revealBtn.dataset.mode = mode;
                revealBtn.textContent = mode === 'retake' ? 'Retake' : 'Reveal';
            }

            function revealAnswers() {
                cards.forEach(card => {
                    const input = card.querySelector('.cover-answer');
                    const correct = normalize(card.dataset.correct);

                    if (input) {
                        input.value = correct;
                    }

                    markCard(card);
                });

                playSfx('success');
                setRevealButtonMode('retake');
            }

            function resetActivity() {
                cards.forEach(card => {
                    const input = card.querySelector('.cover-answer');

                    if (input) {
                        input.value = '';
                    }

                    clearCard(card);
                });

                setRevealButtonMode('reveal');
            }

            inputs.forEach(input => {
                input.addEventListener('focus', () => playSfx('tap'));

                input.addEventListener('input', () => {
                    input.value = input.value.replace(/[^1-4]/g, '').slice(0, 1);

                    const card = input.closest('[data-cover-card]');
                    if (card) clearCard(card);
                });
            });

            checkBtn?.addEventListener('click', () => {
                const correctCount = cards.filter(markCard).length;
                playSfx(correctCount === cards.length && cards.length > 0 ? 'success' : 'wrong');
            });

            revealBtn?.addEventListener('click', () => {
                if (revealBtn.dataset.mode === 'retake') {
                    resetActivity();
                    return;
                }

                revealAnswers();
            });

            function stopSlideMedia() {
                window.stopAudioPlayer?.();
            }

            window.stopSlideAudio = () => {
                stopSlideMedia();
            };

            window.destroySlide = () => {
                stopSlideMedia();
            };

            window.resetSlide = () => {
                stopSlideMedia();
                resetActivity();
            };
        });
    </script>
@endsection