<?php

$content = [
    'title'      => "Discussion",
    'subtitle'   => 'Make a guess',

    'items' => [
        [
            'question' => 'Why?',
            'answer'   => 'Why was princess Diane killed?',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/1.webp'),
        ],
        [
            'question' => 'Why?',
            'answer'   => 'Why does my tummy hurt?',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/2.webp'),
        ],
        [
            'question' => 'What happened?',
            'answer'   => "I can't find my keys, what happened to them?",
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/3.webp'),
        ],
        [
            'question' => 'Why?',
            'answer'   => 'Why did I fail my English test?',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/4.webp'),
        ],
        [
            'question' => 'Why?',
            'answer'   => "My sister isn't answering my texts, why?",
            'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide5/5.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])