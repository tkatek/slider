@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar Focus',
        'title'      => 'Grammar Focus: Relative Pronoun "Who"',
        'subtitle'   => 'What is a good friend?',
    ];

    $noticeSentences = [
        ['emoji' => '👭', 'text' => 'Friends are people <span class="font-black text-blue-700 dark:text-blue-300">who</span> care for each other.'],
        ['emoji' => '👬', 'text' => 'A true friend is someone <span class="font-black text-blue-700 dark:text-blue-300">who</span> listens carefully.'],
        ['emoji' => '🫶', 'text' => 'Good friends are people <span class="font-black text-blue-700 dark:text-blue-300">who</span> respect our feelings.'],
        ['emoji' => '🛡️', 'text' => 'We trust friends <span class="font-black text-blue-700 dark:text-blue-300">who</span> are honest.'],
        ['emoji' => '🤝', 'text' => 'Support means helping people <span class="font-black text-blue-700 dark:text-blue-300">who</span> need us.'],
    ];

    $examples = [
        'A friend is someone <span class="font-black text-blue-700 dark:text-blue-300">who</span> helps you.',
        'I like people <span class="font-black text-blue-700 dark:text-blue-300">who</span> are kind.',
        'A good friend is someone <span class="font-black text-blue-700 dark:text-blue-300">who</span> listens to me.',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-5">
        <div class="w-full [&_h1]:!text-4xl [&_h1]:sm:!text-5xl">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-5 w-full max-w-6xl">
            <div class="overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900">
                <div class="grid gap-4 p-4 lg:grid-cols-[1fr_1fr] lg:p-6">
                    <article class="rounded-2xl border border-blue-200 bg-blue-50/70 p-4 dark:border-blue-800 dark:bg-blue-950/25">
                        <h3 class="mb-4 flex items-center gap-2 text-lg font-black uppercase text-blue-900 dark:text-blue-200">
                            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-700 text-white">🔍</span>
                            Notice the Sentences:
                        </h3>

                        <div class="space-y-3">
                            @foreach($noticeSentences as $sentence)
                                <div class="grid grid-cols-[2.5rem_1fr] items-start gap-3 rounded-xl bg-white px-3 py-2.5 shadow-sm dark:bg-slate-900">
                                    <div class="text-2xl">{{ $sentence['emoji'] }}</div>
                                    <p class="text-base font-bold leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                                        {!! $sentence['text'] !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </article>

                    <div class="grid gap-4">
                        <article class="rounded-2xl border border-green-200 bg-green-50/70 p-4 dark:border-green-800 dark:bg-green-950/25">
                            <h3 class="mb-3 flex items-center gap-2 text-lg font-black uppercase text-green-800 dark:text-green-200">
                                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-green-600 text-white">⭐</span>
                                Rule
                            </h3>

                            <p class="text-lg font-bold leading-snug text-slate-900 dark:text-slate-50">
                                We use <span class="font-black text-blue-700 dark:text-blue-300">who</span> to give extra information about people.
                            </p>

                            <div class="mt-4 rounded-xl border border-dashed border-green-500 bg-white px-4 py-3 text-center text-xl font-black dark:bg-slate-900 sm:text-2xl">
                                <span class="text-green-700 dark:text-green-300">Person</span>
                                <span class="mx-2 text-slate-900 dark:text-slate-50">+</span>
                                <span class="text-blue-700 dark:text-blue-300">who</span>
                                <span class="mx-2 text-slate-900 dark:text-slate-50">+</span>
                                <span class="text-purple-700 dark:text-purple-300">verb</span>
                            </div>
                        </article>

                        <article class="rounded-2xl border border-amber-200 bg-amber-50/70 p-4 dark:border-amber-800 dark:bg-amber-950/25">
                            <h3 class="mb-3 flex items-center gap-2 text-lg font-black uppercase text-amber-700 dark:text-amber-200">
                                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-500 text-white">💡</span>
                                Examples:
                            </h3>

                            <div class="space-y-3">
                                @foreach($examples as $example)
                                    <p class="flex gap-2 text-base font-bold leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                                        <span class="shrink-0 text-yellow-500">★</span>
                                        <span>{!! $example !!}</span>
                                    </p>
                                @endforeach
                            </div>
                        </article>
                    </div>
                </div>

                <div class="grid gap-4 border-t border-slate-200 p-4 dark:border-slate-700 lg:grid-cols-2 lg:p-6">
                    <article class="rounded-2xl border border-purple-200 bg-purple-50/70 p-4 dark:border-purple-800 dark:bg-purple-950/25">
                        <h3 class="mb-2 flex items-center gap-2 text-lg font-black uppercase text-purple-800 dark:text-purple-200">
                            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600 text-white">!</span>
                            Remember:
                        </h3>

                        <p class="text-base font-bold leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                            We use <span class="font-black text-blue-700 dark:text-blue-300">who</span> for people, not for things or animals.
                        </p>
                    </article>

                    <article class="rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800/60">
                        <div class="space-y-3 text-base font-bold leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                            <p>
                                <span class="mr-2 text-green-600">✅</span>
                                The boy <span class="font-black text-blue-700 dark:text-blue-300">who</span> plays football is my brother.
                            </p>

                            <p>
                                <span class="mr-2 text-red-600">❌</span>
                                The book <span class="font-black text-blue-700 dark:text-blue-300">who</span> is on the table is new.
                            </p>

                            <p class="text-sm font-black text-purple-700 dark:text-purple-300">
                                Incorrect – we don’t use <span class="text-blue-700 dark:text-blue-300">who</span> for things.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
@endsection