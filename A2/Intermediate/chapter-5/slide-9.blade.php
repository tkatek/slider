<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Past Continuous (was / were + verb-ing)',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-sky-500 to-blue-600',
            'sections' => [
                [
                    'heading' => '✅ Use:',
                    'items' => [
                        'To describe an action in progress in the past',
                    ],
                ],
                [
                    'heading' => '📌 Form:',
                    'items' => [
                        'I / he / she -> was + verb-ing',
                        'You / we / they -> were + verb-ing',
                    ],
                ],
                [
                    'heading' => '📖 Examples:',
                    'items' => [
                        'I <span class="text-blue-600 dark:text-blue-300 font-black">was washing</span> the dishes.',
                        'They <span class="text-emerald-600 dark:text-emerald-300 font-black">were watching</span> TV.',
                    ],
                ],
                [
                    'heading' => '👉 These actions were happening at that time

',

                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
