<?php
$content = [
    'page_title' => 'Practice',
    'title' => 'Practice 3',
    'subtitle' => 'Match the picture with its related word',
    'activity_title' => 'Directions: Match the picture with its related word.',
    'left_label' => 'Pictures',
    'right_label' => 'Words',

    'pairs' => [
        [
            'id' => 'stick-out-your-tongue',
            'left' => [
                'type' => 'image',
                'src' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/stick-out-your-tongue.webp'),
                'alt' => 'stick out your tongue',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'stick out your tongue',
            ],
        ],
        [
            'id' => 'bump-noses',
            'left' => [
                'type' => 'image',
                'src' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/bump-noses.webp'),
                'alt' => 'bump noses',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'bump noses',
            ],
        ],
        [
            'id' => 'fist-bump',
            'left' => [
                'type' => 'image',
                'src' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/fist-bump.webp'),
                'alt' => 'fist bump',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'fist bump',
            ],
        ],
        [
            'id' => 'air-kiss',
            'left' => [
                'type' => 'image',
                'src' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/air-kiss.webp'),
                'alt' => 'air kiss',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'air kiss',
            ],
        ],
        [
            'id' => 'bow',
            'left' => [
                'type' => 'image',
                'src' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/bow.webp'),
                'alt' => 'bow',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'bow',
            ],
        ],
        [
            'id' => 'shake-hands',
            'left' => [
                'type' => 'image',
                'src' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/shake-hands.webp'),
                'alt' => 'shake hands',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'shake hands',
            ],
        ],
    ],

    'right_order' => ['air-kiss', 'shake-hands', 'fist-bump', 'stick-out-your-tongue', 'bow', 'bump-noses'],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])
