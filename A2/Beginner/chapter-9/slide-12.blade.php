<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => "",
    'activity_title' => 'Read the sentences & match with the right picture',

    'pairs' => [
        [
            'id' => 'p1',
            'left' => [
                'type' => 'word',
                'text' => 'is a young man with glasses. He has dark skin.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Brain.webp'),
                'alt' => 'Person 2',
            ],
        ],
        [
            'id' => 'p2',
            'left' => [
                'type' => 'word',
                'text' => 'is a girl. She has long fair hair and brown eyes.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Karen.webp'),
                'alt' => 'Person 5',
            ],
        ],
        [
            'id' => 'p3',
            'left' => [
                'type' => 'word',
                'text' => 'is a bald man. He is a middle-aged man with dirty beard.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Ricardo.webp'),
                'alt' => 'Person 7',
            ],
        ],
        [
            'id' => 'p4',
            'left' => [
                'type' => 'word',
                'text' => 'is a teenager with short brown hair and brown eyes.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Clara.webp'),
                'alt' => 'Person 3',
            ],
        ],
        [
            'id' => 'p5',
            'left' => [
                'type' => 'word',
                'text' => 'is an old man. He is tall and medium-weight.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/David.webp'),
                'alt' => 'Person 4',
            ],
        ],
        [
            'id' => 'p6',
            'left' => [
                'type' => 'word',
                'text' => 'is a young woman. She has dark skin and long straight black hair.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Maria.webp'),
                'alt' => 'Person 6',
            ],
        ],
        [
            'id' => 'p7',
            'left' => [
                'type' => 'word',
                'text' => 'is a young man with long beard and moustache.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Ted.webp'),
                'alt' => 'Person 8',
            ],
        ],
        [
            'id' => 'p8',
            'left' => [
                'type' => 'word',
                'text' => 'is a school boy with glasses. He has short fair hair and blue eyes.',
            ],
            'right' => [
                'type' => 'image',
                'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Sam.webp'),
                'alt' => 'Person 1',
            ],
        ],
    ],

    'right_order' => ['p5', 'p2', 'p8', 'p4', 'p7', 'p1', 'p6', 'p3'],
];
?>

@include('slider.game.match-pairs', ['content' => $content])
