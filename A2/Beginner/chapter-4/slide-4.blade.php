<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Beginner/chapter-4/img/slide1.webp'),

    'cards' => [
        [
            'emoji' => '⏰',
            'label' => 'Question 1',
            'text'  => 'What are your favourite free-time activities?',
        ],
        [
            'emoji' => '🤔',
            'label' => 'Question 2',
            'text'  => 'Are there any activities that you don’t like?',
        ],
        [
            'emoji' => '❓',
            'label' => 'Question 3',
            'text'  => 'Which ones that you don’t like?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
