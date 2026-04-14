<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Let’s have a Discussion',
    'image'      => materialAsset('slider/A1/Intermediate/chapter-11/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🎒',
            'label' => 'Question 1',
            'text'  => 'What do you take out of your bag at security?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '🛂',
            'label' => 'Question 2',
            'text'  => 'What do security officers ask you to do?',
            'theme' => 'blue',
        ],
    ],
];
?>
@include('slider.other.discussion', ['content' => $content])
