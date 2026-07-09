@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Reflection',
        'title'      => 'Reflection',
        'subtitle'   => '',

        'ratings' => [
            [
                'stars' => '⭐⭐⭐',
                'text'  => 'I feel confident using past modals of deduction.',
                'value' => 'confident',
            ],
            [
                'stars' => '⭐⭐',
                'text'  => 'I can use them, but I need more practice.',
                'value' => 'need_practice',
            ],
            [
                'stars' => '⭐',
                'text'  => 'I need more support to use them correctly.',
                'value' => 'need_support',
            ],
        ],

        'prompts' => [
            [
                'emoji'       => '📘',
                'text'        => 'One new word I learned today',
                'name'        => 'new_word',
                'placeholder' => 'Write one new word...',
                'type'        => 'input',
            ],
            [
                'emoji'       => '✍️',
                'text'        => 'One sentence I can write using a past modal',
                'name'        => 'past_modal_sentence',
                'placeholder' => 'Example: He must have gone out.',
                'type'        => 'textarea',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1050px] flex-col justify-center">

            @include('slider.components.title-subtitle')

            <section class="mx-auto mt-5 w-full overflow-hidden rounded-[1.75rem] border border-emerald-200 bg-white shadow-[0_22px_70px_-45px_rgba(15,23,42,0.45)] dark:border-emerald-400/25 dark:bg-slate-900">

                <div class="border-b border-emerald-100 bg-emerald-50/70 px-4 py-3 dark:border-slate-700 dark:bg-emerald-500/10">
                    <p class="text-sm font-black uppercase tracking-wide text-emerald-700 dark:text-emerald-300">
                        Choose your confidence level
                    </p>
                </div>

                <div class="grid gap-3 p-3 sm:p-4">
                    @foreach($content['ratings'] as $index => $item)
                        <div>
                            <input
                                    type="radio"
                                    name="confidence_level"
                                    id="rating_{{ $index }}"
                                    value="{{ $item['value'] }}"
                                    class="peer sr-only"
                            >

                            <label
                                    for="rating_{{ $index }}"
                                    class="flex cursor-pointer items-center gap-4 rounded-2xl border-2 border-emerald-100 bg-emerald-50 px-4 py-3 transition hover:border-emerald-300 hover:bg-emerald-100/70 peer-checked:border-emerald-500 peer-checked:bg-emerald-100 dark:border-emerald-400/20 dark:bg-emerald-500/10 dark:hover:bg-emerald-500/15 dark:peer-checked:border-emerald-400 dark:peer-checked:bg-emerald-500/20"
                            >
                                <span class="shrink-0 text-2xl sm:text-3xl">
                                    {{ $item['stars'] }}
                                </span>

                                <span class="flex-1 text-[clamp(1rem,2.7vw,1.25rem)] font-black leading-snug text-slate-900 dark:text-white">
                                    {{ $item['text'] }}
                                </span>

                                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full border-2 border-emerald-300 bg-white text-sm font-black text-emerald-700 peer-checked:bg-emerald-500 dark:border-emerald-400/50 dark:bg-slate-950">
                                    ✓
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-emerald-100 bg-white p-3 dark:border-slate-700 dark:bg-slate-900 sm:p-4">
                    <div class="grid gap-3 lg:grid-cols-2">
                        @foreach($content['prompts'] as $item)
                            <article class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 dark:border-slate-700 dark:bg-slate-950/35">
                                <div class="flex items-start gap-3">
                                    <div class="grid h-11 w-11 shrink-0 place-items-center rounded-2xl bg-emerald-100 text-2xl dark:bg-emerald-500/15">
                                        {{ $item['emoji'] }}
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <label class="block text-[clamp(1rem,2.7vw,1.2rem)] font-black leading-snug text-slate-900 dark:text-white">
                                            {{ $item['text'] }}
                                        </label>

                                        @if($item['type'] === 'textarea')
                                            <textarea
                                                    name="{{ $item['name'] }}"
                                                    rows="2"
                                                    placeholder="{{ $item['placeholder'] }}"
                                                    class="mt-3 w-full resize-none rounded-2xl border-2 border-dashed border-emerald-300 bg-white px-4 py-3 text-base font-bold text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-emerald-500/50 dark:bg-slate-950/60 dark:text-white dark:placeholder:text-slate-500 dark:focus:ring-emerald-900/40"
                                            ></textarea>
                                        @else
                                            <input
                                                    type="text"
                                                    name="{{ $item['name'] }}"
                                                    placeholder="{{ $item['placeholder'] }}"
                                                    class="mt-3 w-full rounded-2xl border-2 border-dashed border-emerald-300 bg-white px-4 py-3 text-base font-bold text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-emerald-500/50 dark:bg-slate-950/60 dark:text-white dark:placeholder:text-slate-500 dark:focus:ring-emerald-900/40"
                                                    autocomplete="off"
                                            >
                                        @endif
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

            </section>
        </section>
    </main>
@endsection