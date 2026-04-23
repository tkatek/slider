<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Discussion questions',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-5/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🕗',
            'label' => 'Question 1',
            'text'  => 'What were you doing yesterday at 8 p.m.?',
        ],
        [
            'emoji' => '📅',
            'label' => 'Question 2',
            'text'  => 'What were you doing last weekend?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
