<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Beginner/chapter-1/slide16.webp'),

    'cards' => [
        [
            'emoji' => '☀️',
            'label' => 'Question 1',
            'text'  => 'Do you like summer or winter?',
        ],
        [
            'emoji' => '❄️',
            'label' => 'Question 2',
            'text'  => 'Which is better: summer or winter? Why?',
        ],
        [
            'emoji' => '🌸',
            'label' => 'Question 3',
            'text'  => 'What is the most beautiful season? Why?',
        ],
        [
            'emoji' => '🌨️',
            'label' => 'Question 4',
            'text'  => 'How is winter in your country?',
        ],
        [
            'emoji' => '📅',
            'label' => 'Question 5',
            'text'  => 'What are the winter season’s months?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
