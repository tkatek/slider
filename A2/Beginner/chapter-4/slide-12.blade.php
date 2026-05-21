<?php

$content = [
    'page_title' => 'Regular verbs / Irregular Verbs',
    'title' => 'Regular verbs / Irregular Verbs',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'table',
            'title' => 'Regular verbs',
            'title_plain' => true,
            'tone' => 'from-violet-500 to-violet-800',
            'mobile_cards' => true,
            'card_class' => 'bg-gradient-to-br from-white via-violet-50/70 to-fuchsia-50/50 dark:from-slate-900 dark:via-violet-950/25 dark:to-fuchsia-950/20 [&_table]:table-fixed [&_th]:w-1/2 [&_td]:w-1/2',
            'table_headers' => ['Base Verb', 'Past Simple'],
            'table_rows' => [
                ['play', 'played'],
                ['watch', 'watched'],
                ['visit', 'visited'],
                ['clean', 'cleaned'],
                ['cook', 'cooked'],
                ['walk', 'walked'],
                ['talk', 'talked'],
                ['help', 'helped'],
                ['work', 'worked'],
                ['study', 'studied'],
                ['travel', 'traveled'],
                ['open', 'opened'],
            ],
        ],
        [
            'type' => 'table',
            'title' => 'Irregular Verbs (must memorize)',
            'title_plain' => true,
            'tone' => 'from-indigo-500 to-purple-700',
            'mobile_cards' => true,
            'card_class' => 'bg-gradient-to-br from-white via-indigo-50/70 to-purple-50/50 dark:from-slate-900 dark:via-indigo-950/25 dark:to-purple-950/20 [&_table]:table-fixed [&_th]:w-1/2 [&_td]:w-1/2',
            'table_headers' => ['Base Verb', 'Past Simple'],
            'table_rows' => [
                ['go', 'went'],
                ['buy', 'bought'],
                ['have', 'had'],
                ['do', 'did'],
                ['see', 'saw'],
                ['eat', 'ate'],
                ['make', 'made'],
                ['take', 'took'],
                ['come', 'came'],
                ['give', 'gave'],
                ['get', 'got'],
                ['win', 'won'],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Notice',
            'tone' => 'from-violet-500 to-violet-800',
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'md:col-span-2 bg-gradient-to-br from-white via-violet-50/70 to-fuchsia-50/50 dark:from-slate-900 dark:via-violet-950/25 dark:to-fuchsia-950/20',

            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl border border-violet-100 bg-white/90 px-4 py-4 shadow-sm ring-1 ring-violet-100/70 dark:border-violet-900/45 dark:bg-slate-950/50 dark:ring-violet-500/10">
                                <div class="text-base font-black leading-snug text-slate-900 dark:text-slate-50">Most <span class="hl-red">regular verbs</span> just add <span class="hl-red">-ed</span>.</div>
                            </div>

                            <div class="rounded-2xl border border-fuchsia-100 bg-white/90 px-4 py-4 shadow-sm ring-1 ring-fuchsia-100/70 dark:border-fuchsia-900/45 dark:bg-slate-950/50 dark:ring-fuchsia-500/10">
                                <div class="text-base font-black leading-snug text-slate-900 dark:text-slate-50">Example: play → play<span class="hl-red">ed</span>, watch → watch<span class="hl-red">ed</span>.</div>
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