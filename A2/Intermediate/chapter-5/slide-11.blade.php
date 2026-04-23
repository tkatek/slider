<?php
$content = [
    'page_title' => 'Main Rule',
    'title' => 'Main Rule',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-violet-500 to-purple-600',
            'sections' => [
                [
                    'heading' => '👉 We often use both together:',
                    'items' => [],
                ],
                [
                    'heading' => '⭐ Structure:',
                    'items' => [
                        '<span class="text-blue-600 dark:text-blue-300 font-black">Past Continuous</span> + <span class="text-orange-500 dark:text-orange-300 font-black">when</span> + <span class="text-emerald-600 dark:text-emerald-300 font-black">Past Simple</span>',
                    ],
                ],
                [
                    'heading' => '📖 Examples:',
                    'items' => [
                        'I <span class="text-blue-600 dark:text-blue-300 font-black">was washing</span> the dishes when the lights <span class="text-rose-600 dark:text-rose-300 font-black">went out</span>.',
                        'They <span class="text-blue-600 dark:text-blue-300 font-black">were watching</span> TV when the blackout <span class="text-rose-600 dark:text-rose-300 font-black">happened</span>.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
