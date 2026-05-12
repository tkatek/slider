<?php

$content = [
    'page_title' => 'Practice 2',
    'title'      => 'Practice 2',
    'subtitle'   => 'Dialogue Practice',

    'instruction' => 'Type suitable words or phrases in the blanks.',

    'blanks' => [
        1 => 'Write your answer',
        2 => 'word',
        3 => 'adjective',
        4 => 'adjective',
        5 => 'adverb',
    ],

    'speakers' => [
        'A' => [
            'label' => 'A',
            'badge_class' => 'bg-gradient-to-br from-sky-500 to-blue-600 text-white shadow-sky-200/70 dark:shadow-none',
        ],
        'B' => [
            'label' => 'B',
            'badge_class' => 'bg-gradient-to-br from-fuchsia-500 to-pink-600 text-white shadow-fuchsia-200/70 dark:shadow-none',
        ],
    ],

    'dialogue' => [
        [
            'speaker' => 'A',
            'text' => 'Do you think technology improves communication?',
        ],
        [
            'speaker' => 'B',
            'blank' => 1,
        ],
        [
            'speaker' => 'A',
            'parts' => [
                'That’s an interesting way to look at it. Do you think social media plays a',
                ['blank' => 2],
                'role in this?',
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                'Definitely. It helps people stay connected, but sometimes conversations become more',
                ['blank' => 3],
                '.',
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                'I agree. Face-to-face communication still feels more',
                ['blank' => 4],
                'to me.',
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                'Exactly. Technology is useful, but we need to use it',
                ['blank' => 5],
                '.',
            ],
        ],
    ],
];

$theme = $theme ?? [];
$ringAccent = $theme['ring_accent_class'] ?? 'focus:border-slate-500 focus:ring-slate-500/10 dark:focus:border-slate-300';

?>

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 rounded-3xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-6">
                <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                    <p class="text-sm font-black text-slate-500 dark:text-slate-400">
                        {{ $content['instruction'] }}
                    </p>

                    <button
                            type="button"
                            id="clearDialogueBtn"
                            class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-black text-slate-700 transition hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800"
                    >
                        Clear
                    </button>
                </div>

                <div class="space-y-2.5 sm:space-y-3">
                    @foreach($content['dialogue'] as $line)
                        @php
                            $speaker = $line['speaker'];
                            $speakerData = $content['speakers'][$speaker];
                        @endphp

                        <div class="grid grid-cols-[2.15rem_minmax(0,1fr)] gap-2 sm:grid-cols-[3rem_minmax(0,1fr)] sm:gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-xl text-sm font-black shadow-md sm:h-11 sm:w-11 sm:rounded-2xl sm:text-xl {{ $speakerData['badge_class'] }}">
                                {{ $speakerData['label'] }}
                            </div>

                            <div class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-bold leading-snug text-slate-800 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 sm:rounded-2xl sm:px-4 sm:py-3 sm:text-lg sm:leading-relaxed">
                                @if(isset($line['text']))
                                    {{ $line['text'] }}
                                @elseif(isset($line['blank']))
                                    <input
                                            type="text"
                                            name="dialogue_blank_{{ $line['blank'] }}"
                                            placeholder="{{ $content['blanks'][$line['blank']] ?? 'Type here' }}"
                                            class="h-9 w-full rounded-lg border-2 border-slate-200 bg-white px-2 text-sm font-black text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-4 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 sm:h-11 sm:rounded-xl sm:px-3 sm:text-base {{ $ringAccent }}"
                                            autocomplete="off"
                                    >
                                @else
                                    @foreach($line['parts'] as $part)
                                        @if(is_array($part) && isset($part['blank']))
                                            <input
                                                    type="text"
                                                    name="dialogue_blank_{{ $part['blank'] }}"
                                                    placeholder="{{ $content['blanks'][$part['blank']] ?? 'Type here' }}"
                                                    class="mx-0.5 inline-block h-8 min-w-[6.5rem] max-w-[10rem] rounded-lg border-2 border-slate-200 bg-white px-2 text-center text-sm font-black text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-4 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 sm:mx-1 sm:h-10 sm:min-w-[8rem] sm:max-w-[14rem] sm:rounded-xl sm:px-3 sm:text-base {{ $ringAccent }}"
                                                    autocomplete="off"
                                            >
                                        @else
                                            <span>{{ $part }}</span>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = `dialogue-practice-${window.location.pathname}`;
            const inputs = Array.from(document.querySelectorAll('input[name^="dialogue_blank_"]'));
            const clearButton = document.getElementById('clearDialogueBtn');

            try {
                const savedAnswers = JSON.parse(localStorage.getItem(storageKey) || '{}');

                inputs.forEach((input) => {
                    if (typeof savedAnswers[input.name] === 'string') {
                        input.value = savedAnswers[input.name];
                    }
                });
            } catch (error) {}

            const saveAnswers = () => {
                const answers = {};

                inputs.forEach((input) => {
                    answers[input.name] = input.value;
                });

                localStorage.setItem(storageKey, JSON.stringify(answers));
            };

            inputs.forEach((input) => {
                input.addEventListener('input', saveAnswers);
            });

            clearButton?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    input.value = '';
                });

                localStorage.removeItem(storageKey);
            });

            window.resetSlide = () => {
                inputs.forEach((input) => {
                    input.value = '';
                });

                localStorage.removeItem(storageKey);
            };
        });
    </script>
@endsection
