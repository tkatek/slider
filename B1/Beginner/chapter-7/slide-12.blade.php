<?php

$content = [
    'title' => 'Practice 6',
    'subtitle' => "Drag and drop each keywoard next to it's definition",
    'pool_item_type' => 'image',
    'image_text_style' => 'overlay',

    'categories' => [
        'I wish it would be rainy and cool now.' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Beginner/chapter-7/img/slide12/sizzling-outside.webp'),
                    'text'  => 'It’s sizzling outside.',
                ],
            ],
        ],

        'If only I had more money and could go with them.' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Beginner/chapter-7/img/slide12/friends-holidays.webp'),
                    'text'  => 'My friends go for holidays.',
                ],
            ],
        ],

        'I wish I had dinner.' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Beginner/chapter-7/img/slide12/starving.webp'),
                    'text'  => 'I’m starving.',
                ],
            ],
        ],

        'If only I were stronger.' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Beginner/chapter-7/img/slide12/handball-team.webp'),
                    'text'  => 'I can’t join the handball team.',
                ],
            ],
        ],

        'I wish I could ride it.' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Beginner/chapter-7/img/slide12/ride-a-horse.webp'),
                    'text'  => 'I don’t know how to ride a horse.',
                ],
            ],
        ],

        "I wish I hadn't overslept." => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/B1/Beginner/chapter-7/img/slide12/late-for-class.webp'),
                    'text'  => 'I was late for class.',
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.drag-and-drop', ['content' => $content])