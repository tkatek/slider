@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Speaking time',
        'title' => 'Speaking time:',
'subtitle' => 'In your own words, say & write some of the difficulties you face while learning English<br class="hidden sm:block"> and how can you overcome these difficulties:',        'problem_heading' => 'Problem',
        'solution_heading' => 'Solution',
        'rows' => [
            [
                'problem' => [
                    'type' => 'inline_input',
                    'before' => 'I have a problem',
                    'after' => 'ing new vocabulary.',
                    'input_label' => 'Complete the problem about vocabulary',
                ],
                'solution' => [
                    'type' => 'textarea',
                    'label' => 'Write a solution for learning new vocabulary',
                ],
            ],
            [
                'problem' => [
                    'type' => 'inline_input',
                    'before' => 'I have a problem',
                    'after' => 'English.',
                    'input_label' => 'Complete the problem about English',
                ],
                'solution' => [
                    'type' => 'textarea',
                    'label' => 'Write a solution for English',
                ],
            ],
            [
                'problem' => [
                    'type' => 'text',
                    'text' => 'I have a problem understanding accents.',
                ],
                'solution' => [
                    'type' => 'textarea',
                    'label' => 'Write a solution for understanding accents',
                ],
            ],
            [
                'problem' => [
                    'type' => 'textarea',
                    'label' => 'Write another problem',
                ],
                'solution' => [
                    'type' => 'text',
                    'text' => 'Learn the rules and practise more.',
                ],
            ],
            [
                'problem' => [
                    'type' => 'textarea',
                    'label' => 'Write another problem',
                ],
                'solution' => [
                    'type' => 'text',
                    'text' => 'Repeat the words aloud.',
                ],
            ],
        ],
    ];

    $rows = is_array($content['rows'] ?? null) ? $content['rows'] : [];

    $panelClass = 'mx-auto w-full max-w-6xl rounded-[1.75rem] border border-orange-200/70 bg-white/95 p-3 shadow-[0_18px_55px_rgba(124,45,18,0.10)] dark:border-orange-400/20 dark:bg-slate-900/90 sm:p-4 lg:p-5';
    $headerClass = 'border-b border-orange-100 bg-orange-50/80 px-4 py-3 text-left text-sm font-black tracking-[-0.01em] text-orange-700 dark:border-orange-400/15 dark:bg-orange-500/10 dark:text-orange-100 sm:text-base';
    $cellClass = 'border-b border-orange-100/70 bg-white px-4 py-3 align-top dark:border-slate-700 dark:bg-slate-900/70 sm:py-4';
    $textClass = 'text-sm font-black leading-relaxed text-slate-900 dark:text-slate-50 sm:text-base lg:text-lg';
    $bulletClass = 'mt-2 inline-flex h-2 w-2 shrink-0 rounded-full bg-orange-500 dark:bg-orange-300';
    $inputClass = 'min-h-10 w-full rounded-xl border border-slate-200 bg-slate-50/80 px-3 py-2 text-sm font-bold text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-orange-400 focus:bg-white focus:ring-4 focus:ring-orange-500/10 dark:border-slate-700 dark:bg-slate-950/50 dark:text-slate-50 dark:placeholder:text-slate-500 dark:focus:border-orange-300 dark:focus:bg-slate-950 sm:text-base';
    $inlineInputClass = 'mx-1 inline-flex h-9 w-32 rounded-xl border-0 border-b-2 border-dashed border-orange-400 bg-orange-50/70 px-2 text-center text-sm font-black text-slate-900 outline-none transition focus:border-orange-500 focus:bg-white focus:ring-4 focus:ring-orange-500/10 dark:border-orange-300/70 dark:bg-orange-500/10 dark:text-white dark:focus:bg-slate-950 sm:w-40 sm:text-base';
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1440px] items-center justify-center px-3 py-4 sm:px-5 sm:py-6 lg:px-8">
            <section class="w-full">
                @include('slider.components.title-subtitle')

                <div class="mt-4 sm:mt-5 lg:mt-6">
                    <div class="{{ $panelClass }}">
                        <div class="overflow-hidden rounded-[1.35rem] border border-orange-100 dark:border-slate-700">
                            <div class="hidden md:grid md:grid-cols-2">
                                <div class="{{ $headerClass }} border-r border-orange-100 dark:border-slate-700">
                                    <span class="mr-2 text-orange-500">•</span>{{ $content['problem_heading'] }}
                                </div>

                                <div class="{{ $headerClass }}">
                                    <span class="mr-2 text-orange-500">•</span>{{ $content['solution_heading'] }}
                                </div>
                            </div>

                            <div class="hidden md:block">
                                @foreach($rows as $row)
                                    <article class="grid grid-cols-2">
                                        <div class="{{ $cellClass }} border-r border-orange-100/70 dark:border-slate-700">
                                            <div class="flex gap-3">
                                                <span class="{{ $bulletClass }}"></span>

                                                <div class="min-w-0 flex-1">
                                                    @if(($row['problem']['type'] ?? '') === 'inline_input')
                                                        <p class="{{ $textClass }}">
                                                            {{ $row['problem']['before'] }}
                                                            <input
                                                                    type="text"
                                                                    class="{{ $inlineInputClass }}"
                                                                    aria-label="{{ $row['problem']['input_label'] ?? 'Complete the problem' }}"
                                                                    autocomplete="off"
                                                                    spellcheck="false"
                                                            >
                                                            {{ $row['problem']['after'] }}
                                                        </p>
                                                    @elseif(($row['problem']['type'] ?? '') === 'textarea')
                                                        <textarea
                                                                class="{{ $inputClass }}"
                                                                rows="2"
                                                                aria-label="{{ $row['problem']['label'] ?? 'Write a problem' }}"
                                                        ></textarea>
                                                    @else
                                                        <p class="{{ $textClass }}">{{ $row['problem']['text'] ?? '' }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="{{ $cellClass }}">
                                            <div class="flex gap-3">
                                                <span class="{{ $bulletClass }}"></span>

                                                <div class="min-w-0 flex-1">
                                                    @if(($row['solution']['type'] ?? '') === 'textarea')
                                                        <textarea
                                                                class="{{ $inputClass }}"
                                                                rows="2"
                                                                aria-label="{{ $row['solution']['label'] ?? 'Write a solution' }}"
                                                        ></textarea>
                                                    @else
                                                        <p class="{{ $textClass }}">{{ $row['solution']['text'] ?? '' }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>

                            <div class="grid gap-3 bg-orange-50/35 p-3 dark:bg-slate-950/30 md:hidden">
                                @foreach($rows as $index => $row)
                                    <article class="overflow-hidden rounded-2xl border border-orange-100 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
                                        <div class="border-b border-orange-100 bg-orange-50/80 px-3 py-2 text-xs font-black uppercase tracking-[0.08em] text-orange-700 dark:border-slate-700 dark:bg-orange-500/10 dark:text-orange-100">
                                            {{ $index + 1 }}
                                        </div>

                                        <div class="grid gap-3 p-3">
                                            <div>
                                                <p class="mb-1.5 text-xs font-black uppercase tracking-[0.08em] text-orange-600 dark:text-orange-200">
                                                    {{ $content['problem_heading'] }}
                                                </p>

                                                @if(($row['problem']['type'] ?? '') === 'inline_input')
                                                    <p class="{{ $textClass }}">
                                                        {{ $row['problem']['before'] }}
                                                        <input
                                                                type="text"
                                                                class="{{ $inlineInputClass }} w-28 sm:w-36"
                                                                aria-label="{{ $row['problem']['input_label'] ?? 'Complete the problem' }}"
                                                                autocomplete="off"
                                                                spellcheck="false"
                                                        >
                                                        {{ $row['problem']['after'] }}
                                                    </p>
                                                @elseif(($row['problem']['type'] ?? '') === 'textarea')
                                                    <textarea
                                                            class="{{ $inputClass }}"
                                                            rows="2"
                                                            aria-label="{{ $row['problem']['label'] ?? 'Write a problem' }}"
                                                    ></textarea>
                                                @else
                                                    <p class="{{ $textClass }}">{{ $row['problem']['text'] ?? '' }}</p>
                                                @endif
                                            </div>

                                            <div>
                                                <p class="mb-1.5 text-xs font-black uppercase tracking-[0.08em] text-orange-600 dark:text-orange-200">
                                                    {{ $content['solution_heading'] }}
                                                </p>

                                                @if(($row['solution']['type'] ?? '') === 'textarea')
                                                    <textarea
                                                            class="{{ $inputClass }}"
                                                            rows="2"
                                                            aria-label="{{ $row['solution']['label'] ?? 'Write a solution' }}"
                                                    ></textarea>
                                                @else
                                                    <p class="{{ $textClass }}">{{ $row['solution']['text'] ?? '' }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.resetSlide = function () {
                document.querySelectorAll('input, textarea').forEach((field) => {
                    field.value = '';
                });
            };
        });
    </script>
@endsection
