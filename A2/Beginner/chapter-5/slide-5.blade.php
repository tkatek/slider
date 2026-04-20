<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Beginner/chapter-5/img/slide5.webp'),

    'cards' => [
        [
            'emoji' => '✈️',
            'label' => 'Question 1',
            'text'  => 'Where did you go on your last holiday?',
        ],
        [
            'emoji' => '👨‍👩‍👧‍👦',
            'label' => 'Question 2',
            'text'  => 'Who did you go with?',
        ],
        [
            'emoji' => '🏖️',
            'label' => 'Question 3',
            'text'  => 'What did you do there?',
        ],
        [
            'emoji' => '😊',
            'label' => 'Question 4',
            'text'  => 'Was it fun? Why?',
        ],
        [
            'emoji' => '🌄',
            'label' => 'Question 5',
            'text'  => 'Was the place beautiful or boring?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 6',
            'text'  => 'Were the people friendly?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])