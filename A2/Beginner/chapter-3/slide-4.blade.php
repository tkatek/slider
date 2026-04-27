<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Complete with the right  adjective(s) that describe the weather in the pictures from the list provided:<br>(sunny-frosty-icy-foggy-cloudy-windy-rainy-stormy-snowy)',


    'grid_class'         => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
    'image_aspect_ratio' => '3 / 2',

    'items' => [
        [
            'number' => 1,
            'image'  => materialAsset('slider/A2/Beginner/chapter-3/img/slide4/thundery-cloudy.webp'),
            'parts'  => [
                ['text' => "It's thundery and C"],
                ['answer' => 'LOUDY'],
                ['text' => '.'],
            ],
        ],
        [
            'number' => 2,
            'image'  => materialAsset('slider/A2/Beginner/chapter-3/img/slide4/snowy-frosty.webp'),
            'parts'  => [
                ['text' => "It's S"],
                ['answer' => 'NOWY'],
                ['text' => ' and F'],
                ['answer' => 'ROSTY'],
                ['text' => '.'],
            ],
        ],
        [
            'number' => 3,
            'image'  => materialAsset('slider/A2/Beginner/chapter-3/img/slide4/foggy-icy.webp'),
            'parts'  => [
                ['text' => "It's F"],
                ['answer' => 'OGGY'],
                ['text' => ' and I'],
                ['answer' => 'CY'],
                ['text' => '.'],
            ],
        ],
        [
            'number' => 4,
            'image'  => materialAsset('slider/A2/Beginner/chapter-3/img/slide4/stormy-windy.webp'),
            'parts'  => [
                ['text' => "It's S"],
                ['answer' => 'TORMY'],
                ['text' => ' and W'],
                ['answer' => 'INDY'],
                ['text' => '.'],
            ],
        ],
        [
            'number' => 5,
            'image'  => materialAsset('slider/A2/Beginner/chapter-3/img/slide4/hot-sunny.webp'),
            'parts'  => [
                ['text' => "It's hot and S"],
                ['answer' => 'UNNY'],
                ['text' => '.'],
            ],
        ],
        [
            'number' => 6,
            'image'  => materialAsset('slider/A2/Beginner/chapter-3/img/slide4/cold-rainy.webp'),
            'parts'  => [
                ['text' => "It's cold and R"],
                ['answer' => 'AINY'],
                ['text' => '.'],
            ],
        ],
    ],
];
?>
@include('slider.game.image-missing-words', ['content' => $content])
