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
            'accent'        => 'bg-emerald-500',
            'iconBg'        => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-400/15 dark:text-emerald-300',
            'label'         => 'text-emerald-700 dark:text-emerald-300',
            'surface'       => 'border-emerald-200/80 bg-emerald-50/60 dark:border-emerald-400/20 dark:bg-emerald-500/[0.06]',
            'formSurface'   => 'border-emerald-200 bg-emerald-50 text-emerald-800 dark:border-emerald-400/20 dark:bg-emerald-500/10 dark:text-emerald-200',
            'lessonSurface' => 'border-emerald-200 bg-white text-emerald-700 dark:border-emerald-400/20 dark:bg-slate-950/30 dark:text-emerald-300',
        ],
        'violet' => [
            'accent'        => 'bg-violet-500',
            'iconBg'        => 'bg-violet-100 text-violet-700 dark:bg-violet-400/15 dark:text-violet-300',
            'label'         => 'text-violet-700 dark:text-violet-300',
            'surface'       => 'border-violet-200/80 bg-violet-50/60 dark:border-violet-400/20 dark:bg-violet-500/[0.06]',
            'formSurface'   => 'border-violet-200 bg-violet-50 text-violet-800 dark:border-violet-400/20 dark:bg-violet-500/10 dark:text-violet-200',
            'lessonSurface' => 'border-violet-200 bg-white text-violet-700 dark:border-violet-400/20 dark:bg-slate-950/30 dark:text-violet-300',
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-3 py-2.5 text-slate-950 dark:text-slate-50 sm:px-5 sm:py-3 lg:px-7">
        <section class="mx-auto w-full max-w-[1320px]">
            @include('slider.components.title-subtitle')

            <div class="mt-2.5 space-y-2.5 sm:mt-3 sm:space-y-3">
                <section class="grid gap-3 lg:grid-cols-2 lg:items-stretch xl:gap-4">
                    @foreach($content['sections'] as $section)
                        @php
                            $style = $sectionStyles[$section['color']];
                        @endphp

                        <article class="relative h-full overflow-hidden rounded-2xl border {{ $style['surface'] }} shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)]">
                            <div class="absolute inset-y-0 left-0 w-1 {{ $style['accent'] }}"></div>

                            <div class="flex h-full flex-col p-3 pl-4 sm:p-3.5 sm:pl-[1.125rem] xl:p-4 xl:pl-5">
                                <div class="flex min-w-0 items-center gap-2.5 xl:gap-3">
                                    <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-xs font-black {{ $style['iconBg'] }} xl:h-9 xl:w-9 xl:text-sm">
                                        {{ $section['number'] }}
                                    </span>

                                    <div class="min-w-0 flex-1 sm:flex sm:items-baseline sm:justify-between sm:gap-3">
                                        <h2 class="text-sm font-black leading-tight tracking-[-0.02em] text-slate-950 dark:text-white sm:text-[15px] xl:text-base">
                                            {{ $section['title'] }}
                                        </h2>

                                        <span class="mt-0.5 block shrink-0 text-[10px] font-black uppercase tracking-[0.12em] {{ $style['label'] }} sm:mt-0 xl:text-[11px]">
                                            {{ $section['lesson'] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-2.5 overflow-hidden rounded-xl border border-white/80 bg-white/80 dark:border-slate-700/60 dark:bg-slate-900/55 lg:flex lg:flex-1 lg:flex-col xl:mt-3">
                                    @foreach($section['rows'] as $row)
                                        <div class="grid gap-1 border-b border-slate-200/75 px-2.5 py-1.5 last:border-b-0 dark:border-slate-700/60 sm:grid-cols-[minmax(0,0.95fr)_minmax(0,1.35fr)] sm:items-center sm:gap-3 sm:px-3 sm:py-2 lg:flex-1 xl:gap-4 xl:px-3.5 xl:py-2.5">
                                            <p class="text-[12px] font-black leading-snug {{ $style['label'] }} sm:text-[13px] xl:text-sm">
                                                {{ $row['form'] }}
                                            </p>

                                            <p class="text-[12px] font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-[13px] xl:text-sm">
                                                {{ $row['example'] }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>

                <section class="overflow-hidden rounded-2xl border border-sky-200/80 bg-white shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-sky-400/20 dark:bg-slate-900/70">
                    <div class="border-b border-slate-200/80 px-3.5 py-2.5 dark:border-slate-700/70 sm:px-4 xl:px-5 xl:py-3">
                        <h2 class="text-sm font-black tracking-[-0.02em] text-slate-950 dark:text-white sm:text-[15px] xl:text-base">
                            Useful Phrases from the Story
                        </h2>
                    </div>

                    <div class="grid gap-x-4 gap-y-1.5 p-3 sm:grid-cols-2 sm:p-3.5 lg:grid-cols-3 xl:gap-x-5 xl:gap-y-2 xl:p-4">
                        @foreach($content['useful_phrases'] as $phrase)
                            <p class="flex items-start gap-2 text-[12px] font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-[13px] xl:text-sm">
                                <span class="mt-[0.42rem] h-1.5 w-1.5 shrink-0 rounded-full bg-sky-500"></span>
                                <span>{{ $phrase }}</span>
                            </p>
                        @endforeach
                    </div>
                </section>

                <section class="grid gap-3 lg:grid-cols-[1.2fr_0.8fr] xl:gap-4">
                    <article class="rounded-2xl border border-amber-200/90 bg-amber-50/70 p-3 shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-amber-400/20 dark:bg-amber-500/[0.07] sm:p-3.5 xl:p-4">
                        <div class="flex items-start gap-2.5">
                            <span class="shrink-0 text-xl leading-none xl:text-2xl" aria-hidden="true">💡</span>

                            <div>
                                <h2 class="text-sm font-black tracking-[-0.02em] text-slate-950 dark:text-white sm:text-[15px] xl:text-base">
                                    Remember!
                                </h2>
                                <p class="mt-1 text-[12px] font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-[13px] xl:text-sm">
                                    {{ $content['remember'] }}
                                </p>
                            </div>
                        </div>
                    </article>

                    <article class="rounded-2xl border border-orange-200/90 bg-orange-50/70 p-3 shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-orange-400/20 dark:bg-orange-500/[0.07] sm:p-3.5 xl:p-4">
                        <div class="flex items-start gap-2.5">
                            <span class="shrink-0 text-xl leading-none xl:text-2xl" aria-hidden="true">📝</span>

                            <div class="min-w-0 flex-1">
                                <h2 class="text-sm font-black tracking-[-0.02em] text-slate-950 dark:text-white sm:text-[15px] xl:text-base">
                                    Think & Discuss
                                </h2>

                                <ul class="mt-1.5 space-y-1 xl:space-y-1.5">
                                    @foreach($content['questions'] as $question)
                                        <li class="flex items-start gap-2 text-[12px] font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-[13px] xl:text-sm">
                                            <span class="mt-[0.4rem] h-1.5 w-1.5 shrink-0 rounded-full bg-orange-500"></span>
                                            <span>{{ $question }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </section>
    </main>
@endsection