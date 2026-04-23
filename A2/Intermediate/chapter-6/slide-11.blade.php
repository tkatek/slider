<?php
$content = [
    'page_title' => 'Time Expressions',
    'title' => 'Time Expressions',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Asking Questions:',
            'tone' => 'from-zinc-500 to-stone-700',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '"What <span class="text-indigo-500 dark:text-indigo-300 font-black">happened</span> while you <span class="text-violet-600 dark:text-violet-300 font-black">were sleeping</span>?"',
                        '"What happened while you were at school?"',
                        '"What happened while I was away?"',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Interrupted Actions (when):',
            'tone' => 'from-zinc-400 to-stone-500',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '"I <span class="text-red-500 dark:text-red-300 font-black">was cooking</span> when the phone <span class="text-red-500 dark:text-red-300 font-black">rang</span>."',
                        '"She <span class="text-red-500 dark:text-red-300 font-black">was studying</span> when the lights <span class="text-red-500 dark:text-red-300 font-black">went</span> out."',
                        '"We were playing when it started to rain."',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Simultaneous Actions (while):',
            'tone' => 'from-zinc-500 to-stone-700',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '"While I <span class="text-indigo-500 dark:text-indigo-300 font-black">was reading</span>, she <span class="text-violet-600 dark:text-violet-300 font-black">was watching</span> TV."',
                        '"While Mom was cooking, Dad was cleaning."',
                        '"While they were talking, I was listening."',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
