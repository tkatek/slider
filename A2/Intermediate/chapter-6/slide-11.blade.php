<?php
$content = [
    'page_title' => 'Time Expressions',
    'title' => 'Time Expressions',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Asking Questions:',
            'tone' => 'from-slate-500 to-sky-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-3">
                            <div class="rounded-2xl border border-sky-100 bg-sky-50/60 px-4 py-3 text-base font-bold leading-snug text-slate-900 dark:border-sky-400/20 dark:bg-sky-950/20 dark:text-slate-100">
                                "What <span class="font-black text-indigo-600 dark:text-indigo-300">happened</span> while you <span class="font-black text-violet-600 dark:text-violet-300">were sleeping</span>?"
                            </div>
                            <div class="rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-base font-bold leading-snug text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-100">
                                "What happened while you were at school?"
                            </div>
                            <div class="rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-base font-bold leading-snug text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-100">
                                "What happened while I was away?"
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Interrupted Actions (when):',
            'tone' => 'from-slate-500 to-rose-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-3">
                            <div class="rounded-2xl border border-rose-100 bg-rose-50/60 px-4 py-3 text-base font-bold leading-snug text-slate-900 dark:border-rose-400/20 dark:bg-rose-950/20 dark:text-slate-100">
                                "I <span class="font-black text-red-600 dark:text-red-300">was cooking</span> when the phone <span class="font-black text-red-600 dark:text-red-300">rang</span>."
                            </div>
                            <div class="rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-base font-bold leading-snug text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-100">
                                "She <span class="font-black text-red-600 dark:text-red-300">was studying</span> when the lights <span class="font-black text-red-600 dark:text-red-300">went</span> out."
                            </div>
                            <div class="rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-base font-bold leading-snug text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-100">
                                "We were playing when it started to rain."
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Simultaneous Actions (while):',
            'tone' => 'from-slate-500 to-violet-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-3">
                            <div class="rounded-2xl border border-violet-100 bg-violet-50/60 px-4 py-3 text-base font-bold leading-snug text-slate-900 dark:border-violet-400/20 dark:bg-violet-950/20 dark:text-slate-100">
                                "While I <span class="font-black text-indigo-600 dark:text-indigo-300">was reading</span>, she <span class="font-black text-violet-600 dark:text-violet-300">was watching</span> TV."
                            </div>
                            <div class="rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-base font-bold leading-snug text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-100">
                                "While Mom was cooking, Dad was cleaning."
                            </div>
                            <div class="rounded-2xl border border-slate-200 bg-white/90 px-4 py-3 text-base font-bold leading-snug text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-100">
                                "While they were talking, I was listening."
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