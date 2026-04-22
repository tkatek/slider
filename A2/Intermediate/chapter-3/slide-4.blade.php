<?php
$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Intermediate/chapter-3/img/slide4.webp'),

    'cards' => [
        [
            'emoji' => '🤔',
            'label' => 'Question 1',
            'text'  => 'Are you superstitious? Why or why not?',
        ],
        [
            'emoji' => '🍀',
            'label' => 'Question 2',
            'text'  => 'Do you believe in luck?',
        ],
        [
            'emoji' => '🧿',
            'label' => 'Question 3',
            'text'  => 'Do you believe in the evil eye?',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])