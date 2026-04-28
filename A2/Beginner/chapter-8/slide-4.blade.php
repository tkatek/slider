<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Beginner/chapter-8/img/slide4/discussion.webp'),

    'cards' => [
        [
            'emoji' => '👫',
            'label' => 'Question 1',
            'text'  => 'What does your best friend look like?',
        ],
        [
            'emoji' => '💭',
            'label' => 'Question 2',
            'text'  => 'What is your best friend like?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 3',
            'text'  => 'Is your friend friendly and helpful?',
        ],
        [
            'emoji' => '😊',
            'label' => 'Question 4',
            'text'  => 'Do you prefer shy or friendly people? Why?',
        ],
        [
            'emoji' => '💇',
            'label' => 'Question 5',
            'text'  => 'Does your friend have long or short hair?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])