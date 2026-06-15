<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-6/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🏠',
            'label' => 'Question 1',
            'text'  => 'Do you prefer indoor or outdoor activities? Why?',
        ],
        [
            'emoji' => '🌳',
            'label' => 'Question 2',
            'text'  => 'What outdoor activities are popular in your country?',
        ],
        [
            'emoji' => '🌧️',
            'label' => 'Question 3',
            'text'  => 'What indoor activities do people enjoy on rainy days?',
        ],
        [
            'emoji' => '☀️',
            'label' => 'Question 4',
            'text'  => 'Which outdoor activity do people enjoy in the summer?',
        ],
        [
            'emoji' => '🧘',
            'label' => 'Question 5',
            'text'  => 'Which indoor activity helps you relax?',
        ],
        [
            'emoji' => '🎲',
            'label' => 'Question 6',
            'text'  => 'What are three indoor activities you enjoy?',
        ],
        [
            'emoji' => '🚴',
            'label' => 'Question 7',
            'text'  => 'What are three outdoor activities you enjoy?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])