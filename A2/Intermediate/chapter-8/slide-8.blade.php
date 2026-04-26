<?php
$content = [
    'page_title' => '',
    'title' => 'Grammar',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-orange-400 to-amber-500',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'We use the <span class="text-orange-600 dark:text-orange-300 font-black">First Conditional</span> to talk about real or possible situations in the future.',
                    ],
                ],
                [
                    'heading' => '<span class="text-orange-600 dark:text-orange-300 font-black">Structure:</span>',
                    'items' => [
                        '<span class="text-orange-500 dark:text-orange-300 font-black">If + Present Simple, will + base verb</span>',
                    ],
                ],
                [
                    'heading' => '',
                    'items' => [
                        'The condition goes after <span class="text-orange-600 dark:text-orange-300 font-black">if</span> (in the present), and the result uses <span class="text-orange-600 dark:text-orange-300 font-black">will</span>.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
