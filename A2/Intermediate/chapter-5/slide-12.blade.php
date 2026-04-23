<?php
$content = [
    'page_title' => 'Time Expressions',
    'title' => 'Time Expressions',
    'subtitle' => 'Learn how to connect events in your stories using these important time words',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '1️⃣ While',
            'tone' => 'from-zinc-500 to-stone-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Use "while" for ongoing background actions. It shows two things happening at the same time.',
                        'Example: While I was cooking...',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '2️⃣ When',
            'tone' => 'from-stone-500 to-zinc-700',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Use "when" for interrupting events. It introduces a new action that breaks into another.',
                        'Example: When the phone rang...',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '3️⃣ Suddenly',
            'tone' => 'from-neutral-500 to-stone-700',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Use "suddenly" for unexpected moments that surprise us.',
                        'Example: Suddenly, the lights went out!',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
