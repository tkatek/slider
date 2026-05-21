<?php

$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Permissions, Obligation, & Prohibitions',
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl',
    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-slate-500 to-slate-700',
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'lg:col-span-2',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-3xl border border-slate-200/80 bg-gradient-to-br from-slate-50 via-white to-blue-50/70 p-5 shadow-sm dark:border-slate-700/70 dark:from-slate-900 dark:via-slate-900 dark:to-blue-950/20 sm:p-6">
                            <div class="flex items-start gap-4">
                                <span class="inline-flex h-11 w-11 flex-none items-center justify-center rounded-2xl bg-white text-xl shadow-sm ring-1 ring-slate-200 dark:bg-slate-950/70 dark:ring-slate-700">
                                    ✅
                                </span>

                                <div class="min-w-0">
                                    <p class="text-base font-black leading-[1.6] text-slate-800 dark:text-slate-100 sm:text-lg">
                                        We use
                                        <span class="rounded-lg bg-red-50 px-2 py-0.5 font-black text-red-600 ring-1 ring-red-100 dark:bg-red-950/30 dark:text-red-300 dark:ring-red-400/20">can</span>
                                        to talk about things that are allowed, and
                                        <span class="rounded-lg bg-red-50 px-2 py-0.5 font-black text-red-600 ring-1 ring-red-100 dark:bg-red-950/30 dark:text-red-300 dark:ring-red-400/20">can&rsquo;t</span>
                                        or
                                        <span class="rounded-lg bg-amber-50 px-2 py-0.5 font-black text-amber-600 ring-1 ring-amber-100 dark:bg-amber-950/30 dark:text-amber-300 dark:ring-amber-400/20">mustn&rsquo;t</span>
                                        to talk about things that
                                        <span class="rounded-lg bg-lime-50 px-2 py-0.5 font-black text-lime-700 ring-1 ring-lime-100 dark:bg-lime-950/30 dark:text-lime-300 dark:ring-lime-400/20">are not allowed</span>.
                                        We also use
                                        <span class="rounded-lg bg-sky-50 px-2 py-0.5 font-black text-sky-700 ring-1 ring-sky-100 dark:bg-sky-950/30 dark:text-sky-300 dark:ring-sky-400/20">must</span>
                                        for things we are obliged to do.
                                    </p>
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],

        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-violet-500 to-indigo-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-3xl border border-violet-100 bg-white p-5 shadow-sm dark:border-violet-400/20 dark:bg-slate-900/80 sm:p-6">
                            <div class="mb-4 flex items-center gap-3">
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-violet-50 text-xl shadow-sm ring-1 ring-violet-100 dark:bg-violet-950/30 dark:ring-violet-400/20">
                                    🧩
                                </span>
                                <h3 class="text-sm font-black uppercase tracking-[0.16em] text-violet-600 dark:text-violet-300">
                                    Modal + Base Verb
                                </h3>
                            </div>

                            <div class="grid grid-cols-[minmax(0,1fr)_auto_minmax(0,1fr)] items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50/80 p-4 text-center dark:border-slate-700 dark:bg-slate-950/35">
                                <div class="space-y-2">
                                    <span class="block rounded-xl bg-white px-3 py-2 text-base font-black text-slate-900 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:ring-slate-700">Can</span>
                                    <span class="block rounded-xl bg-white px-3 py-2 text-base font-black text-slate-900 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:ring-slate-700">can&rsquo;t</span>
                                    <span class="block rounded-xl bg-white px-3 py-2 text-base font-black text-slate-900 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:ring-slate-700">must</span>
                                    <span class="block rounded-xl bg-white px-3 py-2 text-base font-black text-slate-900 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:ring-slate-700">mustn&rsquo;t</span>
                                </div>

                                <span class="text-xl font-black text-slate-500 dark:text-slate-300">+</span>

                                <div class="rounded-2xl bg-violet-50 px-4 py-5 text-base font-black leading-tight text-violet-700 ring-1 ring-violet-100 dark:bg-violet-950/25 dark:text-violet-300 dark:ring-violet-400/20">
                                    The infinitive verb
                                </div>
                            </div>

                            <div class="mt-4 rounded-2xl border border-red-100 bg-red-50/70 px-4 py-3 dark:border-red-400/20 dark:bg-red-950/20">
                                <p class="text-center text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg">
                                    I <span class="font-black text-red-500 dark:text-red-300">can cross</span> the road now.
                                </p>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],

        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-cyan-500 to-blue-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-3xl border border-sky-100 bg-white p-5 shadow-sm dark:border-sky-400/20 dark:bg-slate-900/80 sm:p-6">
                            <div class="mb-4 flex items-center gap-3">
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-sky-50 text-xl shadow-sm ring-1 ring-sky-100 dark:bg-sky-950/30 dark:ring-sky-400/20">
                                    🪪
                                </span>
                                <h3 class="text-sm font-black uppercase tracking-[0.16em] text-sky-600 dark:text-sky-300">
                                    Be Allowed To
                                </h3>
                            </div>

                            <div class="grid grid-cols-[minmax(0,1fr)_auto_minmax(0,1.15fr)] items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50/80 p-4 text-center dark:border-slate-700 dark:bg-slate-950/35">
                                <div class="space-y-2">
                                    <span class="block rounded-xl bg-white px-3 py-2 text-base font-black text-slate-900 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:ring-slate-700">am</span>
                                    <span class="block rounded-xl bg-white px-3 py-2 text-base font-black text-slate-900 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:ring-slate-700">is</span>
                                    <span class="block rounded-xl bg-white px-3 py-2 text-base font-black text-slate-900 shadow-sm ring-1 ring-slate-100 dark:bg-slate-900 dark:text-slate-100 dark:ring-slate-700">are</span>
                                </div>

                                <span class="text-xl font-black text-slate-500 dark:text-slate-300">+</span>

                                <div class="space-y-2">
                                    <span class="block rounded-xl bg-sky-50 px-3 py-2 text-base font-black text-sky-700 ring-1 ring-sky-100 dark:bg-sky-950/25 dark:text-sky-300 dark:ring-sky-400/20">allowed</span>
                                    <span class="block rounded-xl bg-sky-50 px-3 py-2 text-base font-black text-sky-700 ring-1 ring-sky-100 dark:bg-sky-950/25 dark:text-sky-300 dark:ring-sky-400/20">+ to + infinitive</span>
                                </div>
                            </div>

                            <div class="mt-4 rounded-2xl border border-red-100 bg-red-50/70 px-4 py-3 dark:border-red-400/20 dark:bg-red-950/20">
                                <p class="text-center text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg">
                                    I <span class="font-black text-slate-900 dark:text-slate-100">am allowed</span>
                                    <span class="font-black text-red-500 dark:text-red-300">to cross</span>
                                    the road now.
                                </p>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])