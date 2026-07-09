@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Present Continuous Active & Passive',
        'title'      => 'Present Continuous',
        'subtitle'   => 'Active & Passive',

        'intro' => 'We use the present continuous to talk about actions that are happening now, changes that are taking place, and situations that are temporary.',

        'active_form' => [
            [
                'label' => 'Affirmative:',
                'text'  => 'Subject + am/is/are + <span class="font-black text-red-600 dark:text-red-300">verb-ing</span>',
            ],
            [
                'label' => 'Negative:',
                'text'  => 'Subject + am/is/are + not + <span class="font-black text-red-600 dark:text-red-300">verb-ing</span>',
            ],
            [
                'label' => 'Question:',
                'text'  => 'Am/Is/Are + subject + <span class="font-black text-red-600 dark:text-red-300">verb-ing</span>?',
            ],
        ],

        'active_examples' => [
            'I <span class="font-black text-red-600 dark:text-red-300">am discussing</span> climate change and how it <span class="font-black text-red-600 dark:text-red-300">is affecting</span> our planet.',
            'Human activities <span class="font-black text-red-600 dark:text-red-300">are releasing</span> large amounts of greenhouse gases.',
            'These gases <span class="font-black text-red-600 dark:text-red-300">are trapping</span> heat and <span class="font-black text-red-600 dark:text-red-300">causing</span> the Earth’s temperature to rise.',
            'Extreme weather events <span class="font-black text-red-600 dark:text-red-300">are becoming</span> more frequent and severe.',
            'Sea levels <span class="font-black text-red-600 dark:text-red-300">are rising</span> at an increasing rate.',
            'Many plant and animal species <span class="font-black text-red-600 dark:text-red-300">are struggling</span> to adapt to the changing climate.',
            'So, <span class="font-black text-red-600 dark:text-red-300">let’s take</span> action today by reducing our carbon footprint.',
        ],

        'passive_form' => [
            [
                'label' => 'Affirmative:',
                'text'  => 'am/is/are + <span class="font-black text-red-600 dark:text-red-300">being</span> + past participle',
            ],
            [
                'label' => 'Negative:',
                'text'  => 'am/is/are + not + <span class="font-black text-red-600 dark:text-red-300">being</span> + past participle',
            ],
            [
                'label' => 'Question:',
                'text'  => 'Am/Is/Are + <span class="font-black text-red-600 dark:text-red-300">being</span> + past participle?',
            ],
        ],

        'passive_examples' => [
            'Climate change <span class="font-black text-red-600 dark:text-red-300">is being discussed</span> in this video.',
            'Large amounts of greenhouse gases <span class="font-black text-red-600 dark:text-red-300">are being released</span> into the atmosphere.',
            'Heat <span class="font-black text-red-600 dark:text-red-300">is being trapped</span> and the Earth’s temperature <span class="font-black text-red-600 dark:text-red-300">is being caused</span> to rise.',
            'Extreme weather events like hurricanes, floods, and droughts <span class="font-black text-red-600 dark:text-red-300">are being experienced</span> around the world.',
            'Coastal communities and infrastructure <span class="font-black text-red-600 dark:text-red-300">are being put</span> at risk.',
            'Many plant and animal species <span class="font-black text-red-600 dark:text-red-300">are being affected</span>.',
            'Action <span class="font-black text-red-600 dark:text-red-300">is being taken</span> to reduce our carbon footprint.',
        ],

        'time_expressions' => [
            'now',
            'at the moment',
            'right now',
            'these days',
            'currently',
            'at an increasing rate',
            'more and more',
            'nowadays',
        ],

        'remember' => [
            [
                'title' => 'Verbs ending in -e',
                'items' => [
                    'drop the -e before -ing',
                    'make → making',
                    'rise → rising',
                    'cause → causing',
                ],
            ],
            [
                'title' => 'Short verbs',
                'items' => [
                    'double the last consonant',
                    'put → putting',
                    'trap → trapping',
                ],
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-start overflow-x-hidden bg-gradient-to-br from-emerald-50 via-white to-sky-50 px-4 py-5 text-slate-950 dark:from-slate-950 dark:via-slate-900 dark:to-emerald-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1320px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 w-full max-w-[1180px]">
                <div class="rounded-[1.5rem] border border-emerald-200 bg-white/90 px-5 py-3 text-center shadow-[0_16px_45px_rgba(15,118,110,0.10)] dark:border-emerald-500/25 dark:bg-slate-900/90">
                    <p class="text-base font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-lg">
                        {{ $content['intro'] }}
                    </p>
                </div>

                <div class="mt-5 grid gap-5 lg:grid-cols-2">

                    {{-- PRESENT CONTINUOUS ACTIVE --}}
                    <section class="overflow-hidden rounded-[1.75rem] border border-emerald-200 bg-white/95 shadow-[0_20px_55px_rgba(15,118,110,0.12)] dark:border-emerald-500/25 dark:bg-slate-900/90">
                        <div class="border-b border-emerald-200 bg-emerald-100/80 px-6 py-2.5 text-emerald-900 dark:border-emerald-500/25 dark:bg-emerald-900/30 dark:text-emerald-100">
                            <h2 class="text-center text-sm font-extrabold uppercase tracking-wide sm:text-lg">
                                Present Continuous Active
                            </h2>
                        </div>

                        <div class="p-5">
                            <div class="mb-4 inline-flex rounded-xl bg-emerald-600 px-3 py-1 text-xs font-black uppercase tracking-wide text-white">
                                Form
                            </div>

                            <div class="space-y-2 text-sm font-extrabold text-slate-800 dark:text-slate-100">
                                @foreach($content['active_form'] as $row)
                                    <div class="grid gap-2 sm:grid-cols-[7rem_1fr]">
                                        <span class="font-black">{{ $row['label'] }}</span>
                                        <span>{!! $row['text'] !!}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-5">
                                <p class="mb-3 text-sm font-black text-emerald-700 dark:text-emerald-300">
                                    Examples from the script
                                </p>

                                <ul class="space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100">
                                    @foreach($content['active_examples'] as $example)
                                        <li class="flex items-start gap-2">
                                            <span class="mt-[0.1rem] text-emerald-600 dark:text-emerald-300">•</span>
                                            <span>{!! $example !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>

                    {{-- PRESENT CONTINUOUS PASSIVE --}}
                    <section class="overflow-hidden rounded-[1.75rem] border border-blue-200 bg-white/95 shadow-[0_20px_55px_rgba(37,99,235,0.12)] dark:border-blue-500/25 dark:bg-slate-900/90">
                        <div class="border-b border-blue-200 bg-blue-100/80 px-6 py-2.5 text-blue-900 dark:border-blue-500/25 dark:bg-blue-900/30 dark:text-blue-100">
                            <h2 class="text-center text-sm font-extrabold uppercase tracking-wide sm:text-lg">
                                Present Continuous Passive
                            </h2>
                        </div>

                        <div class="p-5">
                            <div class="mb-4 inline-flex rounded-xl bg-blue-600 px-3 py-1 text-xs font-black uppercase tracking-wide text-white">
                                Form
                            </div>

                            <div class="space-y-2 text-sm font-extrabold text-slate-800 dark:text-slate-100">
                                @foreach($content['passive_form'] as $row)
                                    <div class="grid gap-2 sm:grid-cols-[7rem_1fr]">
                                        <span class="font-black">{{ $row['label'] }}</span>
                                        <span>{!! $row['text'] !!}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-5">
                                <p class="mb-3 text-sm font-black text-blue-700 dark:text-blue-300">
                                    Examples from the script
                                </p>

                                <ul class="space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100">
                                    @foreach($content['passive_examples'] as $example)
                                        <li class="flex items-start gap-2">
                                            <span class="mt-[0.1rem] text-blue-600 dark:text-blue-300">•</span>
                                            <span>{!! $example !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>

                    {{-- TIME EXPRESSIONS --}}
                    <section class="overflow-hidden rounded-[1.75rem] border border-amber-200 bg-white/95 shadow-[0_20px_55px_rgba(245,158,11,0.12)] dark:border-amber-500/25 dark:bg-slate-900/90">
                        <div class="border-b border-amber-200 bg-amber-100/80 px-6 py-2.5 text-amber-900 dark:border-amber-500/25 dark:bg-amber-900/30 dark:text-amber-100">
                            <h2 class="text-center text-sm font-extrabold uppercase tracking-wide sm:text-lg">
                                Time Expressions
                            </h2>
                        </div>

                        <div class="p-5">
                            <ul class="grid gap-x-8 gap-y-2 text-sm font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:grid-cols-2">
                                @foreach($content['time_expressions'] as $item)
                                    <li class="flex items-start gap-2.5">
                                        <span class="mt-[0.1rem] text-amber-600 dark:text-amber-300">•</span>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>

                    {{-- REMEMBER --}}
                    <section class="overflow-hidden rounded-[1.75rem] border border-violet-200 bg-white/95 shadow-[0_20px_55px_rgba(124,58,237,0.12)] dark:border-violet-500/25 dark:bg-slate-900/90">
                        <div class="border-b border-violet-200 bg-violet-100/80 px-6 py-2.5 text-violet-900 dark:border-violet-500/25 dark:bg-violet-900/30 dark:text-violet-100">
                            <h2 class="text-center text-sm font-extrabold uppercase tracking-wide sm:text-lg">
                                Remember!
                            </h2>
                        </div>

                        <div class="grid gap-4 p-5 sm:grid-cols-2">
                            @foreach($content['remember'] as $box)
                                <div>
                                    <p class="mb-2 text-sm font-black text-violet-700 dark:text-violet-300">
                                        {{ $box['title'] }}
                                    </p>

                                    <ul class="space-y-2 text-sm font-extrabold leading-snug text-slate-800 dark:text-slate-100">
                                        @foreach($box['items'] as $item)
                                            <li class="flex items-start gap-2.5">
                                                <span class="mt-[0.1rem] text-violet-600 dark:text-violet-300">•</span>
                                                <span>{{ $item }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </section>

                </div>
            </div>
        </section>
    </main>
@endsection