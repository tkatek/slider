<?php

$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Past simple Tense',
            'tone' => 'from-violet-500 to-violet-800',
            'badge_class' => '',
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'bg-gradient-to-br from-white via-violet-50/70 to-fuchsia-50/50 dark:from-slate-900 dark:via-violet-950/25 dark:to-fuchsia-950/20',

            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl border border-violet-100 bg-white/90 px-4 py-4 shadow-sm ring-1 ring-violet-100/70 dark:border-violet-900/45 dark:bg-slate-950/50 dark:ring-violet-500/10">
                                <div class="mb-2 inline-flex rounded-full bg-violet-100 px-3 py-1 text-xs font-black text-violet-700 dark:bg-violet-950/60 dark:text-violet-200">Affirmative</div>
                                <div class="text-lg font-black leading-snug text-slate-900 dark:text-slate-50">I watch<span class="hl-red">ed</span> TV.</div>
                            </div>

                            <div class="rounded-2xl border border-fuchsia-100 bg-white/90 px-4 py-4 shadow-sm ring-1 ring-fuchsia-100/70 dark:border-fuchsia-900/45 dark:bg-slate-950/50 dark:ring-fuchsia-500/10">
                                <div class="mb-2 inline-flex rounded-full bg-fuchsia-100 px-3 py-1 text-xs font-black text-fuchsia-700 dark:bg-fuchsia-950/60 dark:text-fuchsia-200">Negative</div>
                                <div class="text-lg font-black leading-snug text-slate-900 dark:text-slate-50">I <span class="hl-red">didn’t</span> watch TV.</div>
                            </div>

                            <div class="rounded-2xl border border-indigo-100 bg-white/90 px-4 py-4 shadow-sm ring-1 ring-indigo-100/70 dark:border-indigo-900/45 dark:bg-slate-950/50 dark:ring-indigo-500/10">
                                <div class="mb-2 inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-black text-indigo-700 dark:bg-indigo-950/60 dark:text-indigo-200">Questions</div>
                                <div class="text-lg font-black leading-snug text-slate-900 dark:text-slate-50"><span class="hl-red">Did</span> you watch TV?</div>
                            </div>

                            <div class="rounded-2xl border border-purple-100 bg-white/90 px-4 py-4 shadow-sm ring-1 ring-purple-100/70 dark:border-purple-900/45 dark:bg-slate-950/50 dark:ring-purple-500/10">
                                <div class="mb-2 inline-flex rounded-full bg-purple-100 px-3 py-1 text-xs font-black text-purple-700 dark:bg-purple-950/60 dark:text-purple-200">Short answers</div>
                                <div class="text-lg font-black leading-snug text-slate-900 dark:text-slate-50">Yes, I <span class="hl-red">did</span> / No, I <span class="hl-red">didn’t</span>.</div>
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