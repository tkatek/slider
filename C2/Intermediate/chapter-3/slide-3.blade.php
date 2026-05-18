<?php

$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Intermediate/chapter-3/img/slide1.webp'),

    'cards' => [
        [
            'emoji' => '🏦',
            'label' => 'Question 1',
            'text'  => 'Have you ever opened a bank account abroad?',
        ],
        [
            'emoji' => '❓',
            'label' => 'Question 2',
            'text'  => 'What questions would you ask at a bank?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])