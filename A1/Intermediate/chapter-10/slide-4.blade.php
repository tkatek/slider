<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A1/Intermediate/chapter-10/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '1️⃣',
            'label' => 'Question 1',
            'text'  => 'Have you ever travelled by plane?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '2️⃣',
            'label' => 'Question 2',
            'text'  => 'What do you do first at the airport?',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '3️⃣',
            'label' => 'Question 3',
            'text'  => 'What is "check-in"?',
            'theme' => 'indigo',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
