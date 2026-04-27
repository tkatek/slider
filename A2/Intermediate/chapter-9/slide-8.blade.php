<?php
$content = [

    'title' => 'Grammar',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Examples',
            'tone' => 'from-stone-500 to-stone-700',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="font-black italic text-slate-900 dark:text-white">I’m visiting</span> my friend tomorrow.',
                        '<span class="font-black italic text-slate-900 dark:text-white">They are coming</span> to our house on Saturday.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Remember!',
            'tone' => 'from-neutral-500 to-neutral-700',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'We can use the present continuous to talk about future arrangements — plans which you have organised.',
                        '<span class="font-black italic text-slate-900 dark:text-white">I’m going</span> to the cinema at the weekend.',
                        '<span class="font-black italic text-slate-900 dark:text-white">What are you doing</span> tonight?',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])