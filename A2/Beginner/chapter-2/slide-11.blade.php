<?php
$content = [

    'title' => 'New Language 2',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Comparatives',
            'tone' => 'from-slate-400 to-slate-600',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Summer is hotter <span class="text-red-500">than</span> spring',
                        'Winter is colder <span class="text-red-500">than</span> autumn',
                    ],
                ],
                [
                    'heading' => '👉 Form:',
                    'items' => [
                        '“short adjective + <span class="hl-gold">-er</span> + <span class="text-red-500">than</span>”',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Superlatives',
            'tone' => 'from-gray-400 to-zinc-600',

            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Summer is <span class="hl-gold">the</span> hott<span class="text-red-500">est</span> season',
                        'Winter is <span class="hl-gold">the</span> cold<span class="text-red-500">est</span> season',
                    ],
                ],
                [
                    'heading' => '👉 Form:',
                    'items' => [
                        '<span class="text-red-500">the</span> + adjective + <span class="hl-gold">-est</span>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
