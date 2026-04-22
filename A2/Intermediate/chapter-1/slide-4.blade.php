<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-1/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🌍',
            'label' => 'Question 1',
            'text'  => 'Where are you from?',
        ],
        [
            'emoji' => '⭐',
            'label' => 'Question 2',
            'text'  => 'What is your country famous for?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 3',
            'text'  => 'Do you like learning about other cultures? Why / Why not?',
        ],
        [
            'emoji' => '👋',
            'label' => 'Question 4',
            'text'  => 'How do people in your country greet each other?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
