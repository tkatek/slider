@extends('slider.simple-layout')

@php
    $content = [
        'title'      => 'New Language & Expressions',
        'subtitle'   => '',

        'columns' => [
            'Expression',
            'Meaning',
            'Example from the Script',
            'When to Use',
        ],

        'rows' => [
            [
                'emoji'      => '🙋‍♀️',
                'expression' => "I’m sorry to interrupt you.",
                'meaning'    => 'Saying sorry for speaking when it may not be a good time.',
                'example'    => "Hi, Barbara. I’m sorry to interrupt you.",
                'use'        => 'When you need to speak but someone is busy.',
            ],
            [
                'emoji'      => '❓',
                'expression' => "What’s up?",
                'meaning'    => 'Asking what the problem or situation is.',
                'example'    => "Hello, Barbara. What’s up?",
                'use'        => 'When you want to know what is happening.',
            ],
            [
                'emoji'      => '✅',
                'expression' => "I’m sure ...",
                'meaning'    => 'Very certain about something.',
                'example'    => "How about a teddy bear? I’m sure she’d like a teddy bear.",
                'use'        => 'When you are confident about something.',
            ],
            [
                'emoji'      => '🤔',
                'expression' => "I have my doubts.",
                'meaning'    => 'Not completely sure; feeling uncertain.',
                'example'    => "I have my doubts. She has a really shabby old teddy.",
                'use'        => 'When you are not completely convinced about something.',
            ],
            [
                'emoji'      => '❔',
                'expression' => "I’m not certain ...",
                'meaning'    => 'Not completely sure about something.',
                'example'    => "I’m not certain she has room in her heart for another one.",
                'use'        => 'When you are unsure about something.',
            ],
            [
                'emoji'      => '🤷‍♀️',
                'expression' => "I can’t tell you for sure.",
                'meaning'    => 'Not able to say something with 100% certainty.',
                'example'    => "I can’t tell you for sure. She’s not very creative.",
                'use'        => 'When you don’t have enough information to be certain.',
            ],
            [
                'emoji'      => '💭',
                'expression' => "It might ...",
                'meaning'    => 'Something is possible, but not certain.',
                'example'    => "Well, a new painting set might help her to be more creative.",
                'use'        => 'When something is possible but not certain.',
            ],
            [
                'emoji'      => '😕',
                'expression' => "I’m just not sure ...",
                'meaning'    => 'Still uncertain; not completely decided.',
                'example'    => "I’m just not sure a painting set is a good idea.",
                'use'        => 'When you are uncertain and need more information.',
            ],
            [
                'emoji'      => '🤷',
                'expression' => "It’s hard to say.",
                'meaning'    => 'Difficult to decide or know.',
                'example'    => "It’s hard to say. It might scare her.",
                'use'        => 'When no clear answer is available.',
            ],
            [
                'emoji'      => '❌',
                'expression' => "It won’t.",
                'meaning'    => 'A strong negative prediction.',
                'example'    => "No, it won’t. She’s a tough little girl.",
                'use'        => 'When you are certain something will not happen.',
            ],
            [
                'emoji'      => '😟',
                'expression' => "Oh dear!",
                'meaning'    => 'An expression of worry, surprise or concern.',
                'example'    => "Oh dear...",
                'use'        => 'When you feel worried, sad or surprised.',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1350px] flex-col justify-center">

            @include('slider.components.title-subtitle')

            <section class="mx-auto mt-4 w-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_22px_70px_-48px_rgba(15,23,42,0.45)] dark:border-slate-700 dark:bg-slate-900">

                {{-- Desktop / tablet table --}}
                <div class="hidden lg:block">
                    <div class="grid grid-cols-[0.85fr_1.05fr_1.45fr_1.2fr] border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800/70">
                        @foreach($content['columns'] as $column)
                            <div class="px-4 py-3 text-sm font-black uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                {{ $column }}
                            </div>
                        @endforeach
                    </div>

                    <div class="divide-y divide-slate-200 dark:divide-slate-700">
                        @foreach($content['rows'] as $row)
                            <article class="grid grid-cols-[0.85fr_1.05fr_1.45fr_1.2fr]">
                                <div class="flex items-center gap-3 px-4 py-3">
                                    <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-emerald-50 text-xl dark:bg-emerald-500/10">
                                        {{ $row['emoji'] }}
                                    </div>

                                    <p class="text-base font-black leading-snug text-emerald-700 dark:text-emerald-300">
                                        {{ $row['expression'] }}
                                    </p>
                                </div>

                                <div class="border-l border-slate-200 px-4 py-3 dark:border-slate-700">
                                    <p class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                        {{ $row['meaning'] }}
                                    </p>
                                </div>

                                <div class="border-l border-slate-200 bg-purple-50/50 px-4 py-3 dark:border-slate-700 dark:bg-purple-500/5">
                                    <p class="text-sm font-bold italic leading-snug text-slate-800 dark:text-slate-100">
                                        “{{ $row['example'] }}”
                                    </p>
                                </div>

                                <div class="border-l border-slate-200 px-4 py-3 dark:border-slate-700">
                                    <p class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                        {{ $row['use'] }}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                {{-- Mobile cards --}}
                <div class="grid gap-3 p-3 lg:hidden">
                    @foreach($content['rows'] as $row)
                        <article class="rounded-2xl border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-950/35">
                            <div class="flex items-start gap-3">
                                <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-2xl dark:bg-emerald-500/10">
                                    {{ $row['emoji'] }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <p class="text-lg font-black leading-tight text-emerald-700 dark:text-emerald-300">
                                        {{ $row['expression'] }}
                                    </p>

                                    <p class="mt-2 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                        {{ $row['meaning'] }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-3 rounded-xl bg-purple-50 px-3 py-2 dark:bg-purple-500/10">
                                <p class="text-xs font-black uppercase tracking-wide text-purple-700 dark:text-purple-300">
                                    Example from the Script
                                </p>

                                <p class="mt-1 text-sm font-bold italic leading-snug text-slate-800 dark:text-slate-100">
                                    “{{ $row['example'] }}”
                                </p>
                            </div>

                            <div class="mt-3 rounded-xl bg-slate-50 px-3 py-2 dark:bg-white/10">
                                <p class="text-xs font-black uppercase tracking-wide text-slate-500 dark:text-slate-300">
                                    When to Use
                                </p>

                                <p class="mt-1 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                    {{ $row['use'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>

            </section>
        </section>
    </main>
@endsection