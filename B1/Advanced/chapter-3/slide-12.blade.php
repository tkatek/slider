<?php

$content = [
    'title'    => 'Listening task: Strange stories',
    'subtitle' => '',
    'type'     => 'audio',
    'audio'    => materialAsset("slider/B1/Advanced/chapter-3/audios/slide11.mp3"),

    'instruction'      => 'Listen again. Number the sentences in the correct order from 1 to 3.',
    'instruction_note' => 'Write 1, 2, or 3 in each box.',

    'groups' => [
        [
            'number' => '1',
            'items'  => [
                [
                    'sentence' => 'I saw something moving in the water.',
                    'correct'  => '2',
                ],
                [
                    'sentence' => 'It disappeared under the water.',
                    'correct'  => '3',
                ],
                [
                    'sentence' => 'We were driving back to London after our holiday.',
                    'correct'  => '1',
                ],
            ],
        ],
        [
            'number' => '2',
            'items'  => [
                [
                    'sentence' => 'We woke up in our car at home.',
                    'correct'  => '3',
                ],
                [
                    'sentence' => 'We stopped the car to look at the light.',
                    'correct'  => '1',
                ],
                [
                    'sentence' => 'We tried to drive away.',
                    'correct'  => '2',
                ],
            ],
        ],
        [
            'number' => '3',
            'items'  => [
                [
                    'sentence' => 'He opened the closet door.',
                    'correct'  => '2',
                ],
                [
                    'sentence' => 'The woman disappeared.',
                    'correct'  => '3',
                ],
                [
                    'sentence' => 'Bill woke us up around midnight.',
                    'correct'  => '1',
                ],
            ],
        ],
        [
            'number' => '4',
            'items'  => [
                [
                    'sentence' => 'My mother called me at 7:00 a.m.',
                    'correct'  => '3',
                ],
                [
                    'sentence' => 'Around 3:00 a.m., I fell asleep.',
                    'correct'  => '1',
                ],
                [
                    'sentence' => 'I woke up calling for my mother.',
                    'correct'  => '2',
                ],
            ],
        ],
    ],
];

?>

