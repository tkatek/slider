<?php

$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/chapter-1/img/discussion.webp'),

    'cards' => [
        [
            'emoji' => '📦',
            'label' => 'Question 1',
            'text'  => 'Have you ever sent a package abroad?',
        ],
        [
            'emoji' => '🏤',
            'label' => 'Question 2',
            'text'  => 'What problems have you faced at a post office?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])