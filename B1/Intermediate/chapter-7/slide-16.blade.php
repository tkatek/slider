@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Practice 7',
        'title'      => 'Grammar Focus: Practice 7',
        'subtitle'   => '',
    ];

    $mayPoints = [
        'shows possibility',
        'used when we are not sure',
        'something might happen',
    ];

    $canPoints = [
        'shows ability or general tendency',
        'used for things people are able to do',
    ];

    $chooseSentences = [
        ['before' => 'Firstborn children', 'a' => 'may', 'b' => 'can', 'after' => 'feel pressure.'],
        ['before' => 'Middle children', 'a' => 'can', 'b' => 'may', 'after' => 'be good at solving problems.'],
        ['before' => 'Youngest children', 'a' => 'may', 'b' => 'can', 'after' => 'take risks.'],
        ['before' => 'Only children', 'a' => 'may', 'b' => 'can', 'after' => 'become independent.'],
        ['before' => 'Twins', 'a' => 'can', 'b' => 'may', 'after' => 'understand each other very well.'],
        ['before' => 'Gap children', 'a' => 'can', 'b' => 'may', 'after' => 'mature quickly.'],
    ];

    $rewriteSentences = [
        ['text' => 'It is possible that they feel unsure.', 'start' => 'They'],
        ['text' => 'They are able to get along with others.', 'start' => 'They'],
        ['text' => 'It is possible that he depends on others.', 'start' => 'He'],
        ['text' => 'They are able to learn from older siblings.', 'start' => 'They'],
    ];
@endphp

