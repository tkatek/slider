<?php

$content = [

    'title'      => 'Quick wrap up!',
    'subtitle'   => 'Case Closed!',
    'type'       => 'writing',

    'instruction' => 'Look at the clues below.',

    'clues' => [
        'The front door is open.',
        'There are muddy footprints on the floor.',
        'Nothing is missing.',
        'A wet umbrella is lying near the door.',
    ],

    'task_title' => 'Complete the tasks.',

    'tasks' => [
        [
            'number'      => '1',
            'prompt'      => 'Write one sentence about the past using a past modal of deduction.',
            'placeholder' => 'Write your sentence here...',
        ],
        [
            'number'      => '2',
            'prompt'      => 'Write one sentence about the present or future using an expression of certainty or possibility.',
            'placeholder' => 'Write your sentence here...',
        ],
    ],
];

?>

{{-- resources/views/slider/game/case-closed-wrap-up.blade.php --}}

@extends('slider.simple-layout')

@php
    $theme = $theme ?? [];
    $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500'));
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));

    $clues = is_array($content['clues'] ?? null) ? $content['clues'] : [];
    $tasks = is_array($content['tasks'] ?? null) ? $content['tasks'] : [];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-4 py-5 sm:px-8">
            <div class="relative overflow-hidden rounded-[1.75rem] border border-slate-200/90 bg-white/95 p-4 shadow-[0_22px_58px_rgba(15,23,42,0.09)] dark:border-slate-700/80 dark:bg-slate-900/90 sm:p-6">
                <div class="pointer-events-none absolute inset-x-0 top-0 h-1.5 {{ $primaryGradient }}"></div>

                <div class="grid gap-5 lg:grid-cols-[0.9fr_1.1fr] lg:items-stretch">
                    <section class="relative overflow-hidden rounded-[1.5rem] border border-slate-200 bg-slate-50/80 p-4 dark:border-slate-700 dark:bg-slate-950/35 sm:p-5">
                        <div class="pointer-events-none absolute bottom-0 left-0 top-0 w-1.5 {{ $primaryGradient }}"></div>

                        <h2 class="pl-3 text-lg font-black text-slate-950 dark:text-white">
                            {{ $content['instruction'] ?? 'Look at the clues below.' }}
                        </h2>

                        <div class="mt-4 grid gap-3 pl-3">
                            @foreach($clues as $index => $clue)
                                <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                                    <span class="mt-0.5 inline-flex h-7 min-w-7 items-center justify-center rounded-full text-xs font-black text-white shadow-sm {{ $buttonGradient }}">
                                        {{ $index + 1 }}
                                    </span>

                                    <p class="text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                        {{ $clue }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section class="rounded-[1.5rem] border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-900 sm:p-5">
                        <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <h2 class="text-lg font-black text-slate-950 dark:text-white">
                                {{ $content['task_title'] ?? 'Complete the tasks.' }}
                            </h2>

                            <button
                                    id="clearAnswersBtn"
                                    type="button"
                                    class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200 dark:hover:bg-slate-800 dark:focus:ring-slate-700"
                            >
                                Clear
                            </button>
                        </div>

                        <div class="grid gap-4">
                            @foreach($tasks as $task)
                                <label class="block rounded-[1.25rem] border border-slate-200 bg-slate-50/80 p-4 dark:border-slate-700 dark:bg-slate-950/35">
                                    <div class="mb-3 flex items-start gap-3">
                                        <span class="inline-flex h-8 min-w-8 items-center justify-center rounded-xl px-2 text-sm font-black text-white shadow-sm {{ $buttonGradient }}">
                                            {{ $task['number'] ?? $loop->iteration }}
                                        </span>

                                        <span class="text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-base">
                                            {{ $task['prompt'] ?? '' }}
                                        </span>
                                    </div>

                                    <textarea
                                            class="student-writing min-h-[5.5rem] w-full resize-none rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm font-bold leading-relaxed text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-slate-500 focus:ring-4 focus:ring-slate-300/45 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-slate-400 dark:focus:ring-slate-600/45"
                                            placeholder="{{ $task['placeholder'] ?? 'Write your sentence here...' }}"
                                    ></textarea>
                                </label>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const textareas = Array.from(document.querySelectorAll('.student-writing'));
            const clearBtn = document.getElementById('clearAnswersBtn');

            function clearAnswers() {
                textareas.forEach(textarea => {
                    textarea.value = '';
                });
            }

            clearBtn?.addEventListener('click', clearAnswers);

            window.resetSlide = () => {
                clearAnswers();
            };

            window.destroySlide = () => {};
            window.stopSlideAudio = () => {};
        });
    </script>
@endsection