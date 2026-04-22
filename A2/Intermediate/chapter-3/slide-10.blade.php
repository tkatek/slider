<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-sky-500 to-blue-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'In the U.S., <span class="text-blue-600 dark:text-blue-300 font-black">if a black cat</span> <span class="text-sky-700 dark:text-sky-300 font-black underline decoration-2 underline-offset-4">walks</span> <span class="text-blue-600 dark:text-blue-300 font-black">in front of you</span>, <span class="text-orange-500 dark:text-orange-300 font-black">it is bad luck</span>.',
                        'In Thailand, <span class="text-blue-600 dark:text-blue-300 font-black">if you</span> <span class="text-sky-700 dark:text-sky-300 font-black underline decoration-2 underline-offset-4">dream</span> <span class="text-blue-600 dark:text-blue-300 font-black">about a snake</span>, <span class="text-orange-500 dark:text-orange-300 font-black">it means you will meet your future husband or wife</span>.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-orange-400 to-orange-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Some people <span class="text-rose-500 dark:text-rose-300 font-black">believe that</span> a horseshoe brings good luck.',
                        'Some people <span class="text-fuchsia-600 dark:text-fuchsia-300 font-black">think it\'s</span> lucky <span class="text-orange-500 dark:text-orange-300 font-black">to</span> carry a rabbit\'s foot with you.',
                        'A black cat <span class="text-emerald-600 dark:text-emerald-300 font-black">can be</span> lucky or unlucky.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
