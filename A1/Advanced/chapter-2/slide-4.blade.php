<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Advanced/chapter-2/img/slide4.webp'),
    'image_alt'  => 'Hotel discussion image',

    'cards' => [
        [
            'emoji' => '💰',
            'label' => 'Question 1',
            'text'  => 'How much would you spend on a hotel?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🛏️',
            'label' => 'Question 2',
            'text'  => 'What is the most important thing in a hotel room for you?',
            'theme' => 'blue',
        ],
        [
            'emoji' => '🏊',
            'label' => 'Question 3',
            'text'  => 'Do you use any of the hotel facilities?',
            'theme' => 'purple',
        ],
        [
            'emoji' => '📝',
            'label' => 'Question 4',
            'text'  => 'Do you have any special requests during your stay?',
            'theme' => 'cyan',
        ],
    ],
];
?>
@include('slider.other.discussion', ['content' => $content])