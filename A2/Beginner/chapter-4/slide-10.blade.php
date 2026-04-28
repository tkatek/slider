<?php
$content = [
    'page_title' => 'Regular vs Irregular Verbs',
    'title' => 'Regular vs Irregular Verbs',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Regular',
            'tone' => 'from-teal-500 to-cyan-600',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Play → Play<span class="hl-red">ed</span>',
                        'Watch → Watch<span class="hl-red">ed</span>',

                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Irregular',
            'tone' => 'from-rose-400 to-red-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Go → <span class="hl-red">Went</span>',
                        'Have → <span class="hl-red">Had</span>',
                        'See → <span class="hl-red">Saw</span>',
                    ],
                ],
            ],
        ],

    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
