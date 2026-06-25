<?php

$content = [
    'page_title' => 'Practice 1:  Warm-up',
    'title'      => 'Practice 1:  Warm-up',
    'subtitle'   => 'Look at the pictures & make a guess ',
    'card_label' => '',

    'card_type'  => 'image',

    'cards' => [
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide4/1.webp'),
            'sentence' => "What's happening? Why are they here? How are they feeling?",
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide4/2.webp'),
            'sentence' => 'What can you guess about this woman?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide4/3.webp'),
            'sentence' => 'What is their relationship? How are they feeling?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide4/4.webp'),
            'sentence' => 'What can you say about this man? How is he feeling?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide4/5.webp'),
            'sentence' => 'Where are these people? Why are they doing this activity?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide4/6.webp'),
            'sentence' => 'What can you guess about this man?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])