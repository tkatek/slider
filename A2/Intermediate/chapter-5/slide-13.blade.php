<?php
$content = [
    'page_title' => 'Forming Questions',
    'title' => 'Forming Questions (Past Continuous)',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-zinc-500 to-stone-600',
            'sections' => [
                [
                    'heading' => '<span class="text-blue-600 dark:text-blue-300 font-black">✅ Yes / No Questions</span>',
                    'items' => [],
                ],
                [
                    'heading' => '⭐ Structure:',
                    'items' => [
                        '👉 <span class="text-blue-600 dark:text-blue-300 font-black">Was / Were</span> + <span class="text-emerald-600 dark:text-emerald-300 font-black">subject</span> + <span class="text-rose-600 dark:text-rose-300 font-black">verb-ing</span>?',
                    ],
                ],
                [
                    'heading' => '📖 Examples:',
                    'items' => [
                        '<span class="text-blue-600 dark:text-blue-300 font-black">Were</span> you <span class="text-rose-600 dark:text-rose-300 font-black">sleeping</span>?',
                        '<span class="text-blue-600 dark:text-blue-300 font-black">Was</span> she <span class="text-rose-600 dark:text-rose-300 font-black">watching</span> TV?',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
