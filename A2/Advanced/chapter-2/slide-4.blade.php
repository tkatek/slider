<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Advanced/chapter-2/img/slide1.webp'),

    'cards' => [
        [
            'emoji' => '🤔',
            'label' => 'Question 1',
            'text'  => 'What is an unusual job?',
        ],
        [
            'emoji' => '💭',
            'label' => 'Question 2',
            'text'  => 'What is your dream job?',
        ],
        [
            'emoji' => '🧑‍🏭',
            'label' => 'Question 3',
            'text'  => 'Do you know any unusual jobs?',
        ],
        [
            'emoji' => '🐾',
            'label' => 'Question 4',
            'text'  => 'Have you heard of a pet food taster or a professional mourner?',
        ],
        [
            'emoji' => '⚖️',
            'label' => 'Question 5',
            'text'  => 'Which job is better: a normal job or an unusual job? Why?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])