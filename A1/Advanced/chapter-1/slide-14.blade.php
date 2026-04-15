<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'There is / There are',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '<span class="font-black">Point 1:</span> <span class="font-medium">Use </span><span class="font-black">there is</span><span class="font-medium"> with </span><span class="font-black">singular countable nouns</span><span class="font-medium">.</span>',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'There is a department store in town.',
                        'There is a big mall in this city.',
                        'There is not a place to sit.',
                        'There is no park near my house.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="font-black">Point 2:</span> <span class="font-medium">Use </span><span class="font-black">there are</span><span class="font-medium"> with </span><span class="font-black">plural countable nouns</span><span class="font-medium">.</span>',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'There are two cars parked outside my house.',
                        'There are some books on the table.',
                        'There are not many tall buildings in my town.',
                        'There are no new students this year.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="font-black">Point 3:</span> <span class="font-medium">Use </span><span class="font-black">there is</span><span class="font-medium"> with </span><span class="font-black">non-countable nouns</span><span class="font-medium">.</span>',
            'tone' => 'from-cyan-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'There is crime in the city.',
                        'There is money on the table.',
                        'There is not any cheese in the fridge.',
                        'There is no ice cream in the freezer.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
