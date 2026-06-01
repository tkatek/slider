<?php

$content = [
    'page_title'  => 'Practice 6',
    'title'       => 'Practice 6',
    'subtitle'    => 'Could you do me a favour?!',
    'instruction' => 'Look at the pictures & make polite requests',

    'items' => [
        [
            'question' => 'Look after your dog or cat',
            'image'    => materialAsset('slider/B1/Beginner/chapter-1/img/slide15/pets.webp'),
        ],
        [
            'question' => 'Lend you some money',
            'image'    => materialAsset('slider/B1/Beginner/chapter-1/img/slide15/money.webp'),
        ],
        [
            'question' => 'Give you a lift to the city centre',
            'image'    => materialAsset('slider/B1/Beginner/chapter-1/img/slide15/lift.webp'),
        ],
        [
            'question' => 'Help you to find present for the best friend',
            'image'    => materialAsset('slider/B1/Beginner/chapter-1/img/slide15/present.webp'),
        ],
        [
            'question' => 'Look after your children',
            'image'    => materialAsset('slider/B1/Beginner/chapter-1/img/slide15/children.webp'),
        ],
        [
            'question' => 'Help you with a problem',
            'image'    => materialAsset('slider/B1/Beginner/chapter-1/img/slide15/problem.webp'),
        ],
    ],
];

?>

@include('slider.game.warming-up', ['content' => $content])