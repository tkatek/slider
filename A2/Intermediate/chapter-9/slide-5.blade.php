<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-9/img/slide5.webp'),

    'cards' => [
        [
            'emoji' => '📚',
            'label' => 'Question 1',
            'text'  => 'What are you doing after the English session?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 2',
            'text'  => 'Who are you meeting this week?',
        ],
        [
            'emoji' => '🏠',
            'label' => 'Question 3',
            'text'  => 'Who are you visiting this week?',
        ],
        [
            'emoji' => '🌙',
            'label' => 'Question 4',
            'text'  => 'What are you doing during Eid next month?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])