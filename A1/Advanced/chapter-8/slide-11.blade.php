<?php
$content = [
    'page_title' => 'Quick Comparison',
    'title' => 'Quick Comparison',
    'subtitle' => 'Countable and uncountable nouns',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Countable Nouns',
            'tone' => 'from-blue-400 to-indigo-500',
            'card_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">many</span> restaurants',
                        '<span class="hl-gold">a lot of</span> shops',
                        '<span class="hl-gold">a few</span> parks',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Uncountable Nouns',
            'tone' => 'from-purple-400 to-violet-500',
            'card_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">much</span> traffic',
                        '<span class="hl-gold">a lot of</span> noise',
                        '<span class="hl-gold">a little</span> noise',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