{{-- resources/views/slider/game/number-sentences-order.blade.php --}}

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

    $groups = is_array($content['groups'] ?? null) ? $content['groups'] : [];

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

        <section class="mx-auto w-full max-w-7xl px-3 py-3 sm:px-6">
            @if($playerAudio)
                <div class="mx-auto mb-3 max-w-2xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="relative overflow-hidden rounded-[1.5rem] border border-slate-200/90 bg-white/95 p-3 shadow-[0_16px_42px_rgba(15,23,42,0.08)] dark:border-slate-700/80 dark:bg-slate-900/90 sm:p-4">
                <div class="pointer-events-none absolute inset-x-0 top-0 h-1.5 {{ $primaryGradient }}"></div>

                <div class="mb-3 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                    <div class="min-w-0">
                        <h2 class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                            {{ $content['instruction'] ?? 'Listen again. Number the sentences in the correct order from 1 to 3.' }}
                        </h2>

                        <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400">
                            {{ $content['instruction_note'] ?? 'Write 1, 2, or 3 in each box.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-2 lg:flex lg:items-center lg:justify-end">
                        <button
                                id="checkAnswersBtn"
                                type="button"
                                class="rounded-xl border border-white/20 px-3 py-2 text-xs font-black leading-tight text-white shadow-md transition hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-slate-300/60 dark:focus:ring-slate-600 {{ $buttonGradient }}"
                        >
                            Check
                        </button>

                        <button
                                id="revealAnswersBtn"
                                type="button"
                                data-mode="reveal"
                                class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-black leading-tight text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800 dark:focus:ring-slate-700"
                        >
                            Reveal
                        </button>
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700">
                    <div class="grid grid-cols-1 divide-y divide-slate-200 dark:divide-slate-700 md:grid-cols-2 md:divide-x md:divide-y-0 xl:grid-cols-4">
                        @foreach($groups as $groupIndex => $group)
                            <section
                                    data-order-group
                                    class="min-w-0 bg-white transition data-[state=correct]:bg-emerald-50/80 data-[state=wrong]:bg-red-50/80 dark:bg-slate-900 dark:data-[state=correct]:bg-emerald-950/25 dark:data-[state=wrong]:bg-red-950/25"
                            >
                                <div class="flex items-center justify-between border-b border-slate-200 bg-slate-50/80 px-3 py-2 dark:border-slate-700 dark:bg-slate-950/35">
                                    <span class="inline-flex h-8 min-w-8 items-center justify-center rounded-xl px-2 text-sm font-black text-white shadow-sm {{ $buttonGradient }}">
                                        {{ $group['number'] ?? ($groupIndex + 1) }}
                                    </span>

                                    <span class="text-[0.7rem] font-black uppercase tracking-[0.08em] text-slate-400 dark:text-slate-500">
                                        1–3
                                    </span>
                                </div>

                                <div>
                                    @foreach(($group['items'] ?? []) as $itemIndex => $item)
                                        <label
                                                data-order-row
                                                class="grid cursor-pointer grid-cols-[2.25rem_minmax(0,1fr)] items-center gap-2 border-b border-slate-100 px-3 py-2.5 transition last:border-b-0 hover:bg-slate-50 data-[state=correct]:bg-emerald-50 data-[state=wrong]:bg-red-50 dark:border-slate-800 dark:hover:bg-slate-800/70 dark:data-[state=correct]:bg-emerald-950/35 dark:data-[state=wrong]:bg-red-950/35"
                                        >
                                            <input
                                                    type="text"
                                                    maxlength="1"
                                                    inputmode="numeric"
                                                    data-correct="{{ $item['correct'] ?? '' }}"
                                                    class="order-answer h-9 w-9 rounded-xl border border-slate-300 bg-white text-center text-base font-black text-slate-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-slate-500 focus:ring-4 focus:ring-slate-300/45 data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-800 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-red-50 data-[state=wrong]:text-red-800 dark:border-slate-700 dark:bg-slate-950 dark:text-white dark:focus:ring-slate-600/45 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:bg-emerald-950/80 dark:data-[state=correct]:text-emerald-100 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:bg-red-950/80 dark:data-[state=wrong]:text-red-100"
                                                    placeholder="—"
                                                    aria-label="Answer {{ $itemIndex + 1 }} for group {{ $group['number'] ?? ($groupIndex + 1) }}"
                                            >

                                            <span class="text-[0.82rem] font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                                {{ $item['sentence'] ?? '' }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </section>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const groups = Array.from(document.querySelectorAll('[data-order-group]'));
            const rows = Array.from(document.querySelectorAll('[data-order-row]'));
            const inputs = Array.from(document.querySelectorAll('.order-answer'));
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
                return String(value || '').trim();
            }

            function clearRow(row) {
                delete row.dataset.state;

                const input = row.querySelector('.order-answer');

                if (input) {
                    delete input.dataset.state;
                    input.removeAttribute('aria-invalid');
                }
            }

            function clearGroup(group) {
                delete group.dataset.state;
            }

            function markRow(row) {
                clearRow(row);

                const input = row.querySelector('.order-answer');
                const correct = normalize(input?.dataset.correct);
                const answer = normalize(input?.value);

                const isCorrect = answer !== '' && answer === correct;

                row.dataset.state = isCorrect ? 'correct' : 'wrong';

                if (input) {
                    input.dataset.state = isCorrect ? 'correct' : 'wrong';
                    input.setAttribute('aria-invalid', isCorrect ? 'false' : 'true');
                }

                return isCorrect;
            }

            function markGroup(group) {
                clearGroup(group);

                const groupRows = Array.from(group.querySelectorAll('[data-order-row]'));
                const correctCount = groupRows.filter(markRow).length;
                const isCorrect = correctCount === groupRows.length && groupRows.length > 0;

                group.dataset.state = isCorrect ? 'correct' : 'wrong';

                return isCorrect;
            }

            function setRevealButtonMode(mode = 'reveal') {
                if (!revealBtn) return;

                revealBtn.dataset.mode = mode;
                revealBtn.textContent = mode === 'retake' ? 'Retake' : 'Reveal';
            }

            function revealAnswers() {
                rows.forEach(row => {
                    const input = row.querySelector('.order-answer');

                    if (input) {
                        input.value = normalize(input.dataset.correct);
                    }

                    markRow(row);
                });

                groups.forEach(group => {
                    group.dataset.state = 'correct';
                });

                playSfx('success');
                setRevealButtonMode('retake');
            }

            function resetActivity() {
                inputs.forEach(input => {
                    input.value = '';
                });

                rows.forEach(clearRow);
                groups.forEach(clearGroup);

                setRevealButtonMode('reveal');
            }

            inputs.forEach(input => {
                input.addEventListener('focus', () => playSfx('tap'));

                input.addEventListener('input', () => {
                    input.value = input.value.replace(/[^1-3]/g, '').slice(0, 1);

                    const row = input.closest('[data-order-row]');
                    const group = input.closest('[data-order-group]');

                    if (row) clearRow(row);
                    if (group) clearGroup(group);
                });
            });

            checkBtn?.addEventListener('click', () => {
                const correctCount = groups.filter(markGroup).length;
                playSfx(correctCount === groups.length && groups.length > 0 ? 'success' : 'wrong');
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