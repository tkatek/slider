<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Beginner/chapter11/img/slide4/Discu.webp'),

    'cards' => [
        [
            'emoji' => '🥗',
            'label' => 'Question 1',
            'text'  => 'Have you ever been on a healthy diet?',
        ],
        [
            'emoji' => '💧',
            'label' => 'Question 2',
            'text'  => 'What should you eat / drink more?',
        ],
        [
            'emoji' => '🍟',
            'label' => 'Question 3',
            'text'  => 'What should you eat / drink less?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])