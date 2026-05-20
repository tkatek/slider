<?php

$content = [
    'title'    => 'Speaking',
    'subtitle' => 'What about you?',
    'image'    => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-5/cultural-Holiday.webp'),
    'cards' => [
        [
            'label' => 'Question 1',
            'emoji' => '☀️',
            'text'  => 'Where are you going this summer?',
            'theme' => 'indigo',
        ],
        [
            'label' => 'Question 2',
            'emoji' => '🚗',
            'text'  => 'How will you travel?',
            'theme' => 'violet',
        ],
        [
            'label' => 'Answer 1',
            'emoji' => '🧳',
            'text'  => 'I’m going to ____.',
            'theme' => 'blue',
        ],
        [
            'label' => 'Answer 2',
            'emoji' => '🚌',
            'text'  => 'I will travel by ____.',
            'theme' => 'sky',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])