<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Beginner/chapter-3/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🙏',
            'label' => 'Question 1',
            'text'  => 'When was the last time you apologized?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 2',
            'text'  => 'Is it difficult to say sorry?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 3',
            'text'  => 'What makes a good apology?',
        ],
        [
            'emoji' => '💛',
            'label' => 'Question 4',
            'text'  => 'Do you forgive people easily?',
        ],
        [
            'emoji' => '😬',
            'label' => 'Question 5',
            'text'  => 'Have you ever broken something by accident?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])