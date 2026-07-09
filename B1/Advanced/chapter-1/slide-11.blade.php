@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar',
        'title'      => 'Language Focus',
        'subtitle'   => 'Past Modals of Deduction',

        'rows' => [
            [
                'form'    => 'must have',
                'extra'   => '+ past participle',
                'meaning' => 'We are almost sure that something happened.',
                'example' => 'He must have forced the door open.',
                'color'   => 'blue',
                'emoji'   => '🕵️',
            ],
            [
                'form'    => 'might have',
                'extra'   => '+ past participle',
                'meaning' => 'It is possible that something happened.',
                'example' => 'They might have left muddy footprints after the storm.',
                'color'   => 'green',
                'emoji'   => '👣',
            ],
            [
                'form'    => 'could have',
                'extra'   => '+ past participle',
                'meaning' => 'It is possible that something happened.',
                'example' => 'The intruder could have climbed in through the unlatched window.',
                'color'   => 'orange',
                'emoji'   => '🪟',
            ],
            [
                'form'    => "can't have",
                'extra'   => '+ past participle',
                'meaning' => 'We are sure that something did NOT happen.',
                'example' => "The door can't have been locked. The latch was broken.",
                'color'   => 'red',
                'emoji'   => '🔓',
            ],
        ],

        'certainty_title' => 'Degrees of certainty',

        'certainty' => [
            [
                'text'  => "can't have",
                'note'  => 'impossible',
                'color' => 'red',
            ],
            [
                'text'  => 'could have',
                'note'  => 'possible',
                'color' => 'orange',
            ],
            [
                'text'  => 'might have',
                'note'  => 'possible',
                'color' => 'green',
            ],
            [
                'text'  => 'must have',
                'note'  => 'almost certain',
                'color' => 'blue',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1200px] flex-col justify-center">

            @include('slider.components.title-subtitle')

            <section class="mt-4 overflow-hidden rounded-[1.75rem] border border-blue-200 bg-white shadow-[0_20px_60px_-40px_rgba(15,23,42,0.45)] dark:border-blue-400/20 dark:bg-slate-900">

                <div class="grid gap-3 p-3 sm:p-4 lg:gap-0 lg:p-0">
                    @foreach($content['rows'] as $row)
                        @php
                            $styles = [
                                'blue' => [
                                    'text' => 'text-blue-700 dark:text-blue-300',
                                    'bg' => 'bg-blue-50 dark:bg-blue-500/10',
                                    'border' => 'border-blue-200 dark:border-blue-400/30',
                                ],
                                'green' => [
                                    'text' => 'text-green-700 dark:text-green-300',
                                    'bg' => 'bg-green-50 dark:bg-green-500/10',
                                    'border' => 'border-green-200 dark:border-green-400/30',
                                ],
                                'orange' => [
                                    'text' => 'text-orange-600 dark:text-orange-300',
                                    'bg' => 'bg-orange-50 dark:bg-orange-500/10',
                                    'border' => 'border-orange-200 dark:border-orange-400/30',
                                ],
                                'red' => [
                                    'text' => 'text-red-700 dark:text-red-300',
                                    'bg' => 'bg-red-50 dark:bg-red-500/10',
                                    'border' => 'border-red-200 dark:border-red-400/30',
                                ],
                            ][$row['color']];
                        @endphp

                        <article class="overflow-hidden rounded-2xl border {{ $styles['border'] }} bg-white dark:bg-slate-950/35 lg:grid lg:grid-cols-[0.9fr_1fr_1.45fr] lg:rounded-none lg:border-0 lg:border-b lg:border-slate-200 lg:last:border-b-0 dark:lg:border-slate-700">

                            <div class="{{ $styles['bg'] }} px-4 py-4">
                                <p class="text-[clamp(1.35rem,3.8vw,2rem)] font-black leading-tight {{ $styles['text'] }}">
                                    {{ $row['form'] }}
                                </p>

                                <p class="mt-1 text-[clamp(1rem,2.8vw,1.35rem)] font-black leading-tight {{ $styles['text'] }}">
                                    {{ $row['extra'] }}
                                </p>
                            </div>

                            <div class="px-4 py-4 lg:border-l lg:border-slate-200 dark:lg:border-slate-700">
                                <p class="text-[clamp(0.95rem,1.5vw,1.25rem)] font-extrabold leading-snug text-slate-800 dark:text-slate-100">
                                    {{ $row['meaning'] }}
                                </p>
                            </div>

                            <div class="flex items-center gap-3 px-4 py-4 lg:border-l lg:border-slate-200 dark:lg:border-slate-700">
                                <p class="min-w-0 flex-1 text-[clamp(0.95rem,1.5vw,1.25rem)] font-extrabold leading-snug text-slate-900 dark:text-slate-50">
                                    {!! str_replace($row['form'], '<span class="' . $styles['text'] . ' font-black">' . $row['form'] . '</span>', $row['example']) !!}
                                </p>

                                <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl {{ $styles['bg'] }} text-2xl sm:h-14 sm:w-14 sm:text-3xl">
                                    {{ $row['emoji'] }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="border-t border-slate-200 bg-slate-50 px-4 py-4 dark:border-slate-700 dark:bg-slate-950/35 sm:px-6">
                    <h2 class="text-center text-[clamp(1.25rem,2vw,1.9rem)] font-black text-blue-800 dark:text-blue-300">
                        {{ $content['certainty_title'] }}
                    </h2>

                    <div class="mx-auto mt-4 hidden max-w-4xl sm:block">
                        <div class="relative h-3 rounded-full bg-gradient-to-r from-red-500 via-orange-400 via-green-500 to-blue-600">
                            <div class="absolute left-0 top-1/2 h-6 w-6 -translate-y-1/2 rounded-full border-4 border-white bg-red-600 shadow-lg dark:border-slate-900"></div>
                            <div class="absolute left-1/3 top-1/2 h-6 w-6 -translate-y-1/2 rounded-full border-4 border-white bg-orange-500 shadow-lg dark:border-slate-900"></div>
                            <div class="absolute left-2/3 top-1/2 h-6 w-6 -translate-y-1/2 rounded-full border-4 border-white bg-green-600 shadow-lg dark:border-slate-900"></div>
                            <div class="absolute right-0 top-1/2 h-6 w-6 -translate-y-1/2 rounded-full border-4 border-white bg-blue-600 shadow-lg dark:border-slate-900"></div>
                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-1 gap-2 sm:grid-cols-4 sm:gap-3">
                        @foreach($content['certainty'] as $item)
                            @php
                                $styles = [
                                    'blue' => [
                                        'text' => 'text-blue-700 dark:text-blue-300',
                                        'bg' => 'bg-blue-50 dark:bg-blue-500/10',
                                        'border' => 'border-blue-200 dark:border-blue-400/30',
                                    ],
                                    'green' => [
                                        'text' => 'text-green-700 dark:text-green-300',
                                        'bg' => 'bg-green-50 dark:bg-green-500/10',
                                        'border' => 'border-green-200 dark:border-green-400/30',
                                    ],
                                    'orange' => [
                                        'text' => 'text-orange-600 dark:text-orange-300',
                                        'bg' => 'bg-orange-50 dark:bg-orange-500/10',
                                        'border' => 'border-orange-200 dark:border-orange-400/30',
                                    ],
                                    'red' => [
                                        'text' => 'text-red-700 dark:text-red-300',
                                        'bg' => 'bg-red-50 dark:bg-red-500/10',
                                        'border' => 'border-red-200 dark:border-red-400/30',
                                    ],
                                ][$item['color']];
                            @endphp

                            <div class="rounded-2xl border {{ $styles['border'] }} {{ $styles['bg'] }} px-3 py-2.5 text-center">
                                <p class="text-[clamp(0.95rem,1.2vw,1.15rem)] font-black leading-tight {{ $styles['text'] }}">
                                    {{ $item['text'] }}
                                </p>

                                <p class="mt-1 text-[clamp(0.75rem,1vw,0.9rem)] font-black leading-tight {{ $styles['text'] }}">
                                    ({{ $item['note'] }})
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection