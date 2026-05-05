<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/activities/silent-letters/slide3.webp'),

    'cards' => [
        [
            'emoji' => '💬',
            'label' => 'Question 1',
            'text'  => 'What do you think makes someone sound advanced in English?',
        ],
        [
            'emoji' => '🎯',
            'label' => 'Question 2',
            'text'  => 'Is fluency more important than accuracy at high levels?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])