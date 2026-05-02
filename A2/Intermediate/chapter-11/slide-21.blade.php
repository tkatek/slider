<?php
$content = [
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Can you write the missing letters in these adjectives?!',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [
        [
            'number'      => 1,
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/sad.webp'),
            'prefix'      => 'S',
            'suffix'      => 'D',
            'answer'      => 'A',
            'placeholder' => '',
        ],
        [
            'number'      => 2,
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/angry.webp'),
            'prefix'      => '',
            'suffix'      => 'RY',
            'answer'      => 'ANG',
            'placeholder' => '',
        ],
        [
            'number'      => 3,
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/excited.webp'),
            'prefix'      => 'E',
            'suffix'      => 'CITED',
            'answer'      => 'X',
            'placeholder' => '',
        ],
        [
            'number'      => 4,
            'image'   => materialAsset('slider/A2/Intermediate/chapter-11/img/slide9/worried.webp'),
            'prefix'      => 'N',
            'suffix'      => 'RVOUS',
            'answer'      => 'E',
            'placeholder' => '',
        ],
    ],
];
?>
@include('slider.game.image-missing-words', ['content' => $content])