<?php
$content = [
    'page_title' => 'Past Simple (verb 2)',
    'title' => 'Past Simple (verb 2)',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-orange-400 to-orange-600',
            'sections' => [
                [
                    'heading' => '✅ Use:',
                    'items' => [
                        'To describe a finished action in the past',
                    ],
                ],
                [
                    'heading' => '📖 Examples:',
                    'items' => [
                        'The lights <span class="text-orange-600 dark:text-orange-300 font-black">went out</span>.',
                        'Burglars <span class="text-rose-600 dark:text-rose-300 font-black">broke into</span> the apartments.',
                    ],
                ],
                [
                    'heading' => '👉 These are completed actions',

                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
