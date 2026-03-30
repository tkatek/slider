<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Let’s talk about flying',

    'questions' => [
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
@include("slider.other.speaking-discussion", ['content' => $content])