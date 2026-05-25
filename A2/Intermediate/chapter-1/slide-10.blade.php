<?php
$content = [
    'title'    => 'Practice 3',
    'subtitle' => 'Match the picture with its related word',

    'questions' => [
        [
            'id'    => '1',
            'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/stick-out-your-tongue.webp'),
            'word'  => 'stick out your tongue',
        ],
        [
            'id'    => '2',
            'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/bump-noses.webp'),
            'word'  => 'bump noses',
        ],
        [
            'id'    => '3',
            'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/fist-bump.webp'),
            'word'  => 'fist bump',
        ],
        [
            'id'    => '4',
            'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/air-kiss.webp'),
            'word'  => 'air kiss',
        ],
        [
            'id'    => '5',
            'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/bow.webp'),
            'word'  => 'bow',
        ],
        [
            'id'    => '6',
            'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide6/shake-hands.webp'),
            'word'  => 'shake hands',
        ],
    ],
];
?>

@include('slider.game.match-picture-word', ['content' => $content])