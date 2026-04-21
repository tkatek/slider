<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Ready to share <br>"A Memorable Day"?<br> Let\'s Begin!',
    'image'      => materialAsset('slider/A2/Beginner/chapter-6/img/slide1.webp'),

    'cards' => [
        [
            'emoji' => '🌟',
            'label' => 'Question 1',
            'text'  => 'What was your memorable day?',
        ],
        [
            'emoji' => '📅',
            'label' => 'Question 2',
            'text'  => 'When was it?',
        ],
        [
            'emoji' => '📍',
            'label' => 'Question 3',
            'text'  => 'Where did you go?',
        ],
        [
            'emoji' => '👥',
            'label' => 'Question 4',
            'text'  => 'Who were you with?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
