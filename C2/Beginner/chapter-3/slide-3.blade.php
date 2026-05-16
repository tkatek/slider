<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Beginner/chapter-2/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '🗣️',
            'label' => 'Question 1',
            'text'  => 'Do you enjoy debates or avoid them?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 2',
            'text'  => 'What makes a debate productive, not aggressive?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])