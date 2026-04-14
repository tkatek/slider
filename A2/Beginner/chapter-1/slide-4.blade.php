<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Beginner/chapter-1/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🌤️',
            'label' => 'Question 1',
            'text'  => 'What’s the weather like today?',
        ],
        [
            'emoji' => '☀️',
            'label' => 'Question 2',
            'text'  => 'What’s your favourite weather?',
        ],
        [
            'emoji' => '🧥',
            'label' => 'Question 3',
            'text'  => 'What do you do when it’s hot /cold?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])

