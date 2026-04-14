<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => '',
    'play_label' => 'Play example',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => 'badge-positive',
            'intro' => '',
            'table_variant' => 'simple',
            'table_size' => 'xlarge',
            'mobile_cards' => true,
            'table_headers' => ['Quantifier', 'Used With', 'Meaning', 'Example'],
            'table_rows' => [
                [
                    'Many',
                    'Countable plural nouns',
                    'a large number',
                    [
                        'text' => '"There are <span class="text-red-500 font-black">many</span> <span class="text-slate-900 dark:text-slate-50 font-black">restaurants</span> in my neighbourhood."',
                        'speech' => 'There are many restaurants in my neighbourhood.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide10/1.mp3'),
                    ],
                ],
                [
                    'Much',
                    'Uncountable nouns',
                    'a large amount',
                    [
                        'text' => '"There <span class="text-red-500 font-black">isn\'t much</span> <span class="text-slate-900 dark:text-slate-50 font-black">traffic</span> in my area."',
                        'speech' => 'There isn\'t much traffic in my area.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide10/2.mp3'),
                    ],
                ],
                [
                    'A lot of',
                    'Countable + uncountable nouns',
                    'a large number/amount',
                    [
                        'text' => '"There are <span class="text-red-500 font-black">a lot of</span> <span class="text-slate-900 dark:text-slate-50 font-black">shops</span> here. / There is <span class="text-red-500 font-black">a lot of</span> <span class="text-slate-900 dark:text-slate-50 font-black">traffic</span>."',
                        'speech' => 'There are a lot of shops here. There is a lot of traffic.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide10/3.mp3'),
                    ],
                ],
                [
                    'A few',
                    'Countable plural nouns',
                    'some, but not many',
                    [
                        'text' => '"There are a <span class="text-red-500 font-black">few</span> <span class="text-slate-900 dark:text-slate-50 font-black">parks</span> near my house."',
                        'speech' => 'There are a few parks near my house.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide10/4.mp3'),
                    ],
                ],
                [
                    'A little',
                    'Uncountable nouns',
                    'some, but not much',
                    [
                        'text' => '"There is a <span class="text-red-500 font-black">little</span> <span class="text-slate-900 dark:text-slate-50 font-black">noise</span> at night."',
                        'speech' => 'There is a little noise at night.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide10/5.mp3'),
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
