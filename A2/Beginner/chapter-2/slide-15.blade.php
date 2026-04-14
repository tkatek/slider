<?php
$content = [

    'title' => 'New Language 3',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '❌ Negative Sentences',
            'tone' => 'from-yellow-400 to-red-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'We use do not (<span class="hl-gold">don’t</span>) to make negatives.',
                    ],
                ],
                [
                    'heading' => '👉 Structure:',
                    'items' => [
                        'I / You / We / They + do not (don’t) + verb',
                    ],
                ],
                [
                    'heading' => 'Examples:',
                    'items' => [
                        'I <span class="hl-gold">don’t swim</span> in winter ❄️',
                        'We <span class="hl-gold">don’t play</span> outside in winter',
                        'They <span class="hl-gold">don’t go</span> to the beach in autumn 🍁',
                        'I <span class="hl-gold">don’t like</span> cold weather',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '❌ Negative Sentences',
            'tone' => 'from-yellow-400 to-amber-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '👉 Use does not (<span class="hl-gold">doesn’t</span>)',
                    'items' => [],
                ],
                [
                    'heading' => 'Structure:',
                    'items' => [
                        'He / She / It + does not (doesn’t) + verb',
                    ],
                ],
                [
                    'heading' => 'Examples:',
                    'items' => [
                        'He <span class="hl-gold">doesn’t swim</span> in winter ❄️',
                        'She <span class="hl-gold">doesn’t like</span> cold weather',
                        'It <span class="hl-gold">doesn’t rain</span> in summer',
                        'He <span class="hl-gold">doesn’t play</span> outside in winter',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
