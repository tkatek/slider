@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar Focus',
        'title'      => 'Grammar Focus: Relative Pronoun "Who"',
        'title_class' => 'text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl',
        'subtitle'   => 'What is a good friend?',
    ];

    $noticeSentences = [
        [
            'emoji' => '👭',
            'text' => 'Friends are people <span class="font-black text-blue-700 dark:text-blue-300">who</span> care for each other.',
        ],
        [
            'emoji' => '👬',
            'text' => 'A true friend is someone <span class="font-black text-blue-700 dark:text-blue-300">who</span> listens carefully.',
        ],
        [
            'emoji' => '🫶',
            'text' => 'Good friends are people <span class="font-black text-blue-700 dark:text-blue-300">who</span> respect our feelings.',
        ],
        [
            'emoji' => '🛡️',
            'text' => 'We trust friends <span class="font-black text-blue-700 dark:text-blue-300">who</span> are honest.',
        ],
        [
            'emoji' => '🤝',
            'text' => 'Support means helping people <span class="font-black text-blue-700 dark:text-blue-300">who</span> need us.',
        ],
    ];

    $examples = [
        'A friend is someone <span class="font-black text-blue-700 dark:text-blue-300">who</span> helps you.',
        'I like people <span class="font-black text-blue-700 dark:text-blue-300">who</span> are kind.',
        'A good friend is someone <span class="font-black text-blue-700 dark:text-blue-300">who</span> listens to me.',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-4 w-full max-w-[1180px]">
            <div class="grid gap-4 lg:grid-cols-[0.95fr_1fr]">

                {{-- NOTICE SENTENCES --}}
                <article class="rounded-2xl border-2 border-blue-200 bg-white/95 p-4 shadow-sm dark:border-blue-800 dark:bg-slate-900 sm:p-5">
                    <h3 class="mb-4 flex items-center gap-3 text-lg font-black uppercase tracking-wide text-blue-950 dark:text-blue-100 sm:text-xl">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-700 text-xl text-white shadow-sm">
                            🔍
                        </span>
                        Notice the Sentences:
                    </h3>

                    <div class="space-y-3">
                        @foreach($noticeSentences as $sentence)
                            <div class="grid grid-cols-[4rem_1fr] items-center gap-3 sm:grid-cols-[4.5rem_1fr]">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-3xl shadow-inner dark:bg-blue-950/40 sm:h-16 sm:w-16">
                                    {{ $sentence['emoji'] }}
                                </div>

                                <p class="flex gap-3 text-base font-bold leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                                    <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-blue-600"></span>
                                    <span>{!! $sentence['text'] !!}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </article>

                {{-- RIGHT SIDE --}}
                <div class="grid gap-4">

                    {{-- RULE --}}
                    <article class="rounded-2xl border-2 border-green-200 bg-white/95 p-4 shadow-sm dark:border-green-800 dark:bg-slate-900 sm:p-5">
                        <h3 class="mb-3 flex items-center gap-3 text-lg font-black uppercase tracking-wide text-green-700 dark:text-green-200 sm:text-xl">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-green-600 text-xl text-white shadow-sm">
                                ⭐
                            </span>
                            Rule
                        </h3>

                        <p class="text-base font-bold leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                            We use <span class="font-black text-blue-700 dark:text-blue-300">who</span>
                            to give extra information about people.
                        </p>

                        <div class="mt-4 rounded-xl border-2 border-dashed border-green-400 bg-white px-4 py-3 text-center text-lg font-black dark:bg-slate-900 sm:text-2xl">
                            <span class="text-green-700 dark:text-green-300">Person</span>
                            <span class="mx-2 text-slate-900 dark:text-slate-50">+</span>
                            <span class="text-blue-700 dark:text-blue-300">who</span>
                            <span class="mx-2 text-slate-900 dark:text-slate-50">+</span>
                            <span class="text-purple-700 dark:text-purple-300">verb</span>
                        </div>
                    </article>

                    {{-- EXAMPLES --}}
                    <article class="rounded-2xl border-2 border-amber-200 bg-white/95 p-4 shadow-sm dark:border-amber-800 dark:bg-slate-900 sm:p-5">
                        <h3 class="mb-3 flex items-center gap-3 text-lg font-black uppercase tracking-wide text-amber-600 dark:text-amber-200 sm:text-xl">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-amber-500 text-xl text-white shadow-sm">
                                💡
                            </span>
                            Examples:
                        </h3>

                        <div class="grid gap-4 sm:grid-cols-[1fr_7rem] sm:items-end">
                            <div class="space-y-3">
                                @foreach($examples as $example)
                                    <p class="flex gap-2 text-base font-bold leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                                        <span class="shrink-0 text-amber-500">★</span>
                                        <span>{!! $example !!}</span>
                                    </p>
                                @endforeach
                            </div>

                            <div class="hidden justify-center sm:flex">
                                <div class="flex h-24 w-24 items-center justify-center rounded-3xl bg-amber-50 text-5xl shadow-inner dark:bg-amber-950/40">
                                    👬
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            {{-- REMEMBER --}}
            <div class="mt-4 grid gap-4 rounded-2xl border-2 border-purple-200 bg-white/95 p-4 shadow-sm dark:border-purple-800 dark:bg-slate-900 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
                <article class="flex items-center gap-3">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-purple-600 text-xl font-black text-white shadow-sm">
                        !
                    </span>

                    <div>
                        <h3 class="text-lg font-black uppercase tracking-wide text-purple-700 dark:text-purple-200">
                            Remember:
                        </h3>

                        <p class="mt-1 text-base font-bold leading-snug text-slate-900 dark:text-slate-50">
                            We use <span class="font-black text-blue-700 dark:text-blue-300">who</span>
                            for people, not for things or animals.
                        </p>
                    </div>
                </article>

                <article class="border-t-2 border-purple-100 pt-4 dark:border-purple-800 lg:border-l-2 lg:border-t-0 lg:pl-5 lg:pt-0">
                    <div class="space-y-2 text-base font-bold leading-snug text-slate-900 dark:text-slate-50">
                        <p>
                            <span class="mr-2 text-green-600">✅</span>
                            The boy <span class="font-black text-blue-700 dark:text-blue-300">who</span> plays football is my brother.
                        </p>

                        <p>
                            <span class="mr-2 text-red-600">❌</span>
                            The book <span class="font-black text-blue-700 dark:text-blue-300">who</span> is on the table is new.
                        </p>

                        <p class="pl-8 text-sm font-black text-purple-700 dark:text-purple-300">
                            Incorrect – we don’t use <span class="text-blue-700 dark:text-blue-300">who</span> for things.
                        </p>
                    </div>
                </article>
            </div>
        </section>
    </main>
@endsection