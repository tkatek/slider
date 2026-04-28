<?php
$content = [
    'page_title'           => 'Practice 4',
    'title'                => 'Practice 4',
    'subtitle'             => 'Match the pictures with the description',
    'type'                 => 'image',
    'items_per_line'       => 4,
    'items_per_line_mobile'=> 2,

    'categories' => [
        "He's bald" => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/bald.webp'),
            'items' => ["He's bald"],
        ],
        'Her hair is curly and red' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/curly-red-hair.webp'),
            'items' => ['Her hair is curly and red'],
        ],
        "She's medium height and slim" => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/medium-height-slim.webp'),
            'items' => ["She's medium height and slim"],
        ],
        'Her eyes are big and blue' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/big-blue-eyes.webp'),
            'items' => ['Her eyes are big and blue'],
        ],
        "He's very tall and slim" => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/tall-slim-man.webp'),
            'items' => ["He's very tall and slim"],
        ],
        'He has a beard and a moustache' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/beard-moustache.webp'),
            'items' => ['He has a beard and a moustache'],
        ],
        'Her hair is short and blonde' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/short-blonde-hair.webp'),
            'items' => ['Her hair is short and blonde'],
        ],
        "He's short and a little overweight" => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/short-overweight-man.webp'),
            'items' => ["He's short and a little overweight"],
        ],
        'Her hair is straight and long' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide12/straight-long-hair.webp'),
            'items' => ['Her hair is straight and long'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])