<?php
$content = [
    'title'    => 'Practice 5',
    'subtitle' => 'Love it or hate it?!<br>Label the sports and activities.',
    'type'     => 'image',

    'categories' => [
        'Gymnastics' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/gymnastics.webp'),
            'items' => ['Gymnastics'],
        ],
        'Chess' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/chess.webp'),
            'items' => ['Chess'],
        ],
        'Weightlifting' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/weightlifting.webp'),
            'items' => ['Weightlifting'],
        ],
        'Horse Riding' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/horse-riding.webp'),
            'items' => ['Horse Riding'],
        ],
        'Ice Hockey' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/ice-hockey.webp'),
            'items' => ['Ice Hockey'],
        ],
        'Cards' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/cards.webp'),
            'items' => ['Cards'],
        ],
        'Ballroom Dancing' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/ballroom-dancing.webp'),
            'items' => ['Ballroom Dancing'],
        ],
        'Ballet' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/ballet.webp'),
            'items' => ['Ballet'],
        ],
        'Bowling' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/bowling.webp'),
            'items' => ['Bowling'],
        ],
        'Camping' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/camping.webp'),
            'items' => ['Camping'],
        ],
        'Ice Skating' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/ice-skating.webp'),
            'items' => ['Ice Skating'],
        ],
        'Table Tennis' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide15/table-tennis.webp'),
            'items' => ['Table Tennis'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])