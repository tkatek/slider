<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-5/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '🏖️',
            'label' => 'Question 1',
            'text'  => 'Do you enjoy going to the beach?',
        ],
        [
            'emoji' => '🌊',
            'label' => 'Question 2',
            'text'  => 'What do people usually do at the seaside?',
        ],
        [
            'emoji' => '🎢',
            'label' => 'Question 3',
            'text'  => 'What seaside activities are exciting?',
        ],
        [
            'emoji' => '🧘',
            'label' => 'Question 4',
            'text'  => 'Do you prefer relaxing or active vacations?',
        ],
        [
            'emoji' => '🏄',
            'label' => 'Question 5',
            'text'  => 'Have you ever tried water sports?',
        ],
        [
            'emoji' => '☀️',
            'label' => 'Question 6',
            'text'  => 'What is your favorite summer activity?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])