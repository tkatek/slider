<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/chapter-1/img/discussion.webp'),

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