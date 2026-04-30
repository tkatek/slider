<?php
$content = [
    'title'    => 'Practice 5',
    'subtitle' => 'Match the pictures with the words.',

    'questions' => [
        [
            'id'    => '1',
            'image' => materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Carrot.webp'),
            'word'  => 'carrot',
        ],
        [
            'id'    => '2',
            'image' => materialAsset('slider/A2/Beginner/chapter-12/img/slide4/Potatoes.webp'),
            'word'  => 'potato',
        ],
        [
            'id'    => '3',
            'image' => materialAsset('slider/A2/Beginner/chapter-12/img/slide15/onion.webp'),
            'word'  => 'onion',
        ],
        [
            'id'    => '4',
            'image' => materialAsset('slider/A2/Beginner/chapter-12/img/slide15/pancake.webp'),
            'word'  => 'pancake',
        ],
        [
            'id'    => '5',
            'image' => materialAsset('slider/A2/Beginner/chapter-12/img/slide15/tomato.webp'),
            'word'  => 'tomato',
        ],
        [
            'id'    => '6',
            'image' => materialAsset('slider/A2/Beginner/chapter-12/img/slide15/vegetables.webp'),
            'word'  => 'vegetables',
        ],
    ],
];
?>

@include('slider.game.match-picture-word', ['content' => $content])