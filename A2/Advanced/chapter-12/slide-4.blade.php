<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Advanced/chapter-12/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🏠',
            'label' => 'Question 1',
            'text'  => 'What Problems Can People Have With Roommates?',
        ],
        [
            'emoji' => '🎒',
            'label' => 'Question 2',
            'text'  => 'Is It Okay To Borrow Things Without Asking?',
        ],
        [
            'emoji' => '🤝',
            'label' => 'Question 3',
            'text'  => 'What Makes Someone A Good Roommate?',
        ],
        [
            'emoji' => '💬',
            'label' => 'Question 4',
            'text'  => 'How Should People Solve Problems With Friends Or Roommates?',
        ],
        [
            'emoji' => '🧍',
            'label' => 'Question 5',
            'text'  => 'Would You Rather Live Alone Or With Roommates? Why?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])