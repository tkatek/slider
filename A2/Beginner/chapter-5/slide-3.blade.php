<?php
$content = [
    'page_title'    => 'Warm-up: Practice 1',
    'title'         => 'Warm-up: Practice 1',
    'subtitle'      => 'Match the verb with the picture',
    'type'          => 'image',
    'items_per_line' => 5,
    'items_per_line_mobile' => 2,

    'categories' => [
        'read a book' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/a-book.webp'),
            'items' => ['Read'],
        ],
        'cook a meal' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/a-meal.webp'),
            'items' => ['Cook'],
        ],
        'eat out' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/out.webp'),
            'items' => ['Eat'],
        ],
        'go shopping' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/shopping.webp'),
            'items' => ['Go'],
        ],
        'stay in bed' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/in-bed.webp'),
            'items' => ['Stay'],
        ],
        'go to the park' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/the-park.webp'),
            'items' => ['go to'],
        ],
        'clean the house' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/the-house.webp'),
            'items' => ['Clean'],
        ],
        'do exercises' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/exercises.webp'),
            'items' => ['Do'],
        ],
        'watch a film' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/a-film.webp'),
            'items' => ['Watch'],
        ],
        'meet friends' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-5/img/slide3/friends.webp'),
            'items' => ['Meet '],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])