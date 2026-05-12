<?php
$content = [
    'page_title' => 'Speaking TIME:',
    'title'      => 'Speaking TIME:',
    'subtitle'   => '',

    'question' => 'When do you usually frown?',
    'sentence_before' => "I usually frown when I'm",
    'sentence_after'  => '.',

    'feelings' => [
        ['emoji' => '😟', 'word' => 'worried'],
        ['emoji' => '😠', 'word' => 'angry'],
        ['emoji' => '😕', 'word' => 'confused'],
        ['emoji' => '😞', 'word' => 'disappointed'],
        ['emoji' => '😢', 'word' => 'sad'],
        ['emoji' => '😫', 'word' => 'tired'],
        ['emoji' => '😤', 'word' => 'annoyed'],
        ['emoji' => '😬', 'word' => 'nervous'],
    ],
];
?>

@extends('slider.simple-layout')

@section('content')
    <main class="min-h-[100dvh] w-full overflow-hidden px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-5 lg:px-7">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1360px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 w-full max-w-[1120px] sm:mt-5 lg:mt-6">
                <div class="relative overflow-hidden rounded-[2rem] border border-orange-200/80 bg-gradient-to-br from-white via-orange-50/70 to-amber-50/80 p-4 shadow-2xl shadow-orange-100/80 backdrop-blur-xl dark:border-orange-900/40 dark:from-slate-950 dark:via-orange-950/20 dark:to-slate-900 dark:shadow-slate-950/40 sm:p-6 lg:p-7">
                    <div class="pointer-events-none absolute -left-28 -top-28 h-72 w-72 rounded-full bg-orange-300/30 blur-3xl dark:bg-orange-600/15"></div>
                    <div class="pointer-events-none absolute -right-28 -bottom-28 h-72 w-72 rounded-full bg-amber-300/35 blur-3xl dark:bg-amber-500/15"></div>

                    <div class="relative grid items-center gap-5 lg:grid-cols-[0.9fr_1.1fr] lg:gap-7">
                        <div class="rounded-[1.75rem] border border-orange-200/80 bg-white/90 p-5 shadow-xl shadow-orange-100/60 dark:border-orange-900/40 dark:bg-slate-950/70 dark:shadow-none sm:p-6 lg:p-7">
                            <div class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-orange-500 to-amber-500 px-4 py-2 text-sm font-black text-white shadow-lg shadow-orange-500/25 sm:text-base">
                                <span>💬</span>
                                <span>{{ $content['title'] }}</span>
                            </div>

                            <h1 class="mt-5 text-balance text-3xl font-black leading-[1.05] tracking-[-0.045em] text-slate-950 dark:text-white sm:text-4xl lg:text-5xl">
                                {{ $content['question'] }}
                            </h1>

                            <div class="mt-5 rounded-3xl border border-orange-100 bg-orange-50/80 p-4 dark:border-orange-900/40 dark:bg-orange-950/20 sm:p-5">
                                <p class="text-sm font-black uppercase tracking-[0.16em] text-orange-700 dark:text-orange-300">
                                    Sentence Support
                                </p>

                                <div class="mt-3 flex flex-col gap-3 rounded-2xl bg-white/85 p-4 shadow-inner dark:bg-slate-900/75 sm:p-5">
                                    <p class="text-xl font-black leading-[1.35] tracking-[-0.02em] text-slate-950 dark:text-white sm:text-2xl lg:text-[1.75rem]">
                                        {{ $content['sentence_before'] }}
                                        <span id="selectedFeelingText" class="inline-flex min-w-[9rem] justify-center rounded-xl bg-stone-100 px-3 py-1 text-orange-600 underline decoration-orange-400 decoration-4 underline-offset-4 dark:bg-slate-800 dark:text-orange-300">
                                            __________
                                        </span>{{ $content['sentence_after'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-[1.75rem] border border-stone-200/80 bg-gradient-to-br from-white to-stone-50/90 p-5 shadow-xl shadow-stone-200/60 dark:border-stone-700/50 dark:from-slate-950/75 dark:to-stone-950/30 dark:shadow-none sm:p-6 lg:p-7">
                            <div class="flex items-center justify-between gap-3">
                                <div>
                                    <p class="text-sm font-black uppercase tracking-[0.16em] text-stone-600 dark:text-stone-300">
                                        Choose the feeling
                                    </p>
                                </div>

                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-stone-700 to-zinc-900 text-3xl shadow-lg shadow-stone-500/20 dark:from-stone-500 dark:to-zinc-700">
                                    🙂
                                </div>
                            </div>

                            <div class="mt-5">
                                <label for="feelingSelect" class="sr-only">Choose the feeling</label>

                                <select
                                        id="feelingSelect"
                                        class="w-full rounded-2xl border-2 border-purple-300/70 bg-white px-4 py-4 text-lg font-black text-purple-700 shadow-lg shadow-purple-200/40 outline-none transition focus:border-purple-500 focus:ring-4 focus:ring-purple-200/60 dark:border-purple-500/50 dark:bg-slate-900 dark:text-purple-200 dark:focus:ring-purple-500/20 sm:text-xl"
                                >
                                    <option value="">Choose a feeling</option>
                                    @foreach($content['feelings'] as $feeling)
                                        <option value="{{ $feeling['word'] }}">
                                            {{ $feeling['emoji'] }} {{ ucfirst($feeling['word']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-5 grid grid-cols-2 gap-3 sm:grid-cols-4 lg:grid-cols-2">
                                @foreach($content['feelings'] as $feeling)
                                    <button
                                            type="button"
                                            data-feeling="{{ $feeling['word'] }}"
                                            class="feeling-chip group rounded-2xl border border-stone-200 bg-white p-3 text-center shadow-sm transition duration-200 hover:-translate-y-1 hover:border-purple-300 hover:shadow-lg hover:shadow-purple-100/60 dark:border-stone-700 dark:bg-slate-900 dark:hover:border-purple-500/60 dark:hover:shadow-none"
                                    >
                                        <span class="block text-3xl transition duration-200 group-hover:scale-110 sm:text-4xl">
                                            {{ $feeling['emoji'] }}
                                        </span>
                                        <span class="mt-2 block text-sm font-black text-slate-900 dark:text-white sm:text-base">
                                            {{ ucfirst($feeling['word']) }}
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const select = document.getElementById('feelingSelect');
            const selectedText = document.getElementById('selectedFeelingText');
            const chips = document.querySelectorAll('.feeling-chip');

            function updateFeeling(value) {
                selectedText.textContent = value ? value : '__________';

                chips.forEach(chip => {
                    const isActive = chip.dataset.feeling === value;

                    chip.classList.toggle('border-purple-500', isActive);
                    chip.classList.toggle('bg-purple-50', isActive);
                    chip.classList.toggle('dark:bg-purple-950/30', isActive);
                });
            }

            select?.addEventListener('change', () => {
                updateFeeling(select.value);
            });

            chips.forEach(chip => {
                chip.addEventListener('click', () => {
                    const value = chip.dataset.feeling || '';
                    select.value = value;
                    updateFeeling(value);
                });
            });

            window.resetSlide = function () {
                if (select) select.value = '';
                updateFeeling('');
            };
        });
    </script>
@endsection