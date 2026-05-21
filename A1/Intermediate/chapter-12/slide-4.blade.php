<?php

$content = [
    'title'    => 'Discussion',
    'subtitle' => 'Let’s talk about flying',
    'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/boarding-gate.webp'),
    'cards' => [
        [
            'label' => 'Question 1',
            'emoji' => '🛫',
            'text'  => 'When was the last time you took an airplane? Where did you go?',
            'theme' => 'indigo',
        ],
        [
            'label' => 'Question 2',
            'emoji' => '🥤',
            'text'  => 'What do you usually drink on a plane?',
            'theme' => 'violet',
        ],
        [
            'label' => 'Question 3',
            'emoji' => '🎧',
            'text'  => 'What do you usually do during flights?',
            'theme' => 'blue',
        ],
        [
            'label' => 'Question 4',
            'emoji' => '😬',
            'text'  => 'Are you afraid of flying? Why? Why not?',
            'theme' => 'sky',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])