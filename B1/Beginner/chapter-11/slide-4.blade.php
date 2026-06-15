<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion Questions',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-11/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '😔',
            'label' => 'Question 1',
            'text'  => "What’s your biggest regret in life?",
        ],
        [
            'emoji' => '📅',
            'label' => 'Question 2',
            'text'  => 'Have you ever missed an important event?',
        ],
        [
            'emoji' => '⚠️',
            'label' => 'Question 3',
            'text'  => 'Have you ever forgotten to do something important?',
        ],
        [
            'emoji' => '🔁',
            'label' => 'Question 4',
            'text'  => 'What\'s something that you wish you had done differently?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])