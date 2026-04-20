<?php
$content = [
    'page_title' => 'Grammar Focus',
    'title' => 'Grammar Focus',
    'subtitle' => 'Past simple (Actions)',
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl',
    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '<span class="underline decoration-2 underline-offset-4">What did he do?</span>',
            'title_plain' => true,
            'tone' => 'from-slate-500 to-gray-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="block space-y-2 text-2xl font-bold leading-tight sm:text-3xl">
                            <span class="block">&bull; stayed</span>
                            <span class="block">&bull; didn&rsquo;t sleep</span>
                            <span class="block">&bull; went</span>
                            <span class="block">&bull; stole</span>
                            <span class="block">&bull; met</span>
                        </span>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="underline decoration-2 underline-offset-4">How was his holiday?</span>',
            'title_plain' => true,
            'tone' => 'from-slate-500 to-gray-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="block space-y-2 text-2xl font-bold leading-tight sm:text-3xl">
                            <span class="block">&bull; It <span class="hl-red">was</span> wonderful</span>
                            <span class="block">&bull; It <span class="hl-red">was</span> scary</span>
                            <span class="block">&bull; The weather <span class="hl-red">was</span> terrible</span>
                            <span class="block">&bull; The waiters <span class="hl-red">were</span> unfriendly</span>
                        </span>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Negatives',
            'title_plain' => true,
            'tone' => 'from-rose-400 to-red-500',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="block space-y-3 text-2xl font-bold leading-tight sm:text-3xl">
                            <span class="block">&bull; I <span class="hl-red">didn&rsquo;t</span> sleep</span>
                            <span class="block">&bull; I <span class="hl-red">didn&rsquo;t</span> see the sun</span>
                        </span>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Questions',
            'title_plain' => true,
            'tone' => 'from-teal-500 to-cyan-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="block space-y-2 text-2xl font-bold leading-tight sm:text-3xl">
                            <span class="block">&bull; <span class="text-teal-700 dark:text-teal-300">Did</span> you have nice weather?</span>
                            <span class="block">&bull; <span class="hl-red">Was</span> the hotel room <span class="hl-red">nice</span>?</span>
                            <span class="block">&bull; <span class="text-teal-700 dark:text-teal-300">Did</span> you <span class="text-teal-700 dark:text-teal-300">go</span> shopping?</span>
                        </span>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="hl-red">Notice the following:</span>',
            'title_plain' => true,
            'tone' => 'from-slate-500 to-gray-600',
            'card_class' => 'md:col-span-2',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="mx-auto block w-fit space-y-2 text-2xl font-bold leading-tight sm:text-3xl">
                            <span class="block">&bull; <strong>Did</strong> &rarr; actions</span>
                            <span class="block">&bull; <strong>Was/Were</strong> &rarr; descriptions</span>
                        </span>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
