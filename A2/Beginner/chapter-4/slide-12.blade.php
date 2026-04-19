<?php
$content = [
    'page_title' => 'Regular verbs / Irregular Verbs',
    'title' => 'Regular verbs / Irregular Verbs',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'table',
            'title' => 'Regular verbs',
            'title_plain' => true,
            'tone' => 'from-teal-500 to-cyan-600',
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
            'tone' => 'from-rose-400 to-red-500',
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
            'tone' => 'from-slate-400 to-slate-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Most <span class="hl-red">regular verbs</span> just add <span class="hl-red">-ed</span>.',
                        'Example: play → play<span class="hl-red">ed</span>, watch → watch<span class="hl-red">ed</span>.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
