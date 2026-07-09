<?php

$content = [
    'title'      => "Discussion",
    'subtitle'   => 'Make a guess',

    'items' => [
        [
            'question' => 'Why was princess Diane killed?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/1.webp'),
        ],
        [
            'question' => 'Why does my tummy hurt?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/2.webp'),
        ],
        [
            'question' => "I can't find my keys, what happened to them?",
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/3.webp'),
        ],
        [
            'question' => 'Why did I fail my English test?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/4.webp'),
        ],
        [
            'question' => "My sister isn't answering my texts, why?",
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/5.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])