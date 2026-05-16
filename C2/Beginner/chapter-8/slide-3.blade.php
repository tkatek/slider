<?php

$content = [
    'page_title' => 'Warm Up',
    'title'      => 'Warm Up',
    'subtitle'   => 'Answers in 3-4 full sentences',
    'image'      => materialAsset('slider/C2/Beginner/chapter-8/img/discussion.webp'),

    'cards' => [
        [
            'emoji' => '🎤',
            'label' => 'Question 1',
            'text'  => 'Have you ever felt embarrassed in a conversation?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 2',
            'text'  => 'How did you react?',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])