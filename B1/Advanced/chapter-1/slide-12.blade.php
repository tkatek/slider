@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar',
        'title'      => 'Grammar',
        'subtitle'   => 'Modals of deduction',

        'present_title' => 'Present modals of deduction',
        'past_title'    => 'Past modals of deduction',

        'present_rows' => [
            [
                'modal'    => 'MUST',
                'meaning'  => 'we are very sure something is true',
                'form'     => 'must + verb',
                'examples' => [
                    'She must be at the library; she goes there every morning.',
                    'They must know the answer already.',
                ],
            ],
            [
                'modal'    => "CAN’T",
                'meaning'  => 'we are very sure something is impossible',
                'form'     => "can’t + verb",
                'examples' => [
                    'He can’t be the manager; he’s too young.',
                    'This can’t be the right key.',
                ],
            ],
            [
                'modal'    => 'MAY / MIGHT / COULD',
                'meaning'  => 'something is possible',
                'form'     => 'may/might/could + verb',
                'examples' => [
                    'She might be busy right now.',
                    'They could be in the garden.',
                    'It may be the wrong number.',
                ],
            ],
        ],

        'past_note' => "We use must have / can’t have / might have / may have / could have + V3 to guess about past events.",

        'past_rows' => [
            [
                'modal'    => 'MUST HAVE',
                'meaning'  => 'strong belief about the past',
                'form'     => 'must have + V3',
                'examples' => [
                    'She must have left early; the house is empty.',
                    'They must have forgotten the time.',
                ],
            ],
            [
                'modal'    => "CAN’T HAVE / COULDN’T HAVE",
                'meaning'  => "we are sure something didn’t happen",
                'form'     => "can’t have / couldn’t have + V3",
                'examples' => [
                    'He can’t have taken the wrong bus.',
                    'She couldn’t have seen you yesterday; she was abroad.',
                ],
            ],
            [
                'modal'    => 'MIGHT HAVE / MAY HAVE / COULD HAVE',
                'meaning'  => 'a possible past event',
                'form'     => 'might have / may have / could have + V3',
                'examples' => [
                    'They might have missed your message.',
                    'He may have left his bag on the train.',
                    'She could have lost her phone.',
                ],
            ],
        ],

        'certainty_title' => 'Degrees of certainty',

        'certainty' => [
            [
                'label' => 'impossible',
                'modal' => "can’t have / couldn’t have",
            ],
            [
                'label' => 'very sure',
                'modal' => 'must have',
            ],
            [
                'label' => 'possible',
                'modal' => 'might have / may have / could have',
            ],
            [
                'label' => 'almost certain',
                'modal' => 'must have',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="w-full px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1250px]">

            @include('slider.components.title-subtitle')

            <div class="mt-4 space-y-4">

                {{-- Present modals --}}
                <section class="overflow-hidden rounded-2xl border border-emerald-200 bg-white dark:border-emerald-400/30 dark:bg-slate-900">
                    <div class="border-b border-emerald-200 bg-emerald-50 px-4 py-2.5 dark:border-emerald-400/30 dark:bg-emerald-500/10">
                        <h2 class="text-[clamp(1rem,1.5vw,1.35rem)] font-black uppercase tracking-tight text-emerald-800 dark:text-emerald-300">
                            {{ $content['present_title'] }}
                        </h2>
                    </div>

                    <div class="hidden grid-cols-[0.8fr_1fr_0.8fr_1.7fr] border-b border-emerald-100 bg-green-50 text-sm font-black uppercase tracking-wide text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-500/10 dark:text-emerald-300 md:grid">
                        <div class="px-4 py-2">Modal</div>
                        <div class="px-4 py-2">Meaning</div>
                        <div class="px-4 py-2">Form</div>
                        <div class="px-4 py-2">Examples</div>
                    </div>

                    <div class="divide-y divide-emerald-100 dark:divide-slate-700">
                        @foreach($content['present_rows'] as $row)
                            <article class="grid gap-2 px-4 py-3 md:grid-cols-[0.8fr_1fr_0.8fr_1.7fr] md:items-start md:gap-0">
                                <div>
                                    <p class="text-xs font-black uppercase text-emerald-500 md:hidden">Modal</p>
                                    <p class="text-[clamp(1.05rem,1.6vw,1.35rem)] font-black text-emerald-800 dark:text-emerald-300">
                                        {{ $row['modal'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase text-emerald-500 md:hidden">Meaning</p>
                                    <p class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-base">
                                        {{ $row['meaning'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase text-emerald-500 md:hidden">Form</p>
                                    <p class="inline-flex rounded-lg bg-emerald-100 px-2.5 py-1 text-sm font-black text-emerald-900 dark:bg-emerald-500/15 dark:text-emerald-200">
                                        {{ $row['form'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase text-emerald-500 md:hidden">Examples</p>
                                    <ul class="space-y-1">
                                        @foreach($row['examples'] as $example)
                                            <li class="flex gap-2 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-base">
                                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                                                <span>{{ $example }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                {{-- Past modals --}}
                <section class="overflow-hidden rounded-2xl border border-green-200 bg-white dark:border-green-400/30 dark:bg-slate-900">
                    <div class="border-b border-green-200 bg-green-50 px-4 py-2.5 dark:border-green-400/30 dark:bg-green-500/10">
                        <h2 class="text-[clamp(1rem,1.5vw,1.35rem)] font-black uppercase tracking-tight text-green-800 dark:text-green-300">
                            {{ $content['past_title'] }}
                        </h2>

                        <p class="mt-1 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-base">
                            {{ $content['past_note'] }}
                        </p>
                    </div>

                    <div class="hidden grid-cols-[0.9fr_1fr_1fr_1.6fr] border-b border-green-100 bg-lime-50 text-sm font-black uppercase tracking-wide text-green-700 dark:border-green-400/20 dark:bg-green-500/10 dark:text-green-300 md:grid">
                        <div class="px-4 py-2">Modal</div>
                        <div class="px-4 py-2">Meaning</div>
                        <div class="px-4 py-2">Form</div>
                        <div class="px-4 py-2">Examples</div>
                    </div>

                    <div class="divide-y divide-green-100 dark:divide-slate-700">
                        @foreach($content['past_rows'] as $row)
                            <article class="grid gap-2 px-4 py-3 md:grid-cols-[0.9fr_1fr_1fr_1.6fr] md:items-start md:gap-0">
                                <div>
                                    <p class="text-xs font-black uppercase text-green-500 md:hidden">Modal</p>
                                    <p class="text-[clamp(1rem,1.5vw,1.25rem)] font-black text-green-800 dark:text-green-300">
                                        {{ $row['modal'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase text-green-500 md:hidden">Meaning</p>
                                    <p class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-base">
                                        {{ $row['meaning'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase text-green-500 md:hidden">Form</p>
                                    <p class="inline-flex rounded-lg bg-green-100 px-2.5 py-1 text-sm font-black text-green-900 dark:bg-green-500/15 dark:text-green-200">
                                        {{ $row['form'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase text-green-500 md:hidden">Examples</p>
                                    <ul class="space-y-1">
                                        @foreach($row['examples'] as $example)
                                            <li class="flex gap-2 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-base">
                                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-green-500"></span>
                                                <span>{{ $example }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                {{-- Degrees of certainty --}}
                <section class="rounded-2xl border border-lime-200 bg-white px-4 py-3 dark:border-lime-400/30 dark:bg-slate-900">
                    <h3 class="text-base font-black uppercase tracking-tight text-lime-800 dark:text-lime-300 sm:text-lg">
                        {{ $content['certainty_title'] }}
                    </h3>

                    <div class="mt-3 grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach($content['certainty'] as $item)
                            <div class="rounded-xl bg-lime-50 px-3 py-2 dark:bg-lime-500/10">
                                <p class="text-xs font-black uppercase tracking-wide text-lime-700 dark:text-lime-300">
                                    {{ $item['label'] }}
                                </p>

                                <p class="mt-0.5 text-sm font-black leading-snug text-green-900 dark:text-green-100 sm:text-base">
                                    {{ $item['modal'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </section>

            </div>
        </section>
    </main>
@endsection