<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Beginner/chapter-4/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '💼',
            'label' => 'Question 1',
            'text'  => 'Have you ever felt nervous approaching someone professionally?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 2',
            'text'  => 'What makes someone memorable in networking events?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])