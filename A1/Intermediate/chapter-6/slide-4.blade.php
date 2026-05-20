<?php

$content = [
    'title'    => 'Warm-up',
    'subtitle' => 'Emergency or non-Emergency?!',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [
        [
            'question' => 'A car accident.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/car-accident.webp'),
        ],
        [
            'question' => 'Falling off the stairs.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/falling-off-the-stairs.webp'),
        ],
        [
            'question' => 'A house on fire.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/house-on-fire.webp'),
        ],
        [
            'question' => 'Someone has a fever.',
            'answer'   => 'Not an emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/fever.webp'),
        ],
        [
            'question' => 'A missing cat.',
            'answer'   => 'Not an emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/missing-cat.webp'),
        ],
        [
            'question' => 'A lady who has a heart attack.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/heart-attack.webp'),
        ],
        [
            'question' => 'A lady giving birth.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/giving-birth.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])