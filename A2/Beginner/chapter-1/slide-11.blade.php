<?php
$content = [

    'title' => 'Grammar',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Language Focus',
            'tone' => 'from-orange-500 to-red-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">Q:</span> What’s the weather like?',
                        '<span class="hl-gold">A:</span> It’s sunny.',
                        '<span class="hl-gold">A:</span> It’s windy and cold.',
                    ],
                ],
                [
                    'heading' => 'Yes / No',
                    'items' => [
                        'Is it cold in winter?',
                        'Yes, it is. / No, it isn’t.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Grammar Box',
            'tone' => 'from-yellow-400 to-amber-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => 'Structure',
                    'items' => [
                        '<span class="hl-gold">Q:</span> What’s the weather like?',
                        '<span class="hl-gold">A:</span> It’s + adjective.',
                        '<span class="hl-gold">A:</span> It’s + adjective and adjective.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
