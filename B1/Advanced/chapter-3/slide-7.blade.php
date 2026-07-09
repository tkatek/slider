@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Key Language',
        'title'      => 'Key Language',
        'subtitle'   => 'Putting the Pieces Together',

        'sections' => [
            [
                'number' => 1,
                'title'  => 'Past Modals of Deduction',
                'lesson' => 'Lesson 1',
                'color'  => 'emerald',
                'rows'   => [
                    [
                        'form'    => 'must have + past participle',
                        'example' => 'Someone must have planned this carefully.',
                    ],
                    [
                        'form'    => 'might have + past participle',
                        'example' => 'Someone might have come through a secret passage.',
                    ],
                    [
                        'form'    => 'could have + past participle',
                        'example' => 'The thief could have left this note on purpose.',
                    ],
                    [
                        'form'    => "can’t have + past participle",
                        'example' => "This can’t have happened without a plan.",
                    ],
                ],
            ],
            [
                'number' => 2,
                'title'  => 'Expressing Certainty & Possibility',
                'lesson' => 'Lesson 2',
                'color'  => 'violet',
                'rows'   => [
                    [
                        'form'    => 'I’m sure that ...',
                        'example' => 'I’m sure the thief knew the library well.',
                    ],
                    [
                        'form'    => 'It’s probable that ...',
                        'example' => 'It’s probable that the lights flickered on purpose.',
                    ],
                    [
                        'form'    => 'It’s possible that ...',
                        'example' => 'It’s possible that someone is still in the library.',
                    ],
                    [
                        'form'    => 'Perhaps ...',
                        'example' => 'Perhaps there is another hidden room.',
                    ],
                    [
                        'form'    => 'Maybe ...',
                        'example' => 'Maybe the next clue will lead us to the thief.',
                    ],
                    [
                        'form'    => 'I don’t think ...',
                        'example' => 'I don’t think this is the end of the mystery.',
                    ],
                    [
                        'form'    => 'It’s unlikely that ...',
                        'example' => 'It’s unlikely that the book disappeared by accident.',
                    ],
                ],
            ],
        ],

        'useful_phrases' => [
            'Every door was locked.',
            'No one entered the library.',
            'No one left the library.',
            'There was one muddy footprint.',
            'At the end of the tunnel, they found the missing book.',
            'The next clue is under the old clock.',
            'This is only the beginning.',
            'What do you think happened?',
            'Who might have stolen the book?',
            'What could be inside the next envelope?',
        ],

        'remember' => 'We use past modals of deduction to talk about what probably happened in the past. We use expressions of certainty and possibility to make guesses about now or the future.',

        'questions' => [
            'What must have happened?',
            'What might have happened?',
            'What will probably happen next?',
        ],
    ];

    $sectionStyles = [
        'emerald' => [
            'border' => 'border-emerald-300 dark:border-emerald-400/30',
            'bg'     => 'bg-emerald-50 dark:bg-emerald-500/10',
            'text'   => 'text-emerald-700 dark:text-emerald-300',
            'badge'  => 'bg-emerald-600 text-white dark:bg-emerald-400 dark:text-emerald-950',
        ],
        'violet' => [
            'border' => 'border-violet-300 dark:border-violet-400/30',
            'bg'     => 'bg-violet-50 dark:bg-violet-500/10',
            'text'   => 'text-violet-700 dark:text-violet-300',
            'badge'  => 'bg-violet-600 text-white dark:bg-violet-400 dark:text-violet-950',
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1180px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <section class="mx-auto mt-4 w-full overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-[0_22px_70px_-45px_rgba(15,23,42,0.45)] dark:border-slate-700 dark:bg-slate-900">

                <div class="grid items-start gap-4 p-4 lg:grid-cols-2 lg:p-5">
                    @foreach($content['sections'] as $section)
                        @php
                            $style = $sectionStyles[$section['color']];
                        @endphp

                        <section class="h-fit overflow-hidden rounded-2xl border-2 {{ $style['border'] }} {{ $style['bg'] }}">
                            <div class="flex flex-wrap items-center gap-2 border-b {{ $style['border'] }} bg-white/70 px-4 py-2 dark:bg-slate-950/30">
                                <span class="inline-flex h-7 w-7 items-center justify-center rounded-full text-sm font-black {{ $style['badge'] }}">
                                    {{ $section['number'] }}
                                </span>

                                <h3 class="text-sm font-black uppercase tracking-wide {{ $style['text'] }} sm:text-base">
                                    {{ $section['title'] }}
                                </h3>

                                <span class="text-xs font-black text-slate-500 dark:text-slate-400">
                                    ({{ $section['lesson'] }})
                                </span>
                            </div>

                            <div class="grid divide-y divide-slate-200 dark:divide-slate-700">
                                @foreach($section['rows'] as $row)
                                    <div class="grid gap-2 bg-white/80 px-4 py-2 dark:bg-slate-900/50 sm:grid-cols-[0.9fr_1.4fr] sm:items-center">
                                        <p class="text-sm font-black leading-snug {{ $style['text'] }}">
                                            {{ $row['form'] }}
                                        </p>

                                        <p class="text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                            {{ $row['example'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endforeach

                    <section class="h-fit overflow-hidden rounded-2xl border-2 border-sky-300 bg-sky-50 dark:border-sky-400/30 dark:bg-sky-500/10 lg:col-span-2">
                        <div class="flex items-center gap-2 border-b border-sky-300 bg-white/70 px-4 py-2 dark:border-sky-400/30 dark:bg-slate-950/30">
                            <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-sky-600 text-sm font-black text-white dark:bg-sky-400 dark:text-sky-950">
                                3
                            </span>

                            <h3 class="text-sm font-black uppercase tracking-wide text-sky-700 dark:text-sky-300 sm:text-base">
                                Useful Phrases from the Story
                            </h3>
                        </div>

                        <div class="grid gap-x-5 gap-y-2 bg-white/80 p-4 dark:bg-slate-900/50 md:grid-cols-2">
                            @foreach($content['useful_phrases'] as $phrase)
                                <p class="flex gap-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-sky-500"></span>
                                    <span>{{ $phrase }}</span>
                                </p>
                            @endforeach
                        </div>
                    </section>

                    <section class="h-fit rounded-2xl border border-amber-300 bg-amber-50 p-4 dark:border-amber-400/30 dark:bg-amber-500/10">
                        <div class="flex items-start gap-3">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-100 text-2xl dark:bg-amber-400/15">
                                💡
                            </div>

                            <div>
                                <h3 class="text-base font-black uppercase tracking-wide text-slate-900 dark:text-white">
                                    Remember!
                                </h3>

                                <p class="mt-2 text-sm font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-base">
                                    {{ $content['remember'] }}
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="h-fit rounded-2xl border border-orange-300 bg-orange-50 p-4 dark:border-orange-400/30 dark:bg-orange-500/10">
                        <div class="flex items-start gap-3">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-orange-100 text-2xl dark:bg-orange-400/15">
                                📝
                            </div>

                            <div>
                                <h3 class="text-base font-black uppercase tracking-wide text-slate-900 dark:text-white">
                                    Think & Discuss
                                </h3>

                                <ul class="mt-2 space-y-1.5">
                                    @foreach($content['questions'] as $question)
                                        <li class="flex gap-2 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-base">
                                            <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-orange-500"></span>
                                            <span>{{ $question }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

            </section>
        </section>
    </main>
@endsection