@section('content')
    <main
            id="mayCanPracticeSlide"
            class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-3 py-3 sm:px-4"
    >
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-3 grid w-full max-w-7xl gap-4 xl:grid-cols-[1fr_0.95fr]">
            <div class="overflow-hidden rounded-2xl border border-purple-200 bg-white shadow-lg shadow-slate-900/10 dark:border-purple-800/70 dark:bg-slate-900">
                <div class="bg-purple-800 px-4 py-2 text-center">
                    <h2 class="text-sm font-black uppercase leading-tight text-white sm:text-base">
                        Part 2: Modals - may / can (for possibility & general tendency)
                    </h2>
                </div>

                <div class="grid gap-3 p-3 sm:p-4 lg:grid-cols-[0.95fr_1.05fr]">
                    <article class="rounded-xl border border-purple-200 bg-purple-50/60 p-3 dark:border-purple-700/60 dark:bg-purple-950/20">
                        <p class="text-center text-sm font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-base">
                            We use <span class="text-purple-700 dark:text-purple-300">may</span> and
                            <span class="text-purple-700 dark:text-purple-300">can</span> to talk about possibility or general ability.
                        </p>

                        <div class="mt-4 grid gap-3">
                            <div class="rounded-xl bg-white p-3 shadow-sm dark:bg-slate-900">
                                <div class="flex items-center gap-3">
                                    <span class="text-3xl">🏆</span>
                                    <p class="rounded-lg bg-purple-100 px-3 py-1.5 text-sm font-black text-purple-900 dark:bg-purple-500/20 dark:text-purple-200">
                                        may = possibility
                                    </p>
                                </div>

                                <ul class="mt-3 space-y-1.5 text-xs font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-sm">
                                    <li>She may feel pressure.</li>
                                    <li>They may find it hard to develop an identity.</li>
                                </ul>
                            </div>

                            <div class="rounded-xl bg-white p-3 shadow-sm dark:bg-slate-900">
                                <div class="flex items-center gap-3">
                                    <span class="text-3xl">💪</span>
                                    <p class="rounded-lg bg-purple-100 px-3 py-1.5 text-sm font-black text-purple-900 dark:bg-purple-500/20 dark:text-purple-200">
                                        can = ability / tendency
                                    </p>
                                </div>

                                <ul class="mt-3 space-y-1.5 text-xs font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-sm">
                                    <li>They can solve problems.</li>
                                    <li>Twins can understand each other well.</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="rounded-xl border border-purple-200 bg-purple-50/60 p-3 dark:border-purple-700/60 dark:bg-purple-950/20">
                        <h3 class="mb-2 text-center text-base font-black text-slate-900 dark:text-slate-50">
                            may vs. can
                        </h3>

                        <div class="overflow-hidden rounded-xl border border-purple-200 bg-white dark:border-slate-700 dark:bg-slate-900">
                            <div class="grid grid-cols-2 border-b border-purple-100 bg-purple-50 text-center text-sm font-black text-purple-900 dark:border-slate-700 dark:bg-slate-800 dark:text-purple-200">
                                <div class="border-r border-purple-100 px-3 py-2 dark:border-slate-700">may</div>
                                <div class="px-3 py-2">can</div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <div class="border-b border-purple-100 p-3 dark:border-slate-700 sm:border-b-0 sm:border-r">
                                    <ul class="space-y-1.5 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        @foreach($mayPoints as $point)
                                            <li class="flex gap-2">
                                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-purple-600"></span>
                                                <span>{{ $point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <p class="mt-3 text-xs font-black text-slate-900 dark:text-slate-50 sm:text-sm">
                                        Example:<br>He may take risks.
                                    </p>
                                </div>

                                <div class="p-3">
                                    <ul class="space-y-1.5 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        @foreach($canPoints as $point)
                                            <li class="flex gap-2">
                                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-purple-600"></span>
                                                <span>{{ $point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <p class="mt-3 text-xs font-black text-slate-900 dark:text-slate-50 sm:text-sm">
                                        Example:<br>He can be creative.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 rounded-xl border border-purple-200 bg-purple-100/70 px-3 py-2 text-center dark:border-purple-700 dark:bg-purple-950/40">
                            <p class="text-xs font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                Both may and can are often used in general truths, not just in the present moment.
                            </p>
                        </div>
                    </article>
                </div>
            </div>

            <article class="overflow-hidden rounded-2xl border border-purple-200 bg-white shadow-lg shadow-slate-900/10 dark:border-purple-800/70 dark:bg-slate-900">
                <div class="bg-purple-800 px-4 py-2 text-center">
                    <h3 class="text-sm font-black uppercase text-white sm:text-base">
                        Practice 2: Modals (may / can)
                    </h3>
                </div>

                <div class="space-y-4 p-3 sm:p-4">
                    <div>
                        <p class="text-xs font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-sm">
                            A. Choose the correct word to complete the sentences.
                        </p>

                        <div class="mt-3 grid gap-2">
                            @foreach($chooseSentences as $index => $sentence)
                                <div class="rounded-xl border border-slate-200 bg-slate-50 p-2.5 text-xs font-bold leading-snug text-slate-800 dark:border-slate-700 dark:bg-slate-800/60 dark:text-slate-100 sm:text-sm">
                                    <span class="mr-1 font-black text-slate-500 dark:text-slate-300">{{ $index + 1 }}.</span>
                                    <span>{{ $sentence['before'] }}</span>

                                    <button
                                            type="button"
                                            class="may-can-choice mx-1 rounded-lg border border-transparent px-2 py-1 font-black text-purple-700 transition hover:border-purple-300 hover:bg-purple-50 dark:text-purple-300 dark:hover:bg-purple-500/10"
                                    >
                                        {{ $sentence['a'] }}
                                    </button>

                                    <span>/</span>

                                    <button
                                            type="button"
                                            class="may-can-choice mx-1 rounded-lg border border-transparent px-2 py-1 font-black text-purple-700 transition hover:border-purple-300 hover:bg-purple-50 dark:text-purple-300 dark:hover:bg-purple-500/10"
                                    >
                                        {{ $sentence['b'] }}
                                    </button>

                                    <span>{{ $sentence['after'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-sm">
                            B. Rewrite the sentences using may or can.
                        </p>

                        <div class="mt-3 grid gap-2">
                            @foreach($rewriteSentences as $index => $sentence)
                                <label class="rounded-xl border border-slate-200 bg-slate-50 p-2.5 dark:border-slate-700 dark:bg-slate-800/60">
                                    <span class="block text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        <span class="font-black text-slate-500 dark:text-slate-300">{{ $index + 1 }}.</span>
                                        {{ $sentence['text'] }}
                                    </span>

                                    <div class="mt-2 flex flex-wrap items-center gap-2">
                                        <span class="text-xs font-black text-slate-700 dark:text-slate-200 sm:text-sm">
                                            -> {{ $sentence['start'] }}
                                        </span>
                                        <input
                                                type="text"
                                                class="min-h-9 min-w-0 flex-1 rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-sm font-bold text-slate-900 outline-none transition focus:border-purple-500 focus:ring-4 focus:ring-purple-500/15 dark:border-slate-600 dark:bg-slate-950 dark:text-slate-50"
                                                autocomplete="off"
                                        >
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.getElementById('mayCanPracticeSlide');
            if (!root) return;

            root.querySelectorAll('.may-can-choice').forEach((button) => {
                button.addEventListener('click', () => {
                    const row = button.closest('div');
                    row?.querySelectorAll('.may-can-choice').forEach((choice) => {
                        choice.classList.remove('border-purple-500', 'bg-purple-600', 'text-white', 'shadow-sm');
                        choice.classList.add('text-purple-700', 'dark:text-purple-300');
                    });

                    button.classList.add('border-purple-500', 'bg-purple-600', 'text-white', 'shadow-sm');
                    button.classList.remove('text-purple-700', 'dark:text-purple-300');
                });
            });

            window.resetSlide = () => {
                root.querySelectorAll('input').forEach((input) => {
                    input.value = '';
                });

                root.querySelectorAll('.may-can-choice').forEach((choice) => {
                    choice.classList.remove('border-purple-500', 'bg-purple-600', 'text-white', 'shadow-sm');
                    choice.classList.add('text-purple-700', 'dark:text-purple-300');
                });
            };
        });
    </script>
@endsection
