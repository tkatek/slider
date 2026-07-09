<?php
$content = [
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/B1/Advanced/chapter-1/img/slide3.webp'),

    'cards' => [
        [
            'emoji' => '🔍',
            'label' => 'Question 1',
            'text'  => 'Have you ever lost something important?',
        ],
        [
            'emoji' => '🕵️',
            'label' => 'Question 2',
            'text'  => 'Have you ever solved a mystery?',
        ],
        [
            'emoji' => '🎬',
            'label' => 'Question 3',
            'text'  => 'Do you enjoy detective stories or mystery films? Why?',
        ],
        [
            'emoji' => '❓',
            'label' => 'Question 4',
            'text'  => 'Is it always easy to know what really happened?',
        ],
        [
            'emoji' => '🧩',
            'label' => 'Question 5',
            'text'  => 'What kinds of clues help solve a mystery?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])