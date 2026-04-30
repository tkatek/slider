<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen & answer these questions',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Beginner/chapter-12/audios/slide13/dialogue.mpeg'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Todd: So Ben, you look like a healthy person. Do you eat lots of fruits and vegetables?',
        'Ben: I do eat lots of fruits and vegetables, especially fruit. I love to eat fruit because it’s so sweet.',
        'Todd: Yeah? What fruits do you like?',
        'Ben: I love bananas because they’re so healthy for you. And so usually, in the morning for breakfast, I’ll have a banana. I also love blueberries. Blueberries are my favorite fruit. But sometimes, they’re expensive so I can’t often eat blueberries.',
        'Todd: Oh, I agree. Blueberries are so good. I love blueberries in oatmeal.',
        'Ben: That’s a good idea. I love to have blueberries in muffins.',
        'Todd: Oh, that’s nice. Well, you bake. Do you bake blueberry muffins?',
        'Ben: I do bake blueberry muffins, and also blueberry bread, blueberry pancakes, many blueberry things.',
        'Todd: Wow. That’s great. So are there any fruits you don’t like?',
        'Ben: I don’t like kiwi actually because the flavor is okay but the fruit is too soft. So usually, I don’t want to eat kiwi.',
        'Todd: Oh well, I love kiwi. I love kiwi and bananas. It’s very good.',
        'Ben: Hmm, sounds okay but maybe I’ll just have the banana.',
    ],

    'questions' => [
        [
            'prompt'  => 'Who eats blueberries with oatmeal?',
            'correct' => 'Todd',
            'options' => [
                'Todd',
                'Ben',
            ],
        ],
        [
            'prompt'  => 'Ben puts blueberries in ........',
            'correct' => ['Muffins', 'Pancakes'],
            'options' => [
                'Muffins',
                'Pancakes',
                'Smoothies',
            ],
        ],
        [
            'prompt'  => 'Ben does not like ........',
            'correct' => 'Kiwi',
            'options' => [
                'Oranges',
                'Pineapple',
                'Kiwi',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])