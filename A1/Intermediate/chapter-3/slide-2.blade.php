<?php
$content = [
    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to',
    'objectives' => [
        [
            'label' => 'School Places',
            'text' => 'Identify 6 school places correctly. 🏫📚🧑‍🏫',
        ],
        [
            'label' => 'Progress Questions',
            'text' => 'Ask 3 questions about a child’s progress. 🧒📈❓',
        ],
        [
            'label' => 'Simple Present',
            'text' => 'Respond using simple present tense sentences. ✅🗣️🕒',
        ],
        [
            'label' => 'Greetings',
            'text' => 'Distinguish between formal and informal greetings. 👋🤝😊',
        ],
    ],
];
?>
@extends("slider.simple-layout")

@section("style")
<style></style>
@endsection

@section("content")
<main class="w-full">
                    <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
                        <section class="w-full">
                        <div class="grid place-items-center text-center gap-6 sm:gap-8">
                            <div id="titleBlock" class="space-y-2 sm:space-y-3" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                            <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                                </span>
                            </h1>

                            <p class="mx-auto max-w-xl font-extrabold tracking-[-0.02em] text-base sm:text-lg text-slate-700 dark:text-slate-200">
                                {{ $content['subtitle'] }}
                            </p>
                            </div>

                            <div id="timeline" class="outcomes-timeline w-full max-w-3xl text-left flex flex-col gap-4 sm:gap-5">

                            <div class="outcome-item relative z-10 flex items-center gap-5 sm:gap-6 rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-5 opacity-0 shadow-[0_10px_30px_-18px_rgba(0,0,0,0.18)] backdrop-blur transition-all duration-300 translate-y-2 hover:-translate-y-0.5 hover:shadow-[0_22px_40px_-20px_rgba(0,0,0,0.24)] dark:border-slate-700/70 dark:bg-slate-900/55" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                                <div class="marker-circle flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 text-[0.95rem] font-extrabold shadow-[inset_0_2px_6px_rgba(0,0,0,0.06)] text-indigo-600 border-indigo-100 bg-indigo-50/80 dark:text-indigo-300 dark:border-white/10 dark:bg-white/5">
                                01
                                </div>

                                <div class="flex-1">
                                <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">
                                    {{ $content['objectives'][0]['label'] }}
                                </span>

                                <p class="text-lg sm:text-xl font-extrabold leading-[1.2] text-slate-900 dark:text-slate-100">
                                    {{ $content['objectives'][0]['text'] }}
                                </p>
                                </div>
                            </div>

                            <div class="outcome-item relative z-10 flex items-center gap-5 sm:gap-6 rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-5 opacity-0 shadow-[0_10px_30px_-18px_rgba(0,0,0,0.18)] backdrop-blur transition-all duration-300 translate-y-2 hover:-translate-y-0.5 hover:shadow-[0_22px_40px_-20px_rgba(0,0,0,0.24)] dark:border-slate-700/70 dark:bg-slate-900/55" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                                <div class="marker-circle flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 text-[0.95rem] font-extrabold shadow-[inset_0_2px_6px_rgba(0,0,0,0.06)] text-emerald-600 border-emerald-100 bg-emerald-50/80 dark:text-emerald-300 dark:border-white/10 dark:bg-white/5">
                                02
                                </div>

                                <div class="flex-1">
                                <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">
                                    {{ $content['objectives'][1]['label'] }}
                                </span>

                                <p class="text-lg sm:text-xl font-extrabold leading-[1.2] text-slate-900 dark:text-slate-100">
                                    {{ $content['objectives'][1]['text'] }}
                                </p>
                                </div>
                            </div>

                            <div class="outcome-item relative z-10 flex items-center gap-5 sm:gap-6 rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-5 opacity-0 shadow-[0_10px_30px_-18px_rgba(0,0,0,0.18)] backdrop-blur transition-all duration-300 translate-y-2 hover:-translate-y-0.5 hover:shadow-[0_22px_40px_-20px_rgba(0,0,0,0.24)] dark:border-slate-700/70 dark:bg-slate-900/55" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                                <div class="marker-circle flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 text-[0.95rem] font-extrabold shadow-[inset_0_2px_6px_rgba(0,0,0,0.06)] text-amber-600 border-amber-100 bg-amber-50/80 dark:text-amber-300 dark:border-white/10 dark:bg-white/5">
                                03
                                </div>

                                <div class="flex-1">
                                <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">
                                    {{ $content['objectives'][2]['label'] }}
                                </span>

                                <p class="text-lg sm:text-xl font-extrabold leading-[1.2] text-slate-900 dark:text-slate-100">
                                    {{ $content['objectives'][2]['text'] }}
                                </p>
                                </div>
                            </div>

                            <div class="outcome-item relative z-10 flex items-center gap-5 sm:gap-6 rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-5 opacity-0 shadow-[0_10px_30px_-18px_rgba(0,0,0,0.18)] backdrop-blur transition-all duration-300 translate-y-2 hover:-translate-y-0.5 hover:shadow-[0_22px_40px_-20px_rgba(0,0,0,0.24)] dark:border-slate-700/70 dark:bg-slate-900/55" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                                <div class="marker-circle flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 text-[0.95rem] font-extrabold shadow-[inset_0_2px_6px_rgba(0,0,0,0.06)] text-rose-600 border-rose-100 bg-rose-50/80 dark:text-rose-300 dark:border-white/10 dark:bg-white/5">
                                04
                                </div>

                                <div class="flex-1">
                                <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">
                                    {{ $content['objectives'][3]['label'] }}
                                </span>

                                <p class="text-lg sm:text-xl font-extrabold leading-[1.2] text-slate-900 dark:text-slate-100">
                                    {{ $content['objectives'][3]['text'] }}
                                </p>
                                </div>
                            </div>

                            </div>
                        </div>
                        </section>
                    </div>
             </main>
@endsection

@section("script")
<script></script>
@endsection
