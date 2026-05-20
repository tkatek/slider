<?php

$content = [
    'title'      => "Now can you say what's the problem?",
    'subtitle'   => '',


    'items' => [
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The window is broken.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/broken.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The wall is cracked.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/cracked.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The sink drain is clogged.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/clogged.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The window screen is torn.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/torn.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The walkway is slippery.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/slippery.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The air conditioner is very loud.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide10/loud.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])
